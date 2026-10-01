<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['id'];

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class, 'subject_id', 'id');
    }
}
