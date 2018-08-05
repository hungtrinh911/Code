<?php

namespace App;

use App\Base\Thing;

class Event extends Thing
{
    protected $table = 'things';
    protected $hidden = array('pivot');

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($locale = '', $hasRoot = true, $type = 'event')
    {
        return parent::orphanList($locale, $hasRoot, $type);
    }
}
