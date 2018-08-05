<?php

namespace App\Http\Controllers\Backend;

use App\Base\Thing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    /**
     * Hiển thị trang cập nhật
     */
    public function showHome()
    {
        $home = Thing::where('slug', 'home')->first();
        if ($home == null) {
            $home = new Thing();
            $home->id = '';
            $home->title = 'Trang chủ';
            $home->slug = 'home';
            $home->type = 'landing_page';
            $home->author_id = Auth::user()->id;
            $home->status = 'publish';
            $home->locale = session('locale');

            $section1 = new \stdClass();
            $section1->video = '';

            $section2 = new \stdClass();
            $section2->bg_image = '';
            $section2->text = '';

            $section3 = new \stdClass();
            $section3->title = '';
            $section3->text = '';
            $section3->projects = array();

            $section4 = new \stdClass();
            $section4->comment = '';
            $section4->name = '';
            $section4->job_title = '';
            $section4->image = '';

            $section5 = new \stdClass();
            $section5->title = '';
            $section5->services = array();

            $section6 = new \stdClass();
            $section6->comment = '';
            $section6->name = '';
            $section6->job_title = '';
            $section6->image = '';

            $section7 = new \stdClass();
            $section7->image = '';
            $section7->title = '';
            $section7->text = '';
            $section7->articles = array();
            $section7->button_label = '';
            $section7->button_link = '';

            $section8 = new \stdClass();
            $section8->comment = '';
            $section8->name = '';
            $section8->job_title = '';
            $section8->image = '';

            $section9 = new \stdClass();
            $section9->title = '';
            $section9->text = '';
            $section9->newsevents = array();

            $metadata = new \stdClass();
            $metadata->section1 = $section1;
            $metadata->section2 = $section2;
            $metadata->section3 = $section3;
            $metadata->section4 = $section4;
            $metadata->section5 = $section5;
            $metadata->section6 = $section6;
            $metadata->section7 = $section7;
            $metadata->section8 = $section8;
            $metadata->section9 = $section9;

            $home->metadata = json_encode($metadata);
        }

        $metadata = json_decode($home->metadata);
        foreach (get_object_vars($metadata) as $key => $value) {
            $home->{$key} = $value;
        }

        $home->newsevents = Thing::list(app()->getLocale(), ['news', 'event']);
        $home->articles = Thing::list(app()->getLocale(), ['blog']);
        $home->projects = Thing::list(app()->getLocale(), ['project']);

        return view('backend.landingpage.home')->with('thing', $home);
    }

    /**
     * Cập nhật
     */
    public function home(Request $request)
    {
        $home = Thing::where('slug', 'home')->first();
        if ($home == null) {
            $home = new Thing();
            $home->title = 'Trang chủ';
            $home->slug = 'home';
            $home->type = 'landing_page';
            $home->author_id = Auth::user()->id;
            $home->status = 'publish';
            $home->locale = session('locale');
        }

        $section1 = new \stdClass();
        $section1->video = $request->input('section1_video');

        $section2 = new \stdClass();
        $section2->bg_image = $request->input('section2_bg_image');
        $section2->text = $request->input('section2_text');

        $section3 = new \stdClass();
        $section3->title = $request->input('section3_title');
        $section3->text = $request->input('section3_text');
        $projects = $request->input('section3_projects');
        $section3->projects = isset($projects) ? $projects : array();

        $section4 = new \stdClass();
        $section4->comment = $request->input('section4_comment');
        $section4->name = $request->input('section4_name');
        $section4->job_title = $request->input('section4_job_title');
        $section4->image = $request->input('section4_image');

        $section5 = new \stdClass();
        $section5->title = $request->input('section5_title');

        $service_indexes = $request->input('section5_service_index');
        $service_titles = $request->input('section5_service_title');
        $service_images = $request->input('section5_service_image');
        $service_texts = $request->input('section5_service_text');
        $services = collect();

        if ($service_indexes != null) {
            $i = 1;
            foreach ($service_indexes as $index) {
                $tmp = new \stdClass();
                $tmp->index = $i;
                $tmp->title = $service_titles[$index];
                $tmp->image = $service_images[$index];
                $tmp->text = $service_texts[$index];
                $services->push($tmp);
                $i++;
            }
        }
        $section5->services = $services;

        $section6 = new \stdClass();
        $section6->comment = $request->input('section6_comment');
        $section6->name = $request->input('section6_name');
        $section6->job_title = $request->input('section6_job_title');
        $section6->image = $request->input('section6_image');

        $section7 = new \stdClass();
        $section7->image = $request->input('section7_image');
        $section7->title = $request->input('section7_title');
        $section7->text = $request->input('section7_text');
        $articles = $request->input('section7_articles');
        $section7->articles = isset($articles) ? $articles : array();
        $section7->button_label = $request->input('section7_button_label');
        $section7->button_link = $request->input('section7_button_link');

        $section8 = new \stdClass();
        $section8->comment = $request->input('section8_comment');
        $section8->name = $request->input('section8_name');
        $section8->job_title = $request->input('section8_job_title');
        $section8->image = $request->input('section8_image');

        $section9 = new \stdClass();
        $section9->title = $request->input('section9_title');
        $section9->text = $request->input('section9_text');
        $newsevents = $request->input('section9_newsevents');
        $section9->newsevents = isset($newsevents) ? $newsevents : array();

        // Lưu metadata
        $metadata = [
            'section1' => $section1,
            'section2' => $section2,
            'section3' => $section3,
            'section4' => $section4,
            'section5' => $section5,
            'section6' => $section6,
            'section7' => $section7,
            'section8' => $section8,
            'section9' => $section9,
        ];
        $home->metadata = json_encode($metadata);

        if ($home->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
}
