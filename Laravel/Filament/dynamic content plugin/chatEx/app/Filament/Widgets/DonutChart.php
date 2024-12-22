<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Employee;

class DonutChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'donutChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Employee Task Distribution';
    protected static ?string $navigationGroup = 'Charts';


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
                'type' => 'donut',
                'height' => 300,
            ],
            'series' => $data['taskCounts'],
            'labels' => $data['employeeNames'],
            'legend' => [
                'labels' => [
                    'fontFamily' => 'inherit',
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
