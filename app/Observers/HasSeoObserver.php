<?php

namespace App\Observers;

use Illuminate\Support\Str;

class HasSeoObserver
{
    public function saved($model): void
    {
        $data = $model;

        if (!$data) {
            return;
        }

        $pageName = trim($data->seoPageNameSource() ?? '');

        // Final fallback - slug can NEVER be empty.
        if (empty($pageName)) {
            $pageSlug = Str::slug(class_basename($data)) . '-' . $data->id;
        } else {
            $pageSlug = Str::slug($pageName);
        }

        $pageTitle = Str::limit(
            "Sakhashree Neeta | Latest News & Updates",
            60,
            ''
        );

        $metaDescription = Str::limit(
            "Read the latest news, events, achievements and updates from Sakhashree Neeta.",
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
