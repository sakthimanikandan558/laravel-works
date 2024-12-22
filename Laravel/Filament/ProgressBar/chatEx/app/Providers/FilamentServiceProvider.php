<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Filament;
use IbrahimBougaoua\Filaprogress\FilaprogressServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Filament::serving(function () {
        //     Filament::registerPlugin(new FilaprogressServiceProvider());
        // });
    }
}
