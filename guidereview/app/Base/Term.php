<?php

namespace App\Base;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /*
     * Danh sách các things của term
     */
    public function things()
    {
        return $this->belongsToMany(Thing::class, 'terms_things');
    }

    /**
     * Lấy danh sách
     * @param $type Loại term: backend_menu, news_category
     * @param $locale Ngôn ngữ: vi, en
     * @return mixed
     */
    public static function list($type, $locale)
    {
        return Term::where([
            ['type', $type],
            ['locale', $locale],
        ])->get();
    }

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($type)
    {
        return Term::where([
            ['type', $type],
            ['locale_source_id', 0],
            ['locale', '!=', session('locale')],
        ])->whereNotIn('id', function ($query) {
            $query->select('locale_source_id')->from('terms');
        })->get();
    }

    /**
     * Build danh sách theo dạng cây phân cấp
     * @param $type
     * @param $tree
     * @param string $locale
     * @param $hasRoot
     * @param $childNamePrefix
     * @param $removeId
     * @param int $parentId
     * @param int $level
     * @return mixed
     */
    protected static function buildTree($type, $tree, $locale = '', $hasRoot, $childNamePrefix, $removeId, $parentId = 0, $level = 0)
    {
        if ($hasRoot) {
            $root = new Term();
            $root->id = 0;
            $root->name = '----------';
            $tree->put($root->id, $root);
        }

        $items = Term::where([
            ['type', $type],
            ['parent_id', $parentId],
            ['locale', $locale == '' ? session('locale') : $locale],
            ['id', '!=', $removeId],
        ])->orderBy('name')->get();

        $prefix = str_repeat($childNamePrefix, $level);
        $level++;
        foreach ($items as $item) {
            $item->name = trim($prefix . ' ' . $item->name);
            $tree->put($item->id, $item);
            self::buildTree($type, $tree, $locale, $hasRoot, $childNamePrefix, $removeId, $item->id, $level);
        }

        return $tree;
    }


}
