<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $timestamps = false; // Disable Laravel's default timestamps

    protected $guarded = ['id'];

    // Define the belongsTo relationship
    // public function blogcategory()
    // {
    //     return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    // }
    // Define the belongsTo relationship
    public function blogauthor()
    {
        return $this->belongsTo(BlogAuthor::class, 'blog_author_id', 'id');
    }

    public function blogtags()
    {
        return $this->belongsToMany(BlogTag::class, 'blogs_blog_tags', 'blog_id', 'blog_tag_id');
    }
}
