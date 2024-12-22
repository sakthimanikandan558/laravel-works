<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentIcon;


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
        FilamentView::registerRenderHook(
            PanelsRenderHook::USER_MENU_AFTER,
            fn (): string => Blade::render('@livewire(\'welcome-page\')'),
        );

        FilamentIcon::register([
            'tables::search-field' =>  view('livewire.welcome-page'),
            'panels::sidebar.group.collapse-button' => view('livewire.welcome-page'),
        ]);
    }

}
