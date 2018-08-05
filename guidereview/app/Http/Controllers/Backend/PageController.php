<?php

namespace App\Http\Controllers\Backend;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends ThingController
{
    /**
     * Trang chủ
     */
    public function index()
    {
        return view('backend.page.index');
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showAddForm()
    {
        return view('backend.page.add');
    }

    /**
     * Thêm mới
     */
    public function add(Request $request)
    {
        $page = new Page();
        $page->title = $request->input('title');
        $page->slug = $request->input('slug');
        $page->featured_img = $request->input('featured_img');
        $page->excerpt = $request->input('excerpt');
        $page->content = $request->input('content');
        $page->type = 'page';
        $page->author_id = Auth::user()->id;
        $page->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $page->locale = session('locale');
        $page->locale_source_id = $request->input('locale_source_id');

        $tags = array_map('trim', explode(',', $request->input('tags')));
        $metadata = ['tags' => $tags];
        $page->metadata = json_encode($metadata);

        if ($page->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showEditForm($id = 0)
    {
        $page = Page::find($id);
        if (!$page) {
            return redirect()->action('Backend\PageController@index');
        }
        $metadata = json_decode($page->metadata);
        $page->tags = implode(', ', $metadata->tags);
        return view('backend.page.edit')->with('thing', $page);
    }

    /**
     * Cập nhật
     */
    public function edit(Request $request)
    {
        $page = Page::find($request->input('id'));

        $page->title = $request->input('title');
        $page->slug = $request->input('slug');
        $page->featured_img = $request->input('featured_img');
        $page->excerpt = $request->input('excerpt');
        $page->content = $request->input('content');
        $page->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $page->locale_source_id = $request->input('locale_source_id');

        $tags = array_map('trim', explode(',', $request->input('tags')));
        $metadata = ['tags' => $tags];
        $page->metadata = json_encode($metadata);

        if ($page->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
}
