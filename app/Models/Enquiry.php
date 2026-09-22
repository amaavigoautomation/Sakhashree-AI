<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = 'enquiries';

    protected $fillable = [
        'full_name',
        'email',
        'country_code',
        'phone',
        'country_id',
        'subject_id',
        'description',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
