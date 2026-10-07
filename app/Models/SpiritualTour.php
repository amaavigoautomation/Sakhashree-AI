<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpiritualTour extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'start_date'  => 'date',
        'end_date'    => 'date',
        'is_upcoming' => 'integer',
        'active'      => 'integer',
    ];
}
