<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blogs_blog_tags', 'blog_tag_id', 'blog_id');
    }

    public function blogs_blog_tags()
    {
        return $this->hasMany(BlogBlogTag::class,'blog_tag_id', 'id');
    }

    



}
