<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Employee; // Import your Employee model


class RadarChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'radarChart';


    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'RadarChart';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $data = $this->fetchData();
        return [
            'chart' => [
                'type' => 'radar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'RadarChart',
                    'data' => $data['taskCounts'],
                ],
            ],
            'xaxis' => [
                'categories' =>$data['employeeNames'],
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#6366f1'],
        ];
    }
    protected function fetchData(): array
    {
        // Retrieve data using Eloquent
        $employees = Employee::withCount('tasks')->get();

        // Prepare data for the chart
        $employeeNames = $employees->pluck('username');
        $taskCounts = $employees->pluck('tasks_count');

        return [
            'employeeNames' => $employeeNames->toArray(),
            'taskCounts' => $taskCounts->toArray(),
        ];
    }
}
