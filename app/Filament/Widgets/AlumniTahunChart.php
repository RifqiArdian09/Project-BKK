<?php
namespace App\Filament\Widgets;

use App\Models\Alumni;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class AlumniTahunChart extends LineChartWidget
{
    protected static ?string $heading = 'Statistik Alumni per Tahun';
    protected static ?string $maxHeight = '400px';
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        // Get the data from database
        $data = Alumni::select('tahun_lulus')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('tahun_lulus')
            ->orderBy('tahun_lulus', 'ASC')
            ->get();

        // If you want to fill missing years with 0 values:
        $firstYear = $data->min('tahun_lulus') ?? now()->year - 5;
        $lastYear = $data->max('tahun_lulus') ?? now()->year;
        
        $completeData = [];
        for ($year = $firstYear; $year <= $lastYear; $year++) {
            $completeData[$year] = $data->firstWhere('tahun_lulus', $year)->total ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Alumni',
                    'data' => array_values($completeData),
                    'borderColor' => '#6366F1', // Indigo-500
                    'backgroundColor' => 'rgba(99, 102, 241, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                    'pointBackgroundColor' => '#6366F1',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => '#6366F1',
                ],
            ],
            'labels' => array_keys($completeData),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
                        'stepSize' => 1,
                    ],
                    'grid' => [
                        'drawOnChartArea' => true,
                        'color' => 'rgba(0, 0, 0, 0.05)',
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                    'ticks' => [
                        'color' => '#64748B', // slate-500
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                    'labels' => [
                        'color' => '#1E293B', // slate-800
                        'font' => [
                            'weight' => 'bold',
                        ],
                        'boxWidth' => 12,
                        'usePointStyle' => true,
                    ],
                ],
                'tooltip' => [
                    'enabled' => true,
                    'backgroundColor' => '#1E293B',
                    'titleColor' => '#F8FAFC',
                    'bodyColor' => '#F8FAFC',
                    'cornerRadius' => 4,
                    'displayColors' => true,
                    'intersect' => false,
                    'mode' => 'index',
                ],
            ],
            'responsive' => true,
            'maintainAspectRatio' => false,
            'animation' => [
                'duration' => 1000,
                'easing' => 'easeOutQuart',
            ],
        ];
    }

    protected function getFilters(): ?array
    {
        // Optional: Add year range filter if you have many years
        $years = Alumni::select('tahun_lulus')
            ->distinct()
            ->orderBy('tahun_lulus', 'ASC')
            ->pluck('tahun_lulus')
            ->toArray();

        if (count($years) > 10) {
            return [
                'range' => [
                    'label' => 'Rentang Tahun',
                    'options' => [
                        '5' => '5 Tahun Terakhir',
                        '10' => '10 Tahun Terakhir',
                        'all' => 'Semua Tahun',
                    ],
                ],
            ];
        }

        return null;
    }
}