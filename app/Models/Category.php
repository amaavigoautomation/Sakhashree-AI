<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

        public function subcategory()
        {
            return $this->hasMany(SubCategory::class, 'category_id', 'id');
        }
        public function producttype()
        {
            return $this->hasMany(ProductType::class, 'category_id', 'id');
        }
        public function product()
        {
            return $this->hasMany(Product::class, 'category_id', 'id');
        }
}
