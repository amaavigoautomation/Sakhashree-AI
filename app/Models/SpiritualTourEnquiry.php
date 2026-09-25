<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpiritualTourEnquiry extends Model
{
    protected $table = 'spiritual_tour_enquiries';

    protected $guarded = ['id'];

    public function spiritualTour()
    {
        return $this->belongsTo(SpiritualTour::class, 'spiritual_tour_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
