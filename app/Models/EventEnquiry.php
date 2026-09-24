<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventEnquiry extends Model
{
    protected $table = 'event_enquiries';

    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
