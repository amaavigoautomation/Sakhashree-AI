<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $guarded = ['id'];

    public function getImageUrlAttribute()
    {
        return $this->image_file
            ? asset('public/images/galleries/image_file/' . $this->image_file)
            : asset('public/images/no-image.jpg');
    }
}
