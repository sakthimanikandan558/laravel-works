<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\RadialBarChart;
use Filament\Pages\Page;

class RadialBar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.radial-bar';

    protected static ?string $navigationGroup = 'Charts';


    protected function getHeaderWidgets(): array
    {
        return [
            RadialBarChart::class,
        ];
    }
}
