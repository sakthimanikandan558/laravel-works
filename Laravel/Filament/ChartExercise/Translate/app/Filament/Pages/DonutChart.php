<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DonutChart as WidgetsDonutChart;
use Filament\Pages\Page;

class DonutChart extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.donut-chart';

    protected static ?string $navigationGroup = 'Charts';


    protected function getHeaderWidgets(): array
    {
        return [
            WidgetsDonutChart::class,
        ];
    }
}
