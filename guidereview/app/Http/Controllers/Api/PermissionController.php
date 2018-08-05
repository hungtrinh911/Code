<?php

namespace App\Http\Controllers\Api;

use App\Role;
use App\RolesPermission;
use App\User;
use App\UserRole;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends ApiController
{

    public function grid(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');

        $permission = Permission::pagedList(session('locale'),  $search, $offset, $limit);
        $totalRow = Permission::count(session('locale'), $search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $permission
        );
        $result = json_encode($jsonData);
        var_dump($result);
        return $result;
    }
}
