<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['role_id','admin_type_id','name','email','password','contact_no','alternate_no','its_seo_users','its_report_manager','image','active','created_at','updated_at'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function roles()
    {
        return $this->belongsTo(RolesRight::class, 'role_id', 'id');
    }

    
    public function adminTypes()
    {
        return $this->belongsTo(AdminType::class,'admin_type_id', 'id');
    }


}
