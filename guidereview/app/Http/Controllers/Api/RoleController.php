<?php

namespace App\Http\Controllers\Api;

use App\Role;
use App\RolesPermission;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends ApiController
{
    /**
     * Danh sách role phân trang trên table quản trị
     */
    public function grid(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');
        $current_user = $request->session()->get('current_user');

        $role_list = Role::getAllApi($current_user)->pluck('id');
        $roles = Role::pagedList(session('locale'), $search, $offset, $limit)->whereIn('id', $role_list);

        if ($current_user->id != 1){
            $roles = $roles->except(1);
        }

        $totalRow = Role::count(session('locale'), $search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $roles
        );
        $result = json_encode($jsonData);
        return $result;
    }

    /**
     * Xóa dữ liệu nhieu ban ghi cung luc
     */
    public function delete(Request $request)
    {
        $ids = $request->input('ids');
        DB::transaction(function () use ($ids) {
            // 01. Xoa du lieu bang users_roles
            UserRole::whereIn('role_id', explode(',', $ids))->delete();

            // 02. Xoa du lieu bang roles_permissions
            RolesPermission::whereIn('role_id', explode(',', $ids))->delete();

            // 03. Xoa du lieu bang  roles
            Role::whereIn('id', explode(',', $ids))->delete();
        });
        return response()->json(200);
    }

}
