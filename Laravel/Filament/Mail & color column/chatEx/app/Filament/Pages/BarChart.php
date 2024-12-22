<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\BarWidget;
use Filament\Pages\Page;

class BarChart extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.bar-chart';

    protected static ?string $navigationGroup = 'Charts';


    protected function getHeaderWidgets(): array
    {
        return [
            BarWidget::class,
        ];
    }

    
}
