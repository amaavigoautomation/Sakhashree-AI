<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\MenuLink;

class MenuLinksServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer(['partials.adminMenu', 'partials.navigationMenu'], function ($view) {
            $menuLinks = MenuLink::with('children')->whereNull('parent_id')->get();
            $view->with('menuLinks', $menuLinks);
        });
    }
}
