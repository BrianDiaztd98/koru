<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Livewire\Mechanisms\FrontendAssets\FrontendAssets;

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
        // Fuerza HTTPS en producción
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Optimización: Añadir defer al script de Livewire para evitar bloqueo de renderizado
        $this->app->booted(function () {
            app(FrontendAssets::class)->useScriptTagAttributes(['defer' => true]);
        });
    }
}
