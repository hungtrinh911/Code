<?php

namespace App\Http\Controllers\Backend;

use App\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Exceptions\Handler;
use App\Role;
use App\RolesPermission;
use App\Validate;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view("backend.role.index");
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showAddForm()
    {
        $jstreePermission = null;
        return view('backend.role.add', compact('jstreePermission'));

    }

    public function add(Request $request)
    {
        $role_id = null;
        try {
            // 3,12,19,17,20,18
            $str_permissions = $request->input('list-permission');
            //dd($str_permissions);
            $arr_permissions = explode(",", $str_permissions);
            $arr_permissions = array_filter($arr_permissions);
          //  dd($arr_permissions);
            $flg = true;
            $slug = $request->input('slug');
            $retRole = Role::getRoleBySlug($slug);
            if ($retRole->isEmpty()) {
                DB::beginTransaction();

                // 01. Them du lieu bang roles
                $role = new Role();
                $role->name = $request->input('name');
                $role->slug = $request->input('slug');
                $flg = $role->save();
                $role_id = $role->id;

                // 02. them du lieu bang roles_permissions
                foreach ($arr_permissions as $permission) {
                    $rolePermission = new RolesPermission();
                    $rolePermission->role_id = $role_id;
                    $rolePermission->permission_id = $permission;
                    $flg = $rolePermission->save();
                }

                // 03. them du lieu vao user system
                $userRole = new UserRole();
                $userRole->user_id = 1;
                $userRole->role_id = $role_id;
                $flg = $userRole->save();

                if (!$flg) DB::rollBack();

                DB::commit();
                $jstreePermission = '';
                if ($role_id != null)
                    $jstreePermission = RolesPermission::get($role_id);
                //RolesPermission::where('role_id', $role_id)->pluck('permission_id');
                return back()->with([
                    'success' => trans('backend/common.success'),
                    'jstreePermission' => $jstreePermission
                ])->withInput();
            } else
                return back()->with('error', trans('backend/common.error'))->withInput();
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
        $role = Role::find($id);
        if (!$role) {
            return redirect()->action('Backend\RoleController@index');
        }
        $jstreePermission = RolesPermission::get($id);
        return view('backend.role.edit')->with([
            'role' => $role,
            'jstreePermission' => $jstreePermission
        ]);
    }


    public function edit(Request $request)
    {
        $role_id = null;
        try {
            // 3,12,19,17,20,18
            $str_permissions = $request->input('list-permission');
            $arr_permissions = explode(",", $str_permissions);
            $arr_permissions = array_filter($arr_permissions);
            $flg = true;
            $slug = $request->input('slug');
            $update = Role::canUpdate($slug, $request->input('hiddenUpdatePermission'));

            if ($update) {
                DB::beginTransaction();

                // 01. Them du lieu bang roles
                $role = Role::find($request->input('id'));
                $role->name = $request->input('name');
                $role->slug = $request->input('slug');
                $flg = $role->update();
                $role_id = $role->id;

                // 02. Xoa du lieu bang roles_permissions voi role_id
                RolesPermission::where('role_id', $role_id)->delete();

                // 03. them du lieu bang roles_permissions
                foreach ($arr_permissions as $permission) {
                    if($permission != '')
                    {
                        $rolePermission = new RolesPermission();
                        $rolePermission->role_id = $role_id;
                        $rolePermission->permission_id = $permission;
                        $flg = $rolePermission->save();
                    }
                }

                if (!$flg) DB::rollBack();

                DB::commit();
                $jstreePermission = '';
                if ($role_id != null)
                    $jstreePermission = RolesPermission::get($role_id);
                //RolesPermission::where('role_id', $role_id)->pluck('permission_id');
                return back()->with([
                    'success' => trans('backend/common.success'),
                    'jstreePermission' => $jstreePermission
                ])->withInput();
            } else
                return back()->with('error', trans('backend/common.error'))->withInput();
        } catch (Exception $e) {
            $e->getMessage();
            DB::rollBack();
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }


    /**
     * Xóa role
     */
//    public function delete($id)
//    {
//        $newsCate = RoleCategory::find($id);
//        if ($newsCate->delete()) {
//            return back()->with('success', trans('backend/common.success'))->withInput();
//        } else {
//            return back()->with('error', trans('backend/common.error'))->withInput();
//        }
//    }
}
