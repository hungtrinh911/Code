<?php

namespace App\Http\Controllers\Backend;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends ThingController
{
    /**
     * Trang chủ
     */
    public function index()
    {
        return view('backend.event.index');
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showAddForm()
    {
        return view('backend.event.add');
    }

    /**
     * Thêm mới
     */
    public function add(Request $request)
    {
        $event = new Event();
        $event->title = $request->input('title');
        $event->slug = $request->input('slug');
        $event->featured_img = $request->input('featured_img');
        $event->excerpt = $request->input('excerpt');
        $event->content = $request->input('content');
        $event->type = 'event';
        $event->author_id = Auth::user()->id;
        $event->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $event->locale = session('locale');
        $event->locale_source_id = $request->input('locale_source_id');

        $tags = array_map('trim', explode(',', $request->input('tags')));
        $metadata = [
            'tags' => $tags,
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
            'place' => $request->input('place'),
        ];
        $event->metadata = json_encode($metadata);

        if ($event->save()) {
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
        $event = Event::find($id);
        if (!$event) {
            return redirect()->action('Backend\EventController@index');
        }
        $metadata = json_decode($event->metadata);
        foreach (get_object_vars($metadata) as $key => $value) {
            $event->{$key} = $value;
        }
        $event->tags = implode(',', $metadata->tags);
        return view('backend.event.edit')->with('thing', $event);
    }

    /**
     * Cập nhật
     */
    public function edit(Request $request)
    {
        $event = Event::find($request->input('id'));

        $event->title = $request->input('title');
        $event->slug = $request->input('slug');
        $event->featured_img = $request->input('featured_img');
        $event->excerpt = $request->input('excerpt');
        $event->content = $request->input('content');
        $event->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $event->locale_source_id = $request->input('locale_source_id');

        $tags = array_map('trim', explode(',', $request->input('tags')));
        $metadata = [
            'tags' => $tags,
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
            'place' => $request->input('place'),
        ];
        $event->metadata = json_encode($metadata);

        if ($event->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
}
