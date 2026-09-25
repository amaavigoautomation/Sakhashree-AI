<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $guarded = ['id'];

    public function enquiries()
    {
        return $this->hasMany(EventEnquiry::class, 'event_id');
    }

    protected $casts = [
        'active' => 'boolean',
        'is_past_event' => 'boolean',
    ];
}
