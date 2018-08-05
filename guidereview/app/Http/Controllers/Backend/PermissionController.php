<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Trang chủ
     */
    public function index()
    {
        return view('backend.permission.index');
    }
}
