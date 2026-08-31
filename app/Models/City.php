<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable Laravel's default timestamps

    protected $fillable = ['country_id', 'state_id', 'timezone_id', 'name' ,'active','created','modified'];

     protected $table = 'cities';

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }
}
