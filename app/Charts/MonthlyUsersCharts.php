<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon; // Pastikan Carbon diimpor
use App\Models\User; // Pastikan model User diimpor

class MonthlyUsersCharts
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $data = $this->fetchChartData();

        // Convert data to integers
        $userCountsData = array_map('intval', $data['userCountsData']);

        $maxValue = max($userCountsData);
        $maxValue = $maxValue < 9 ? 9 : $maxValue; // Ensure the max value is at least 9

        return $this->chart->barChart()
            ->addData('Pengguna Terdaftar', $userCountsData)
            ->setXAxis($data['dates'])
            ->setWidth(900)
            ->setHeight(250)
            ->setOptions([
                'scales' => [
                    'yAxes' => [
                        [
                            'ticks' => [
                                'beginAtZero' => true,
                                'stepSize' => 1,
                                'max' => $maxValue,
                                'precision' => 0, // Display integers only
                                'callback' => 'function(value) { return Number.isInteger(value) ? value : ""; }'
                            ]
                        ]
                    ]
                ]
            ]);
    }

    private function fetchChartData()
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        $userCounts = User::where('role_id', 2)
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->selectRaw('DATE_FORMAT(created_at, "%m-%Y") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $dates = [];
        $userCountsData = [];

        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::createFromDate(null, $month, 1)->format('m-Y');
            $dates[] = $date;
            $userCountsData[] = $userCounts->has($date) ? (int) $userCounts->get($date)->count : 0;
        }

        return [
            'dates' => $dates,
            'userCountsData' => $userCountsData,
        ];
    }
}
