<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogBlogTag extends Model
{
    use HasFactory;

    protected $fillable = ['blog_id', 'blog_tag_id','created_at','updated_at'];

    protected $table = 'blogs_blog_tags';

    public function blog_tags()
    {
        return $this->belongsTo(BlogTag::class, 'blog_tag_id');
    }

}
