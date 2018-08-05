<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends ApiController
{
    //
    /**
     * Danh sách user phân trang trên table quản trị
     */
    public function grid(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');
        $users = User::pagedList($search, $offset, $limit)->except(1);//->where('channel','backend');
        $totalRow = User::count($search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $users
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
