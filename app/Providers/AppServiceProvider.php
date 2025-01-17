<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        // Ensure default string length for database migrations
        Schema::defaultStringLength(191);

        // Ensure the routes in web.php are properly loaded
        \Illuminate\Support\Facades\Route::middleware('web')
            ->namespace($this->app->getNamespace().'Http\Controllers')
            ->group(base_path('routes/web.php'));
    }
}