<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationType extends Model
{
    protected $guarded = ['id'];

    protected $table = 'consultation_types';

    public $timestamps = false;

    public function consultants()
    {
        return $this->hasMany(Consultant::class, 'consultation_type_id');
    }
}
