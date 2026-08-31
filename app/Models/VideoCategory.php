<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    
    public function videos()
    {
        return $this->hasMany(Video::class,'video_category_id', 'id');
    }

}
