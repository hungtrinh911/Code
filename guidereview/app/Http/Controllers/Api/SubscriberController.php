<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class SubscriberController extends Controller
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
        $users = User::pagedListSubscriber($search, $offset, $limit)->except(1);
        $totalRow = User::count($search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $users
        );
        $result = json_encode($jsonData);
        return $result;
    }
}
