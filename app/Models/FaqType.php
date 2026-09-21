<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqType extends Model
{
    protected $table = 'faq_types';

    protected $fillable = [
        'name',
        'icon',
        'active',
    ];

     public function faqs()
    {
        return $this->hasMany(Faq::class, 'faq_type_id', 'id');
    }
}
