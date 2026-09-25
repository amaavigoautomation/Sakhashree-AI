<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSeo;
use App\Observers\HasSeoObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([HasSeoObserver::class])]
class News extends Model
{
    use HasSeo;
    protected $guarded = ['id'];

    public function seoPageNameSource(): string { return $this->title; }

    public function seoTitleSource(): string
    {
        return "Latest News & Updates | Sakhashree Neeta";
    }

    public function seoDescriptionSource(): string
    {
        return "Stay updated with the latest news, events and happenings from Sakhashree Neeta.";
    }
}
