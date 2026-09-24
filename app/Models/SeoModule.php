<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\SeoModuleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([SeoModuleObserver::class])]
class SeoModule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
