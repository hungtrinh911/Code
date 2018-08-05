<?php

namespace App;

use App\Base\Thing;
use Illuminate\Support\Facades\DB;

class MenuItem extends Thing
{
    protected $table = 'things';
    protected $hidden = array('pivot');

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id', 'id');
    }

    public function permission()
    {
        return $this->hasOne(Permission::class, 'thing_id');
    }

    public static function buildTree($locale, $menu_slug, $parentId = 0)
    {
        $items = DB::table('things')
            ->selectRaw('things.id,
                things.title,
                things.slug as menu_item_slug,
                things.featured_img,
                things.metadata,
                things.parent_id')
            ->join('terms_things', 'terms_things.thing_id', '=', 'things.id')
            ->join('terms', 'terms.id', '=', 'terms_things.term_id')
            ->where([
                ['things.type', 'menu_item'],
                ['things.locale', $locale],
                ['terms.slug', $menu_slug],
                ['things.parent_id', $parentId],
            ])
            ->orderBy('things.order_index')->get();

        foreach ($items as $item) {
            $temp = (array)json_decode($item->metadata);

            $item->menu_item_slug = str_replace(Helper::currentRoutePrefix() . $menu_slug, '', $item->menu_item_slug);
            if (array_key_exists('hasChild', $temp)) {
                $item->hasChild = $temp['hasChild'];
            } else {
                $item->hasChild = false;
            }

            if ($item->hasChild) {
                $subItems = self::buildTree($locale, $menu_slug, $item->id);
                $item->children = $subItems;
            }
        }

        return $items;
    }

    public static function buildTreeMenu($locale, $menu_type, $parentId = 0)
    {
        $items = DB::table('things')
            ->selectRaw('things.id,
                things.title,
                things.locale,
                things.slug as menu_item_slug,
                things.featured_img,
                things.created_at,
                things.updated_at,
                things.metadata,
                things.parent_id,
                terms.slug,
                terms.name,
                terms.type')
            ->join('terms_things', 'terms_things.thing_id', '=', 'things.id')
            ->join('terms', 'terms.id', '=', 'terms_things.term_id')
            ->where([
                ['things.type', 'menu_item'],
                ['things.locale', $locale],
                ['terms.type', $menu_type],
                ['things.parent_id', $parentId],
            ])
            ->orderBy('things.order_index')->get();

        foreach ($items as $item) {
            $temp = (array)json_decode($item->metadata);

            $item->menu_item_slug = str_replace(Helper::currentRoutePrefix() . $menu_type, '', $item->menu_item_slug);
            if (array_key_exists('hasChild', $temp)) {
                $item->hasChild = $temp['hasChild'];
            } else {
                $item->hasChild = false;
            }

            if ($item->hasChild) {
                $subItems = self::buildTree($locale, $menu_type, $item->id);
                $item->children = $subItems;
            }
        }

        return $items;
    }

}
