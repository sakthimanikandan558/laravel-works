<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class RadialBarChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'radialBarChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'RadialBarChart';
    protected static ?string $navigationGroup = 'Charts';


    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'radialBar',
                'height' => 300,
            ],
            'series' => [65],
            'plotOptions' => [
                'radialBar' => [
                    'hollow' => [
                        'size' => '70%',
                    ],
                    'dataLabels' => [
                        'show' => true,
                        'name' => [
                            'show' => true,
                            'fontFamily' => 'inherit'
                        ],
                        'value' => [
                            'show' => true,
                            'fontFamily' => 'inherit',
                            'fontWeight' => 600,
                            'fontSize' => '20px'
                        ],
                    ],

                ],
            ],
            'stroke' => [
                'lineCap' => 'round',
            ],
            'labels' => ['RadialBarChart'],
            'colors' => ['#f59e0b'],
        ];
    }
}
