<?php

namespace App\Http\Controllers\Backend;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends ThingController
{
    /**
     * Trang chủ
     */
    public function index()
    {
        return view('backend.blog.index');
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showAddForm()
    {
        return view('backend.blog.add');
    }

    /**
     * Thêm mới
     */
    public function add(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug');
        $blog->featured_img = $request->input('featured_img');
        $blog->excerpt = $request->input('excerpt');
        $blog->content = $request->input('content');
        $blog->type = 'blog';
        $blog->author_id = Auth::user()->id;
        $blog->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $blog->locale = session('locale');
        $blog->locale_source_id = $request->input('locale_source_id');

        $tags = array_map('trim', explode(',', $request->input('tags')));
        $metadata = ['tags' => $tags];
        $blog->metadata = json_encode($metadata);

        if ($blog->save()) {
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
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect()->action('Backend\BlogController@index');
        }
        $metadata = json_decode($blog->metadata);
        $blog->tags = implode(', ', $metadata->tags);
        return view('backend.blog.edit')->with('thing', $blog);
    }

    /**
     * Cập nhật
     */
    public function edit(Request $request)
    {
        $blog = Blog::find($request->input('id'));

        $blog->title = $request->input('title');
        $blog->slug = $request->input('slug');
        $blog->featured_img = $request->input('featured_img');
        $blog->excerpt = $request->input('excerpt');
        $blog->content = $request->input('content');
        $blog->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $blog->locale_source_id = $request->input('locale_source_id');

        $tags = array_map('trim', explode(',', $request->input('tags')));
        $metadata = ['tags' => $tags];
        $blog->metadata = json_encode($metadata);

        if ($blog->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
}
