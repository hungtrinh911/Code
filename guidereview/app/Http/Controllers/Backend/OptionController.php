<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Hiển thị trang cập nhật
     */
    public function showEditForm()
    {
        $lst = Option::where('locale', '')->orWhere('locale', session('locale'))->get();
        $option = new \stdClass();

        foreach ($lst as $item) {
            $option->{$item->key} = $item->value;
        }
        $option->site_keywords = implode(',', json_decode($option->site_keywords));

        return view('backend.option.edit')->with('option', $option);
    }

    /**
     * Cập nhật
     */
    public function edit(Request $request)
    {
        /* Basic */
        $option = Option::where('key', 'site_name')->first();
        $option->value = $request->input('site_name');
        $option->save();
        Option::forget('site_name');

        $option = Option::where('key', 'site_url')->first();
        $option->value = $request->input('site_url');
        $option->save();
        Option::forget('site_url');

        $option = Option::where('key', 'site_icon')->first();
        $option->value = $request->input('site_icon');
        $option->save();
        Option::forget('site_icon');

        $option = Option::where('key', 'site_logos')->first();
        $option->value = $request->input('site_logos');
        $option->save();
        Option::forget('site_logos');

        $option = Option::where('key', 'site_copyright')->first();
        $option->value = $request->input('site_copyright');
        $option->save();
        Option::forget('site_copyright');

        $option = Option::where('key', 'site_address')->where('locale', session('locale'))->first();
        $option->value = $request->input('site_address');
        $option->save();
        Option::forget('site_address');

        $option = Option::where('key', 'site_hotline')->first();
        $option->value = $request->input('site_hotline');
        $option->save();
        Option::forget('site_hotline');

        $option = Option::where('key', 'site_telephone')->first();
        $option->value = $request->input('site_telephone');
        $option->save();
        Option::forget('site_telephone');

        $option = Option::where('key', 'site_email')->first();
        $option->value = $request->input('site_email');
        Option::forget('site_email');

        /* SEO */
        $option = Option::where('key', 'site_title')->where('locale', session('locale'))->first();
        $option->value = $request->input('site_title');
        $option->save();
        Option::forget('site_title');

        $option = Option::where('key', 'site_description')->where('locale', session('locale'))->first();
        $option->value = $request->input('site_description');
        $option->save();
        Option::forget('site_description');

        $option = Option::where('key', 'site_keywords')->where('locale', session('locale'))->first();
        $option->value = json_encode(array_map('trim', explode(',', $request->input('site_keywords'))));
        $option->save();
        Option::forget('site_keywords');

        $option = Option::where('key', 'site_image')->first();
        $option->value = $request->input('site_image');
        Option::forget('site_image');

        $option = Option::where('key', 'gg_analytics_tracking_id')->first();
        $option->value = $request->input('gg_analytics_tracking_id');
        Option::forget('gg_analytics_tracking_id');

        /* Social Networks */
        $option = Option::where('key', 'fb_app_id')->first();
        $option->value = $request->input('fb_app_id');
        Option::forget('fb_app_id');

        $option = Option::where('key', 'fb_page_link')->first();
        $option->value = $request->input('fb_page_link');
        Option::forget('fb_page_link');

        if ($option->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
}
