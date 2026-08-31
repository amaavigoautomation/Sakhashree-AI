<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['country_id', 'name', 'active','created','modified'];

    protected $table = 'states';

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}



