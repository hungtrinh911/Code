<?php

namespace App\Http\Controllers\Api;

use App\Base\Thing;
use Illuminate\Http\Request;

class PageController extends ThingController
{
    /**
     * Danh sách tin tức phân trang trên table quản trị
     */
    public function grid(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');

        $news = Thing::pagedList(session('locale'), 'page', $search, $offset, $limit);
        $totalRow = Thing::count(session('locale'), 'page', $search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $news
        );
        $result = json_encode($jsonData);
        return $result;
    }
}
