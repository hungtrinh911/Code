<?php

namespace App;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    public function tourguide()
    {
        return $this->belongsToMany(TourGuide::class, 'tour_guide_langs');
    }

}
