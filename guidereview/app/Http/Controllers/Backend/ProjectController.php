<?php

namespace App\Http\Controllers\Backend;

use App\Base\Thing;
use App\Project;
use App\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends ThingController
{
    /**
     * Trang chủ
     */
    public function index()
    {
        return view('backend.project.index');
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showAddForm()
    {
        $thing = new \stdClass();
        $thing->news = Thing::list(app()->getLocale(), ['news']);
        return view('backend.project.add')->with('thing', $thing);
    }

    /**
     * Thêm mới
     */
    public function add(Request $request)
    {
        $project = new Project();
        $project->title = $request->input('title');
        $project->slug = $request->input('slug');
        $project->featured_img = $request->input('featured_img');
        $project->excerpt = $request->input('excerpt');
        $project->content = $request->input('content');
        $project->type = 'project';
        $project->author_id = Auth::user()->id;
        $project->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $project->locale = session('locale');
        $project->locale_source_id = $request->input('locale_source_id');

        /*=== BẮT ĐẦU các thông tin lưu trong Metadata ===*/
        $tags = array_map('trim', explode(',', $request->input('tags')));
        $slider_images = json_decode($request->input('slider_images'));

        // TỔNG QUAN
        //--- Quy mô
        $overview_scope_text = $request->input('overview_scope_text');
        $overview_scope_image = $request->input('overview_scope_image');

        //--- Vị trí
        $overview_location_text = $request->input('overview_location_text');
        $overview_location_image = $request->input('overview_location_image');

        //--- Tiện ích
        $overview_amenity_title = $request->input('overview_amenity_title');
        $overview_amenity_images = json_decode($request->input('overview_amenity_images'));

        //--- Sản phẩm dự án
        $overview_product_title = $request->input('overview_product_title');
        $overview_product_text = $request->input('overview_product_text');

        //--- Tin liên quan
        $related_news = $request->input('related_news');

        //--- Tài liệu
        $document_text = $request->input('document_text');
        $document_image = $request->input('document_image');

        // VỊ TRÍ - TIỆN ÍCH
        $location_indexes = $request->input('location_index');
        $location_titles = $request->input('location_title');
        $location_images = $request->input('location_image');
        $location_excerpts = $request->input('location_excerpt');
        $location_contents = $request->input('location_content');
        $locations = collect();

        if ($location_indexes != null) {
            $i = 1;
            foreach ($location_indexes as $index) {
                $tmp = new \stdClass();
                $tmp->index = $i;
                $tmp->title = $location_titles[$index];
                $tmp->image = $location_images[$index];
                $tmp->excerpt = $location_excerpts[$index];
                $tmp->content = $location_contents[$index];
                $locations->push($tmp);
                $i++;
            }
        }

        // MẶT BẰNG
        $plan_indexes = $request->input('plan_index');
        $plan_titles = $request->input('plan_title');
        $plan_images = $request->input('plan_image');
        $plan_excerpts = $request->input('plan_excerpt');
        $plan_contents = $request->input('plan_content');
        $plans = collect();

        if ($plan_indexes != null) {
            $i = 1;
            foreach ($plan_indexes as $index) {
                $tmp = new \stdClass();
                $tmp->index = $i;
                $tmp->title = $plan_titles[$index];
                $tmp->image = $plan_images[$index];
                $tmp->excerpt = $plan_excerpts[$index];
                $tmp->content = $plan_contents[$index];
                $plans->push($tmp);
                $i++;
            }
        }

        // NHÀ MẪU
        $show_flat_images = json_decode($request->input('show_flat_images'));

        // PHƯƠNG THỨC THANH TOÁN
        $payment_method_content = $request->input('payment_method_content');

        // TIẾN ĐỘ
        $progress_times = array_map('trim', explode(',', $request->input('progress_times')));
        $progress_text = $request->input('progress_text');
        $progress_images = json_decode($request->input('progress_images'));

        /*=== KẾT THÚC các thông tin lưu trong Metadata ===*/

        // Lưu metadata
        $metadata = [
            'tags' => $tags,
            'slider_images' => isset($slider_images) ? $slider_images : array(),
            'overview_scope_text' => isset($overview_scope_text) ? $overview_scope_text : '',
            'overview_scope_image' => isset($overview_scope_image) ? $overview_scope_image : '',
            'overview_location_text' => isset($overview_location_text) ? $overview_location_text : '',
            'overview_location_image' => isset($overview_location_image) ? $overview_location_image : '',
            'overview_amenity_title' => isset($overview_amenity_title) ? $overview_amenity_title : '',
            'overview_amenity_images' => isset($overview_amenity_images) ? $overview_amenity_images : array(),
            'overview_product_title' => isset($overview_product_title) ? $overview_product_title : '',
            'overview_product_text' => isset($overview_product_text) ? $overview_product_text : '',
            'related_news' => isset($related_news) ? $related_news : array(),
            'document_text' => isset($document_text) ? $document_text : '',
            'document_image' => isset($document_image) ? $document_image : '',
            'locations' => isset($locations) ? $locations : array(),
            'plans' => isset($plans) ? $plans : array(),
            'show_flat_images' => isset($show_flat_images) ? $show_flat_images : array(),
            'payment_method_content' => isset($payment_method_content) ? $payment_method_content : '',
            'progress_times' => isset($progress_times) ? $progress_times : array(),
            'progress_text' => isset($progress_text) ? $progress_text : '',
            'progress_images' => isset($progress_images) ? $progress_images : array(),
        ];
        $project->metadata = json_encode($metadata);

        // Loại dự án
        $categories = (array)json_decode($request->input('categories'), true);
        $newCates = collect();
        foreach ($categories as $item) {
            $tmp = new ProjectCategory();
            $tmp->term_id = $item['id'];
            $newCates->push($tmp);
        }

        if ($project->save()) {
            $project->categories()->attach($newCates);
            $newProject = Project::where('slug', $project->slug)->first();
            return redirect()
                ->action('Backend\ProjectController@showEditForm', array('id' => $newProject->id))
                ->with('success', trans('backend/common.success'));
        } else {
            return back()->with('error', trans('backend/common.error'));
        }
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showEditForm($id = 0)
    {
        $project = Project::with('categories:id')->find($id);
        if (!$project) {
            return redirect()->action('Backend\ProjectController@index');
        }
        $metadata = json_decode($project->metadata);

        /*=== BẮT ĐẦU lấy các thông tin trong Metadata ===*/
        $project->tags = implode(',', $metadata->tags);
        $project->slider_images = json_encode($metadata->slider_images);

        // TỔNG QUAN
        //--- Quy mô
        $project->overview_scope_text = $metadata->overview_scope_text;
        $project->overview_scope_image = $metadata->overview_scope_image;

        //--- Vị trí
        $project->overview_location_text = $metadata->overview_location_text;
        $project->overview_location_image = $metadata->overview_location_image;

        //--- Tiện ích
        $project->overview_amenity_title = $metadata->overview_amenity_title;
        $project->overview_amenity_images = json_encode($metadata->overview_amenity_images);

        //--- Sp dự án
        $project->overview_product_title = $metadata->overview_product_title;
        $project->overview_product_text = $metadata->overview_product_text;

        //--- Tin liên quan
        $project->news = Thing::list(app()->getLocale(), ['news']);
        $project->related_news = isset($metadata->related_news) ? $metadata->related_news : array();

        //--- Tài liệu
        $project->document_text = $metadata->document_text;
        $project->document_image = $metadata->document_image;

        // VỊ TRÍ - TIỆN ÍCH
        $project->locations = isset($metadata->locations) ? $metadata->locations : array();

        // MẶT BẰNG
        $project->plans = isset($metadata->plans) ? $metadata->plans : array();

        // NHÀ MẪU
        $project->show_flat_images = json_encode($metadata->show_flat_images);

        // PHƯƠNG THỨC THANH TOÁN
        $project->payment_method_content = $metadata->payment_method_content;

        // TIẾN ĐỘ
        $project->progress_times = implode(',', $metadata->progress_times);
        $project->progress_text = $metadata->progress_text;
        $project->progress_images = json_encode($metadata->progress_images);

        /*=== KẾT THÚC lấy các thông tin trong Metadata ===*/

        $project->categories = json_encode($project->getRelation('categories'));
        return view('backend.project.edit')->with('thing', $project);
    }

    /**
     * Cập nhật
     */
    public function edit(Request $request)
    {
        $project = Project::find($request->input('id'));
        $project->categories()->detach();

        $project->title = $request->input('title');
        $project->slug = $request->input('slug');
        $project->featured_img = $request->input('featured_img');
        $project->excerpt = $request->input('excerpt');
        $project->content = $request->input('content');
        $project->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $project->locale_source_id = $request->input('locale_source_id');

        /*=== BẮT ĐẦU các thông tin lưu trong Metadata ===*/
        $tags = array_map('trim', explode(',', $request->input('tags')));
        $slider_images = json_decode($request->input('slider_images'));

        // TỔNG QUAN
        //--- Quy mô
        $overview_scope_text = $request->input('overview_scope_text');
        $overview_scope_image = $request->input('overview_scope_image');

        //--- Vị trí
        $overview_location_text = $request->input('overview_location_text');
        $overview_location_image = $request->input('overview_location_image');

        //--- Tiện ích
        $overview_amenity_title = $request->input('overview_amenity_title');
        $overview_amenity_images = json_decode($request->input('overview_amenity_images'));

        //--- Sản phẩm dự án
        $overview_product_title = $request->input('overview_product_title');
        $overview_product_text = $request->input('overview_product_text');

        //--- Tin liên quan
        $related_news = $request->input('related_news');

        //--- Tài liệu
        $document_text = $request->input('document_text');
        $document_image = $request->input('document_image');

        // VỊ TRÍ - TIỆN ÍCH
        $location_indexes = $request->input('location_index');
        $location_titles = $request->input('location_title');
        $location_images = $request->input('location_image');
        $location_excerpts = $request->input('location_excerpt');
        $location_contents = $request->input('location_content');
        $locations = collect();

        if ($location_indexes != null) {
            $i = 1;
            foreach ($location_indexes as $index) {
                $tmp = new \stdClass();
                $tmp->index = $i;
                $tmp->title = $location_titles[$index];
                $tmp->image = $location_images[$index];
                $tmp->excerpt = $location_excerpts[$index];
                $tmp->content = $location_contents[$index];
                $locations->push($tmp);
                $i++;
            }
        }

        // MẶT BẰNG
        $plan_indexes = $request->input('plan_index');
        $plan_titles = $request->input('plan_title');
        $plan_images = $request->input('plan_image');
        $plan_excerpts = $request->input('plan_excerpt');
        $plan_contents = $request->input('plan_content');
        $plans = collect();

        if ($plan_indexes != null) {
            $i = 1;
            foreach ($plan_indexes as $index) {
                $tmp = new \stdClass();
                $tmp->index = $i;
                $tmp->title = $plan_titles[$index];
                $tmp->image = $plan_images[$index];
                $tmp->excerpt = $plan_excerpts[$index];
                $tmp->content = $plan_contents[$index];
                $plans->push($tmp);
                $i++;
            }
        }

        // NHÀ MẪU
        $show_flat_images = json_decode($request->input('show_flat_images'));

        // PHƯƠNG THỨC THANH TOÁN
        $payment_method_content = $request->input('payment_method_content');

        // TIẾN ĐỘ
        $progress_times = array_map('trim', explode(',', $request->input('progress_times')));
        $progress_text = $request->input('progress_text');
        $progress_images = json_decode($request->input('progress_images'));

        /*=== KẾT THÚC các thông tin lưu trong Metadata ===*/

        // Lưu metadata
        $metadata = [
            'tags' => $tags,
            'slider_images' => isset($slider_images) ? $slider_images : array(),
            'overview_scope_text' => isset($overview_scope_text) ? $overview_scope_text : '',
            'overview_scope_image' => isset($overview_scope_image) ? $overview_scope_image : '',
            'overview_location_text' => isset($overview_location_text) ? $overview_location_text : '',
            'overview_location_image' => isset($overview_location_image) ? $overview_location_image : '',
            'overview_amenity_title' => isset($overview_amenity_title) ? $overview_amenity_title : '',
            'overview_amenity_images' => isset($overview_amenity_images) ? $overview_amenity_images : array(),
            'overview_product_title' => isset($overview_product_title) ? $overview_product_title : '',
            'overview_product_text' => isset($overview_product_text) ? $overview_product_text : '',
            'related_news' => isset($related_news) ? $related_news : array(),
            'document_text' => isset($document_text) ? $document_text : '',
            'document_image' => isset($document_image) ? $document_image : '',
            'locations' => isset($locations) ? $locations : array(),
            'plans' => isset($plans) ? $plans : array(),
            'show_flat_images' => isset($show_flat_images) ? $show_flat_images : array(),
            'payment_method_content' => isset($payment_method_content) ? $payment_method_content : '',
            'progress_times' => isset($progress_times) ? $progress_times : array(),
            'progress_text' => isset($progress_text) ? $progress_text : '',
            'progress_images' => isset($progress_images) ? $progress_images : array(),
        ];
        $project->metadata = json_encode($metadata);

        // Loại dự án
        $categories = (array)json_decode($request->input('categories'), true);
        $newCates = collect();
        foreach ($categories as $item) {
            $tmp = new ProjectCategory();
            $tmp->term_id = $item['id'];
            $newCates->push($tmp);
        }

        if ($project->save()) {
            $project->categories()->attach($newCates);
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Trang chuyên mục + form thêm mới chuyên mục
     */
    public function category($id = 0)
    {
        $term = new ProjectCategory();
        $term->id = 0;
        $term->parent_id = 0;
        $term->locale_source_id = 0;
        return view('backend.project.category')->with('term', $term);
    }

    /**
     * Hiển thị form edit
     */
    public function showEditCategoryForm($id = 0)
    {
        $term = ProjectCategory::find($id);
        if (!$term) {
            return redirect()->action('Backend\ProjectController@category');
        }
        return view('backend.project.category')->with('term', $term);
    }

    /**
     * Thêm mới category
     */
    public function addCategory(Request $request)
    {
        $projectCate = new ProjectCategory();
        $projectCate->name = $request->input('name');
        $projectCate->slug = $request->input('slug');
        $projectCate->type = 'project_category';
        $projectCate->parent_id = $request->input('parent_id');
        $projectCate->status = 'publish';
        $projectCate->locale = session('locale');
        $projectCate->locale_source_id = $request->input('locale_source_id');
        if ($projectCate->save()) {
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
        $projectCate = ProjectCategory::find($request->id);
        $projectCate->name = $request->input('name');
        $projectCate->slug = $request->input('slug');
        $projectCate->parent_id = $request->input('parent_id');
        $projectCate->locale_source_id = $request->input('locale_source_id');
        if ($projectCate->save()) {
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
        $projectCate = ProjectCategory::find($id);
        if ($projectCate->delete()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
}
