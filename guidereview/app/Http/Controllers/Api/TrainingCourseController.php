<?php

namespace App\Http\Controllers\Api;

use App\Base\Thing;
use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;

class TrainingCourseController extends ThingController
{
    /**
     * Danh sách training course phân trang trên table quản trị
     */
    public function grid(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');

        $news = Thing::pagedList(session('locale'), 'trainingcourse', $search, $offset, $limit);
        $totalRow = Thing::count(session('locale'), 'trainingcourse', $search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $news
        );
        $result = json_encode($jsonData);
        //dd($result);
        return $result;
    }

    /**
     * Dữ liệu chuyên mục theo dạng cây với kiểu json => sử dụng để load vào jstree
     */
    public function treeCategory(Request $request)
    {
        $list = NewsCategory::treeTrainingCourse($request->input('locale'), false, '');
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
