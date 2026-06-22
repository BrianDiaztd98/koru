<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);

        // Esta línea hará que las migraciones se ejecuten al iniciar la app
        if ($this->app->environment('production')) {
            \Illuminate\Support\Facades\Artisan::call('migrate --force');
        }
    }
}
