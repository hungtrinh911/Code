<?php

namespace App\Http\Controllers\Backend;

use App\RolesPermission;
use App\UserPermission;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;


class UserController extends Controller
{
    /**
     * Sua Role
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request)
    {
        $role_id = null;
        try {
            // 3,12,19,17,20,18
            $str_roles = $request->input('list-roles');
            //dd($str_roles);
            $arr_roles = explode(",", $str_roles);
           // dd($arr_roles);
            $flg = true;
            $user_id = $request->input('id');
          //  dd($user_id);

            DB::beginTransaction();
            // 01. cap nhat du lieu bang users
            $user = User::find($user_id);
            if ($user == null) {
                DB::rollBack();
                return back()->with('error', trans('backend/common.error'))->withInput();
            }
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->name = $request->input('username');
            $user->channel = 'backend';
            $flg = $user->update();
            $user_id = $user->id;
           //dd($user_id);


            // 02. Xoa du lieu bang users_roles, users_permissions

            DB::table('users_roles')->where('user_id',$user_id)->delete();
            DB::table('users_permissions')->where('user_id',$user_id)->delete();

            // 03. them du lieu bang users_roles
            foreach ($arr_roles as $role) {
                if ($role != "") {
                    $user_role = new UserRole();
                    $user_role->role_id = $role;
                    $user_role->user_id = $user_id;
                    $flg = $user_role->save();
                    if (!$flg) {
                        DB::rollBack();
                        return back()->with('error', trans('backend/common.error'))->withInput();
                    }

                    // voi moi role thi add permission cua role do cho user
                    $list_user_permission = DB::table('users_permissions')->where('user_id', $user_id )->pluck('permission_id');
                    $list_permission = RolesPermission::where('role_id', $role )->pluck('permission_id');
                    

                    foreach ($list_permission as $permission) {
                        if ($permission != "") {
                           // dd($permission);
                            $userPer = new UserPermission();
                            $userPer->permission_id = $permission;
                            $userPer->user_id = $user_id;
                            //$userPer->save();
                           // dd( DB::table('users_permissions')->where('user_id','=',$permission)->get());
                            foreach ($list_user_permission as $userPermission) {
                        # code...
                            if ($userPermission != null) {
                            # code...
                                DB::table('users_permissions')->where('permission_id','=',$permission)->delete();
                                }
                               
                            }
                            $user->permissions()->attach($permission);
//var_dump($permission);
                        }
                    }
                   // $list_user_permission = DB::table('users_permissions')->where('user_id', $user_id )->pluck('permission_id');
                 //  dd($list_user_permission);

                }

            }

            DB::commit();
            $jsRoles = UserRole::get($user_id);
            return back()->with([
                'success' => trans('backend/common.success'),
                'jsRoles' => $jsRoles
            ])->withInput();

        } catch (Exception $e) {
            $e->getMessage();
            DB::rollBack();
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Hiển thị form edit
     */
    public function showEditForm($id = 0)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->action('Backend\UserController@index');
        }
        $jsRoles = UserRole::get($id);
        return view('backend.user.edit')->with([
            'user' => $user,
            'jsRoles' => $jsRoles
        ]);
    }


    /**
     * Thực hiện thêm mới menu
     */
    public function add(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255|email',
        ]);
        

        try {
            DB::beginTransaction();
            $flg = true;
            $jsRoles = null;

            // 01. Them bang user
            $user = new User();
            $user->username = $request->input('username');
            $user->name = $request->input('username');
            $user->email = $request->input('email');
            $user->password = Hash::make('123456');//md5('123456');
            $user->channel = 'backend';
            $flg = $user->save();

            // 02. them bang user_role
            $str_roles = $request->input('list-roles');
            $arr_roles = explode(",", $str_roles);
            foreach ($arr_roles as $role_id) {
                if ($role_id != "") {
                    $userRole = new UserRole;
                    $userRole->user_id = $user->id;
                    $userRole->role_id = $role_id;
                    $flg = $userRole->save();

                    // voi moi role thi add permission cua role do cho user
                    $list_permission = RolesPermission::where('role_id', $role_id)->pluck('permission_id');
                    foreach ($list_permission as $permission) {
                        if ($permission != "") {
                            $user->permissions()->attach($permission);
                        }
                    }
                }
            }

            if (!$flg) {
                DB::rollBack();
                return back()->with('error', trans('backend/common.error'))->withInput();
            }

            DB::commit();
            $jsRoles = '';
            if ($role_id != null)
                $jsRoles = UserRole::get($user->id);

            return back()->with([
                'success' => trans('backend/common.success'),
                'jsRoles' => $jsRoles
            ])->withInput();


        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('error', trans('backend/common.error'))->withInput();
        }


    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showAddForm()
    {
        $jsRoles = null;
        return view('backend.user.add', compact('$jsRoles'));
    }

    public function index()
    {
        return view("backend.user.index");
    }


    /*
     * Change password get
     */
    public function showChangePassword()
    {
        $user = Auth::user();
        return view('backend.user.changepassword')->with([
            'user' => $user
        ]);;
    }

    protected $rules = array(
        'now_password' => 'required|min:6',
        'password' => 'min:6|confirmed|different:now_password',
        'password_confirmation' => 'required_with:password|min:6'
    );

    /*
     * Change password post method
     */
    public function changePassword(Request $request)
    {
        $user = Auth::user();
        if (Hash::check($request->now_password, $user->password)) {
            $validator = Validator::make($request->all(), $this->rules);
            if ($validator->passes()) {
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->get('password'));
                $user->save();
                return back()->with('success', trans('backend/common.success'))->withInput();;
            } else {
                return back()->withErrors($validator)->with('error', trans('backend/common.error'))->withInput();
            }

        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /*
     * Change password get
     */
    public function showUpdateProfile()
    {
        $user = Auth::user();
        return view('backend.user.updateprofile')->with([
            'user' => $user
        ]);
    }

    public function validateUpdateProfile(Request $request)
    {
        return Validator::make($request->all(), [
            //'name' => 'required|max:255',
            //'phone' => 'required|numeric|max:11',
            'email' => 'required|email',
        ]);
    }

    public function updateProfile(Request $request)
    {
        $validator = $this->validateUpdateProfile($request);
        if ($validator->passes()) {
            $user = User::find(Auth::user()->id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->save();
            return back()->with('success', trans('backend/common.success'))->withInput();;
        } else {
            return back()->withErrors($validator)->with('error', trans('backend/common.error'))->withInput();
        }
    }

}
