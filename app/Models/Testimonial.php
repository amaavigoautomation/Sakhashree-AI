<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'country',
        'city',
        'description',
        'active',
    ];
}
