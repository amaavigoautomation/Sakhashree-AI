<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSeo;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    use HasSeo;

    public function seoPageNameSource(): string { return $this->title; }

    public function seoTitleSource(): string
    {
        return "Spiritual Blogs & Insights | Sakhashree Neeta";
    }

    public function seoDescriptionSource(): string
    {
        return "Explore spiritual blogs, healing insights and wisdom from Sakhashree Neeta to guide your inner journey.";
    }

    protected $guarded = ['id'];

    public function blogauthor(){
        return $this->belongsTo(BlogAuthor::class, 'blog_author_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function blogtags()
    {
        return $this->belongsToMany(BlogTag::class, 'blogs_blog_tags', 'blog_id', 'blog_tag_id');
    }

    public function blogcategory(){
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }

}
