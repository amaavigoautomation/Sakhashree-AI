<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesRight extends Model
{
    use HasFactory;
   
    protected $guarded = ['id'];

    protected $table = 'roles_rights';

   public function menuLinks() 
    {
        return $this->belongsToMany(MenuLink::class, 'roles_rights_menu_links', 'role_id', 'menu_link_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
