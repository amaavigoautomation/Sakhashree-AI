<?php

namespace App\Observers;

use App\Models\SeoModule;
use Illuminate\Support\Str;

class SeoModuleObserver
{
    public function creating(SeoModule $seoModule): void
    {
        $pageName = trim($seoModule->page_name ?? '');

        $seoModule->page_slug = $pageName
            ? Str::slug($pageName)
            : 'sakhashree-' . uniqid();

        if (empty($seoModule->page_title)) {
            $seoModule->page_title = Str::limit(
                'Sakhashree Neeta | Spiritual Guide & Healer',
                60,
                ''
            );
        }

        if (empty($seoModule->meta_description)) {
            $seoModule->meta_description = Str::limit(
                'Discover spiritual healing, workshops and guidance with Sakhashree Neeta.',
                160,
                ''
            );
        }
    }

    public function updating(SeoModule $seoModule): void
    {
        if ($seoModule->isDirty('page_name')) {
            $pageName = trim($seoModule->page_name ?? '');

            $seoModule->page_slug = $pageName
                ? Str::slug($pageName)
                : 'sakhashree-' . $seoModule->id;
        }
    }
}
