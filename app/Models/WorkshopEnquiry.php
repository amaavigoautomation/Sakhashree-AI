<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopEnquiry extends Model
{
    protected $table = 'workshop_enquiries';

    protected $guarded = ['id'];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshop_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
