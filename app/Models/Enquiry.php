<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = 'enquiries';

    protected $guarded = ['id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
