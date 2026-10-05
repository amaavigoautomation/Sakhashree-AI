<?php

namespace App\Providers;

use App\Http\Controllers\MenuLinkController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // URL::forceScheme('https');
        View::composer('*', function ($view) {
            $menuLinkController = new MenuLinkController();
            $menuLinks = $menuLinkController->getMenuLinks();
            $view->with('menuLinks', $menuLinks);
        });
    }
}
