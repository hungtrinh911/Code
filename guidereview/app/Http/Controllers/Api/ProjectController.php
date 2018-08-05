<?php

namespace App\Http\Controllers\Api;

use App\Base\Thing;
use App\Project;
use App\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends ThingController
{
    /**
     * Danh sách tin tức phân trang trên table quản trị
     */
    public function grid(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');

        $project = Thing::pagedList(session('locale'), 'project', $search, $offset, $limit);
        $totalRow = Thing::count(session('locale'), 'project', $search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $project
        );
        $result = json_encode($jsonData);
        return $result;
    }

    /**
     * Dữ liệu chuyên mục theo dạng cây với kiểu json => sử dụng để load vào jstree
     */
    public function treeCategory(Request $request)
    {
        $list = ProjectCategory::tree($request->input('locale'), false, '');
        $retList = array();

        foreach ($list as $item) {
            $tmp = [
                'id' => $item->id,
                'parent' => $item->parent_id === 0 ? '#' : $item->parent_id,
                'text' => $item->name,
            ];
            array_push($retList, $tmp);
        }

        return response()->json($retList);
    }
}
