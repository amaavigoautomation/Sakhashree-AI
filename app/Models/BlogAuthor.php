<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogAuthor extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // public $timestamps = false; // Disable Laravel's default timestamps  

    
    

    // Define the hasMany relationship
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_author_id', 'id');
    }
}
