<?php

namespace App\Observers;

use App\Models\SeoModule;
use Illuminate\Support\Str;

class SeoModuleObserver
{
    public function saved(SeoModule $seoModule): void
    {
        $data = $seoModule;

        if (!$data) {
            return;
        }

        $pageName = trim($data->page_name ?? '');

        // Final fallback - slug can NEVER be empty.
        if (empty($pageName)) {
            $pageSlug = 'sakhashree-' . $data->id;
        } else {
            $pageSlug = Str::slug($pageName);
        }

        $pageTitle = Str::limit(
            "Sakhashree Neeta | Spiritual Guide & Healer",
            60,
            ''
        );

        $metaDescription = Str::limit(
            "Discover spiritual healing, workshops and guidance with Sakhashree Neeta.",
            160,
            ''
        );

        // Prevent unnecessary update calls
        if (
            $data->page_title !== $pageTitle ||
            $data->meta_description !== $metaDescription ||
            $data->page_slug !== $pageSlug
        ) {
            $data->update([
                'page_title' => $pageTitle,
                'meta_description' => $metaDescription,
                'page_slug' => $pageSlug,
            ]);
        }
    }
}
