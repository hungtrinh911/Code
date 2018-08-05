<?php

namespace App\Http\Controllers\Api;

use App\Base\Thing;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Http\Request;
use DB;
use App\Menu;

class ThingController extends ApiController
{
    /**
     * Xóa dữ liệu với nhiều ID
     */
    public function delete(Request $request)
    {
        return response()->json(Thing::whereIn('id', explode(',', $request->input('ids')))->delete());
    }

    public function updateMenuItem(Request $request)
    {
        $id = $request->input('id');
        $thing = Thing::find($id);
        $title = $request->input('title');
        if (!empty($thing) && $title != '') {
            $thing->title = $title;
            $thing->update();
            return response()->json(200);
        }
        return response()->json(500);
    }

    public function deleteMenuItem(Request $request)
    {
        $id = $request->input('id');
        $thing = Thing::deleted($id);
        if ($thing) {
            return $result = ['success' => trans('backend/common.success'), 'status' => 200];
        }
        return $result = ['error' => trans('backend/common.error'), 'status' => 500];
    }

    function saveNestedMenu(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->saveList($request->input('id'), $request->get('list'), 0);
            $result = ['success' => trans('backend/common.success'), 'status' => 200];
            DB::commit();
            return response()->json(json_encode($result));
        } catch (\Exception $ex) {
            //dd($ex->getMessage());
            DB::rollBack();
            $result = ['error' => trans('backend/common.error'), 'status' => 500, 'message' => $ex->getMessage()];
            return response()->json($result);
        }
    }

    function getMenuSlug(Thing $thing, &$slug)
    {
        $ret_slug = '/' . str_slug($thing->title, '-') . $slug;
        if ($thing->parent_id != 0) {
            $parent_things = Thing::getViewTermsThings()->where('id', $thing->parent_id)->first();
            $parent_things_ret = Thing::find($parent_things->id);
            $this->getMenuSlug($parent_things_ret, $ret_slug);
        }
        return $ret_slug;
    }

    function saveList($id, $list, $parent_id = 0, &$m_order = 0)
    {
        $menu = Menu::find($id);
        if ($list != null && !empty($list)) {
            foreach ($list as $item) {
                $m_order++;
                $thing = new Thing();
                $thing_view = Thing::getViewTermsThings()->where('id', $item["id"])->first();
                if (!empty($thing_view)) {
                    $thing = Thing::find($thing_view->id);
                    if (array_key_exists("children", $item)) {
                        $hasChild = true;
                    } else {
                        $hasChild = false;
                    }
                    $metadata = ['hasChild' => $hasChild, 'showOnMenu' => false];
                    $j_metadata = json_encode($metadata);

                    if ($thing->parent_id != 0) {
                        $slug_param = '';
                        $slug = '/' . $thing_view->slug . '/' . $this->getMenuSlug($thing, $slug_param);
                        //$thing->slug = '/primary-menu/' . $slug;
                    } else {
                        $slug = '/' . $thing_view->slug . '/' . str_slug($thing->title, '-');
                    }

                    $thing->slug = $slug;
                    $thing->parent_id = $parent_id;
                    $thing->metadata = $j_metadata;
                    $thing->order_index = $m_order;
                    $thing->update();
                    $thing->terms()->sync($id);
                } else {
                    //$thing = new Thing();
                    $thing_source = Thing::find($item['id']);
                    $thing->title = $thing_source->title;
                    $thing->parent_id = $parent_id;
                    $thing->order_index = $m_order;
                    $thing->type = 'menu_item';
                    if ($thing->parent_id != 0) {
                        $thing_parent = Thing::find($parent_id);
                        $slug_param = '';
                        $slug = '/' . $thing_parent->slug . '/' . $this->getMenuSlug($thing, $slug_param);
                        //$thing->slug = '/primary-menu/' . $slug;
                    } else {
                        $slug = '/' . $menu->slug . '/' . str_slug($thing->title, '-');
                    }
                    $thing->slug = $slug;//$this->getMenuSlug($thing, $thing->slug);
                    $thing->status = 'publish';

                    if (array_key_exists("children", $item)) {
                        $hasChild = true;
                    } else {
                        $hasChild = false;
                    }

                    $metadata = ['hasChild' => $hasChild, 'showOnMenu' => false];
                    $thing->metadata = json_encode($metadata);
                    $thing->locale = session('locale');
                    $thing->save();

                    $thing->terms()->attach($id);
                }

                if (array_key_exists("children", $item)) {
                    $this->saveList($id, $item["children"], $item["id"], $m_order);
                }
            }
        }
    }


}
