<?php

namespace App;

use App\Base\Thing;

class News extends Thing
{
    protected $table = 'things';
    protected $hidden = array('pivot');

    public function categories()
    {
        return $this->belongsToMany(NewsCategory::class, 'terms_things', 'thing_id', 'term_id');
    }

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($locale = '', $hasRoot = true, $type = 'news')
    {
        return parent::orphanList($locale, $hasRoot, $type);
    }

    public static function pagedList($locale = 'vi', $type = 'news', $search = false, $offset = 0, $limit = 10)
    {
        return parent::pagedList($locale, $type, $search, $offset, $limit);
    }
    
     public static function orphanListTrainingCourse($locale = '', $hasRoot = true, $type = 'trainingcourse')
    {
        return parent::orphanList($locale, $hasRoot, $type);
    }
    public static function orphanListTrainingCourseEdit($locale = '', $hasRoot = true, $type = 'trainingcourse',$id=0)
    {
        return parent::orphanListEdit($locale, $hasRoot, $type,$id);
    }
   
    public static function orphanListJobSearchEdit($locale = '', $hasRoot = true, $type = 'jobsearch',$id=0)
    {
        return parent::orphanListEdit($locale, $hasRoot, $type,$id);
    }
    public static function orphanListJobSearch($locale = '', $hasRoot = true, $type = 'jobsearch')
    {
        return parent::orphanList($locale, $hasRoot, $type);
    }
}
