<?php

namespace App;

use App\Base\Thing;

class Project extends Thing
{
    protected $table = 'things';
    protected $hidden = array('pivot');

    public function categories()
    {
        return $this->belongsToMany(ProjectCategory::class, 'terms_things', 'thing_id', 'term_id');
    }

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($locale = '', $hasRoot = true, $type = 'project')
    {
        return parent::orphanList($locale, $hasRoot, $type);
    }

    // Hien su dung cho frontend
    public static function randomList($limit = 5)
    {
        $list = Thing::where('locale', app()->getLocale())
            ->whereIn('type', ['project'])
            ->whereIn('status', ['publish'])
            ->inRandomOrder()
            ->limit($limit)
            ->get();
        return $list;
    }

    // Hien su dung cho frontend
    public static function random()
    {
        return Thing::where('locale', app()->getLocale())
            ->whereIn('type', ['project'])
            ->whereIn('status', ['publish'])
            ->inRandomOrder()
            ->first();
    }
}
