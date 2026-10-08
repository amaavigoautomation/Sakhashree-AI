<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function roles()
    {
        return $this->belongsTo(RolesRight::class, 'role_id', 'id');
    }


    public function adminTypes()
    {
        return $this->belongsTo(AdminType::class,'admin_type_id', 'id');
    }


}
