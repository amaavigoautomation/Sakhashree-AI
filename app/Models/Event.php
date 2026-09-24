<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'title',
        'date',
        'start_time',
        'end_time',
        'day',
        'time_code',
        'description',
        'video_link',
        'city_name',
        'image_file',
        'active',
        'is_past_event'
    ];

    public function enquiries()
    {
        return $this->hasMany(EventEnquiry::class, 'event_id');
    }

    protected $casts = [
        'active' => 'boolean',
        'is_past_event' => 'boolean',
    ];
}
