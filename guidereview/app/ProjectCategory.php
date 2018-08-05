<?php

namespace App;

use App\Base\Term;

class ProjectCategory extends Term
{
    protected $table = 'terms';
    protected $hidden = array('pivot');

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($type = 'project_category')
    {
        return parent::orphanList($type);
    }

    /**
     * Lấy ra danh sách theo dạng cây phân cấp
     */
//    public static function tree($locale = '', $hasRoot = true, $childNamePrefix = '---', $removeId = 0)
//    {
//        $tree = collect();
//        return parent::buildTree('project_category', $tree, $locale, $hasRoot, $childNamePrefix, $removeId, 0, 0);
//    }

    public static function tree($locale = '', $hasRoot = true, $childNamePrefix = '---', $removeId = 0)
    {
        $tree = collect();
        return parent::buildTree('project_category', $tree, $locale, $hasRoot, $childNamePrefix, $removeId, 0, 0);
    }

}
