<?php

namespace App\Http\Controllers\Api;

use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Base\Thing;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    //
    /**
     * Danh sách menu phân trang trên table quản trị
     */
    public function grid(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');
        $menus = Menu::pagedListMenuTerm(session('locale'), $search);
        $totalRow = Menu::countMenu(session('locale'), $search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $menus
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
            Menu::whereIn('id', explode(',', $ids))->delete(function($menu){
                $menu->items()->detach();
            });
        });
        return response()->json(200);
    }
}
