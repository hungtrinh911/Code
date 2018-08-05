<?php

namespace App;

use App\Base\Thing;

class Blog extends Thing
{
    protected $table = 'things';
    protected $hidden = array('pivot');

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($locale = '', $hasRoot = true, $type = 'blog')
    {
        return parent::orphanList($locale, $hasRoot, $type);
    }
}
