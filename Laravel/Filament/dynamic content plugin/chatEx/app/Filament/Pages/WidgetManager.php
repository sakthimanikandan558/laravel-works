<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use IbrahimBougaoua\Filawidget\Services\AreaService;
use IbrahimBougaoua\Filawidget\Services\WidgetService;

class WidgetManager extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.widget-manager';

    public function getWidgetsData(): array
    {
    // Get all widget areas (ensure it's an array or empty if null)
    $areas = AreaService::getAllAreas() ?? [];

    // Get widgets by specific area (ensure it's an array or empty if null)
    $sidebarWidgets = AreaService::getWidgetByIdentifier('Sidebar') ?? [];

    // Get all widgets (ensure it's an array or empty if null)
    $widgets = WidgetService::getAllWidgets() ?? [];

    return compact('areas', 'sidebarWidgets', 'widgets');
    }

    // Make this function accessible in Blade
    public function render(): \Illuminate\View\View
    {
        return view(static::$view, $this->getWidgetsData());
    }
}

