<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLinkUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'menu_links_users'; 
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function menuLink()
    {
        return $this->belongsTo(MenuLink::class, 'menu_link_id');
    }

}
