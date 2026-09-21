<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialVideo extends Model
{
    protected $table = 'testimonial_video';

    protected $fillable = [
        'name',
        'designation',
        'image',
        'video_link',
        'active',
    ];
}