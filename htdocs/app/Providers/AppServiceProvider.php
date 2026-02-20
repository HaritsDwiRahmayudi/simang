<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // PERBAIKAN VITE/TAMPILAN:
        // Memberitahu Laravel bahwa folder 'public' sekarang adalah folder root (htdocs)
        // Jadi dia bakal nyari folder 'build' di tempat yang benar.
        $this->app->usePublicPath(base_path());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // FIX 1: Error database key too long
        Schema::defaultStringLength(191);

        // FIX 2: Force HTTPS biar gak error 403 saat Login
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}