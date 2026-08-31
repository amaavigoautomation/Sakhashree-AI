<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoTag extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'videos_video_tags', 'video_tag_id', 'video_id');
    }

    public function videos_video_tags()
    {
        return $this->hasMany(VideosVideoTag::class,'video_tag_id', 'id');
    }
}
