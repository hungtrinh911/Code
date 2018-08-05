<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TourGuide extends Model
{
    //
    public function tourguide()
    {
        return $this->belongsToMany(TourGuide::class, 'tour_guide_langs');
    }
}
