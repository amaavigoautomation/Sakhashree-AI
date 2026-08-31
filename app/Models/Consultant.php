<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    protected $guarded = ['id'];

    protected $table = 'consultations';

    public $timestamps = false;

    public function consultationType()
    {
        return $this->belongsTo(ConsultationType::class, 'consultation_type_id');
    }
}
