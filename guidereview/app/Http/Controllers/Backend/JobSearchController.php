<?php

namespace App\Http\Controllers\Backend;

use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobSearchController extends ThingController
{
    /**
     * Trang chủ
     */
    public function index()
    {
        //$news = DB::table('things')->where('type','jobsearch')->pluck('id');
        return view('backend.jobsearch.index');
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showAddForm()
    {
        return view('backend.jobsearch.add');
    }

    /**
     * Thêm mới
     */
    public function add(Request $request)
    {
        $news = new News();
        $news->title = $request->input('title');
        $news->slug = $request->input('slug');
        $news->featured_img = $request->input('featured_img');
        $news->excerpt = $request->input('excerpt');
        $news->content = $request->input('content');
        $news->type = 'jobsearch';
        $news->author = Auth::user()->id;
        $news->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $news->locale = session('locale');
        $news->locale_source_id = $request->input('locale_source_id');

        $tags = explode(',', $request->input('tags'));
        $metadata = ['tags' => $tags];
        $news->metadata = json_encode($metadata);

        $categories = (array)json_decode($request->input('categories'), true);
        $cates = collect();
        foreach ($categories as $item) {
            $tmp = new NewsCategory();
            $tmp->term_id = $item['id'];
            $cates->push($tmp);
        }

        if ($news->save()) {
            $news->categories()->attach($cates);
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
        $news = News::with('categories:id')->where('type','jobsearch')->find($id);
        if (!$news) {
            return redirect()->action('Backend\JobSearchController@index');
        }
        $metadata = json_decode($news->metadata);
        $news->tags = implode(', ', $metadata->tags);
        $news->categories = json_encode($news->getRelation('categories'));
       // dd($samenews2);
        return view('backend.jobsearch.edit')->with(['thing'=> $news]);
    }

    /**
     * Cập nhật
     */
    public function edit(Request $request)
    {
        $news = News::find($request->input('id'));
        $news->categories()->detach();

        $news->title = $request->input('title');
        $news->slug = $request->input('slug');
        $news->featured_img = $request->input('featured_img');
        $news->excerpt = $request->input('excerpt');
        $news->content = $request->input('content');
        $news->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $news->locale_source_id = $request->input('locale_source_id');

        $tags = explode(',', $request->input('tags'));
        $metadata = ['tags' => $tags];
        $news->metadata = json_encode($metadata);

        $categories = (array)json_decode($request->input('categories'), true);
        $newCates = collect();
        foreach ($categories as $item) {
            $tmp = new NewsCategory();
            $tmp->term_id = $item['id'];
            $newCates->push($tmp);
        }
       // dd($news);
        
        if ($news->save()) {
            $news->categories()->attach($newCates);
            return back()->with('success',trans('backend/common.success'))
                        ->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
    public function destroy($id)
    {
        News::destroy($id);
        return back();
    }
       /**
     * Trang chuyên mục + form thêm mới chuyên mục
     */
    public function category($id = 0)
    {
        $term = new NewsCategory();
        $term->id = 0;
        $term->parent_id = 0;
        $term->locale_source_id = 0;
        //dd($term);
        return view('backend.jobsearch.category')->with('term', $term);
    }

    /**
     * Hiển thị form edit
     */
    public function showEditCategoryForm($id = 0)
    {
        $term = NewsCategory::find($id);
        //dd($term);
        if (!$term) {
            return redirect()->action('Backend\JobSearchController@category');
        }
        return view('backend.jobsearch.category')->with('term', $term);
    }

    /**
     * Thêm mới category
     */
    public function addCategory(Request $request)
    {
        $newsCate = new NewsCategory();
        $newsCate->name = $request->input('name');
        $newsCate->slug = $request->input('slug');
        $newsCate->type = 'jobsearch_category';
        $newsCate->parent_id = $request->input('parent_id');
        $newsCate->status = 'publish';
        $newsCate->locale = session('locale');
        $newsCate->locale_source_id = $request->input('locale_source_id');
        if ($newsCate->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Cập nhật category
     */
    public function editCategory(Request $request)
    {
        $newsCate = NewsCategory::find($request->id);
        $newsCate->name = $request->input('name');
        $newsCate->slug = $request->input('slug');
        $newsCate->parent_id = $request->input('parent_id');
        $newsCate->locale_source_id = $request->input('locale_source_id');
        if ($newsCate->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Xóa category
     */
    public function deleteCategory($id)
    {
        $newsCate = NewsCategory::find($id);
        if ($newsCate->delete()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

 
}
