<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    protected $fillable = [
        'faq_type_id',
        'question',
        'answer',
        'active',
    ];

    public function faqType()
{
    return $this->belongsTo(FaqType::class, 'faq_type_id', 'id');
}
}
