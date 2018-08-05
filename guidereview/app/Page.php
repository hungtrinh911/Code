<?php

namespace App;

use App\Base\Thing;

class Page extends Thing
{
    protected $table = 'things';
    protected $hidden = array('pivot');

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($locale = '', $hasRoot = true, $type = 'page')
    {
        return parent::orphanList($locale, $hasRoot, $type);
    }
}
