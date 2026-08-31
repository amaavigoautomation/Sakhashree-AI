<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryDetail extends Model
{
    use HasFactory;
    public $timestamps = false; 

    protected $fillable = ['country_id', 'cover_image', 'icon_image','created','modified'];

    protected $table = 'country_details';

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
