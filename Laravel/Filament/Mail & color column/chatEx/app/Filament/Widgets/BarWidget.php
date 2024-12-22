<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Employee; // Import your Employee model
use Illuminate\Support\Facades\DB; // For raw queries if needed

class BarWidget extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'barWidget';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Employee Tasks';
    

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        // Fetch the data
        $data = $this->fetchData();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Number of Tasks',
                    'data' => $data['taskCounts'],
                ],
            ],
            'xaxis' => [
                'categories' => $data['employeeNames'],
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
            'colors' => ['#f59e0b'],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 3,
                    'horizontal' => true,
                ],
            ],
        ];
    }

    /**
     * Fetch data for the chart.
     *
     * @return array
     */
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

