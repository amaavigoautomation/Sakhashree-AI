<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $guarded = ['id'];

    public function enquiries()
    {
        return $this->hasMany(WorkshopEnquiry::class, 'workshop_id');
    }
}
