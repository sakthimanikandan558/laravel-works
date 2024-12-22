<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\RadarChart as WidgetsRadarChart;
use Filament\Pages\Page;

class RadarChart extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.radar-chart';

    protected static ?string $navigationGroup = 'Charts';


    protected function getHeaderWidgets(): array
    {
        return [
            WidgetsRadarChart::class,
        ];
    }
}
