<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  Enquiry extends Model
{
    protected $table = 'enquiries';

    protected $fillable = [
        'full_name',
        'email',
        'country_id',
        'description',
    ];

    public $timestamps = false;
}
