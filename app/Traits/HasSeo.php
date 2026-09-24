<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSeo
{
    abstract public function seoPageNameSource(): string;
    abstract public function seoTitleSource(): string;
    abstract public function seoDescriptionSource(): string;
}
