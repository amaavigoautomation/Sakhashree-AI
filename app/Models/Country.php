<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = ['id'];
    protected $table = 'countries';

    use HasFactory;

    protected $primaryKey = 'id';

    public function countryDetails()
    {
        return $this->hasMany(CountryDetail::class, 'country_id', 'id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }

    public function timezones()
    {
        return $this->hasMany(Timezone::class, 'country_id', 'id');
    }

    public function countries()
    {
        return $this->hasMany(Enquiry::class, 'country_id', 'id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
