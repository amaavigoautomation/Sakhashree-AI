<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSeo;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    use HasFactory;
    use HasSeo;

    public function seoPageNameSource(): string { return $this->title; }
    public function seoTitleSource(): string { return "{$this->title} | Sakhashree"; }
    public function seoDescriptionSource(): string { return Str::limit(strip_tags($this->description), 150); }

    protected $guarded = ['id'];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_category_id', 'id');
    }
}
