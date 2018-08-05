<?php

namespace App\Http\Controllers\api;

use App\FormSubmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FormSubmissionController extends Controller
{
    /**
     * Danh sách submission (type = project) phân trang trên table quản trị
     */
    public function grid(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');
        $submissions = FormSubmission::pagedList($search, $offset, $limit);
        $totalRow = FormSubmission::count($search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $submissions
        );
        $result = json_encode($jsonData);
        return $result;
    }
}
