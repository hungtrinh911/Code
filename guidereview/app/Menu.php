<?php
/**
 * Created by PhpStorm.
 * User: tuannm2
 * Date: 6/26/2018
 * Time: 12:28 AM
 */

namespace App;

use App\Base\Term;
use DB;
use App\Base\Thing;

class Menu extends Term
{
    protected $table = 'terms';
    protected $hidden = array('pivot');

    public static function get($locale, $menu_slug)
    {
//        $tree = collect();
//        MenuItem::buildTree($tree, $locale, $menu_slug, 0);
//        return $tree;
        return MenuItem::buildTree($locale, $menu_slug);
    }

    public function items()
    {
        return parent::things();
    }

    /*
     * Lay danh sanh menu front-end
     */

    public static function pagedListMenuTerm($locale, $search)
    {

        $list = Menu::getListMenu();

        if ($search != null && $search != '')
            $list = $list->where('things.title', 'like', '%' . $search . '%');
        return $list;
    }

    public static function getListMenu()
    {
        /*
        $result = DB::table('things')
            ->selectRaw('things.id,
                things.order_index,
                things.type,
                things.created_at,
                things.updated_at,
                things.title,
                things.locale,
                things.slug as things_slug,
                things.featured_img,
                things.metadata,
                things.parent_id,
                terms.name,
                terms.slug,
                terms.type')
            ->join('terms_things', 'terms_things.thing_id', '=', 'things.id')
            ->join('terms', 'terms.id', '=', 'terms_things.term_id')
            ->where([
                ['things.type', 'menu_item'],
                ['terms.type', 'frontend_menu'],
            ]);
        */
        $result = MenuItem::buildTreeMenu(session('locale'), 'frontend_menu');
        //dd($result);
        return $result;
    }


    public static function countMenu($locale, $search, $type = 'frontend_menu')
    {
        $list = Menu::getListMenu()->where('terms.locale', $locale);
        if ($search != null && $search != '')
            $list = $list->where('things.title', 'like', '%' . $search . '%');

        return $list->count();
    }

    /**
     * Danh sách được phân trang
     * @param $locale
     * @param $search
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public static function pagedList($locale, $search, $offset, $limit)
    {
        $list = DB::table('things')
            ->selectRaw('things.id,
                things.type,
                things.created_at,
                things.updated_at,
                things.title,
                things.locale,
                things.slug as things_slug,
                things.featured_img,
                things.metadata,
                things.parent_id,
                terms.name,
                terms.type')
            ->join('terms_things', 'terms_things.thing_id', '=', 'things.id')
            ->join('terms', 'terms.id', '=', 'terms_things.term_id')
            ->where([
                ['things.type', 'menu_item'],
                ['things.locale', $locale],
            ])
            ->where('title', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->orderBy('things.order_index')->get();
        return $list;
    }


    /*
     * Count số bản ghi theo điều kiện tìm kiếm để phân trang
     */
    public static function count($locale, $search)
    {
        $list = DB::table('things')
            ->selectRaw('things.id,
                things.type,
                things.created_at,
                things.updated_at,
                things.title,
                things.locale,
                things.slug as things_slug,
                things.featured_img,
                things.metadata,
                things.parent_id,
                terms.name,
                terms.type')
            ->join('terms_things', 'terms_things.thing_id', '=', 'things.id')
            ->join('terms', 'terms.id', '=', 'terms_things.term_id')
            ->where([
                ['things.type', 'menu_item'],
                ['things.locale', $locale],
            ])
            ->where('title', 'like', '%' . $search . '%')
            ->count();
        return $list;
    }

    /*
     * lay menu theo type (frontend, backend)
     */
    public static function getMenu($locale, $type, $hasRoot = true)
    {
        $list = Menu::where('locale', $locale == '' ? session('locale') : $locale)
            ->where('type', $type)
            ->get();
        if ($hasRoot) {
            $menu = new Menu();
            $menu->id = 0;
            $menu->name = "----------";
            $list->push($menu);
        }
        return $list->sortBy('id');
    }

    public static function getOrderIndex($locale, $type, $hasRoot = true)
    {
        return Menu::getMenu($locale, $type, true)->count();
    }


    /*
     * Lay thing theo term_id
     */
    public static function getThings($menu_id, $locale)
    {
        $list = DB::table('things')
            ->selectRaw('things.id,
                things.type,
                things.created_at,
                things.updated_at,
                things.title,
                things.locale,
                things.slug as things_slug,
                things.featured_img,
                things.metadata,
                things.parent_id,
                things.order_index,
                terms.name,
                terms.type')
            ->join('terms_things', 'terms_things.thing_id', '=', 'things.id')
            ->join('terms', 'terms.id', '=', 'terms_things.term_id')
            ->where([
                ['terms_things.term_id', $menu_id],
                ['things.locale', $locale],
            ])->get();
        return $list;
    }

    /*
     * Lay thing theo term_id với extra info
     */
    public static function getThingsExtra($menu_id, $locale, $parent_id = 0)
    {
        $list = DB::table('things')
            ->selectRaw('things.id,
                things.type as things_type,
                things.created_at,
                things.updated_at,
                things.title,
                things.locale,
                things.slug as things_slug,
                things.featured_img,
                things.metadata,
                things.parent_id,
                things.order_index,
                terms.name,
                terms.type')
            ->join('terms_things', 'terms_things.thing_id', '=', 'things.id')
            ->join('terms', 'terms.id', '=', 'terms_things.term_id')
            ->where([
                ['terms_things.term_id', $menu_id],
                ['things.locale', $locale],
                ['things.parent_id', $parent_id]
            ])->get();

//        foreach ($list as $item){
//            $metadata = json_decode($item->metadata);
//            foreach (get_object_vars($metadata) as $key => $value) {
//                $item->{$key} = $value;
//            }
//        }



        foreach ($list as $item) {

            $temp = (array)json_decode($item->metadata);

            //$item->menu_item_slug = Helper::currentRoutePrefix() . $item->menu_item_slug;

            if (array_key_exists('hasChild', $temp)) {
                $item->hasChild = $temp['hasChild'];
            } else {
                $item->hasChild = false;
            }

            if (array_key_exists('showOnMenu', $temp)) {
                $item->showOnMenu = $temp['showOnMenu'];
            } else {
                $item->showOnMenu = false;
            }

            if ($item->hasChild) {
                $subItems = Menu::getThingsExtra($menu_id, $locale,$item->id);
                $item->children = $subItems;
            }
        }
        return $list;
    }

}
