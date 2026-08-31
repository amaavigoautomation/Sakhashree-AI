<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideosVideoTag extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public $timestamps = false;

    protected $fillable = ['video_id', 'video_tag_id'];

    protected $table = 'videos_video_tags';

   
    public function videos()
    {
        return $this->belongsTo(Blog::class, 'video_id');
    }

    public function tags()
    {
        return $this->belongsTo(VideoTag::class, 'video_tag_id');
    }


}
