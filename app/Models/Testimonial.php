<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $guarded = ['id'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
