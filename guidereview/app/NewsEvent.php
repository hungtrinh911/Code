<?php

namespace App;

use App\Base\Thing;
use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    protected $table = 'things';
    protected $hidden = array('pivot');

    // Hien su dung cho frontend
    public static function randomList($limit = 5)
    {
        $list = Thing::where('locale', app()->getLocale())
            ->whereIn('type', ['news', 'event'])
            ->whereIn('status', ['publish'])
            ->inRandomOrder()
            ->limit($limit)
            ->get();
        return $list;
    }

    // Hien su dung cho frontend
    public static function random()
    {
        $thing = Thing::where('locale', app()->getLocale())
            ->whereIn('type', ['event'])
            ->whereIn('status', ['publish'])
            ->inRandomOrder()
            ->first();

        if ($thing->type == 'event') {
            $metadata = json_decode($thing->metadata);
            $thing->startTime = date('d/m/Y H:i', strtotime($metadata->startTime));
            $thing->endTime = date('d/m/Y H:i', strtotime($metadata->endTime));
            $thing->place = $metadata->place;
        }

        return $thing;
    }
}
