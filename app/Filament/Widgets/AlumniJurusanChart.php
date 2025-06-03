<?php
namespace App\Filament\Widgets;

use App\Models\Alumni;
use Filament\Widgets\BarChartWidget;

class AlumniJurusanChart extends BarChartWidget
{
    protected static ?string $heading = 'Distribusi Alumni per Jurusan';
    protected static ?string $maxHeight = '300px';
    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = Alumni::select('jurusan')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('jurusan')
            ->orderBy('total', 'DESC')
            ->pluck('total', 'jurusan')
            ->toArray();

        $colors = [
            '#0d9488', // teal-600
            '#10b981', // emerald-500
            '#3b82f6', // blue-500
            '#8b5cf6', // violet-500
            '#ec4899', // pink-500
            '#f59e0b', // amber-500
            '#ef4444', // red-500
            '#14b8a6', // teal-500
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Alumni',
                    'data' => array_values($data),
                    'backgroundColor' => $colors,
                    'borderColor' => '#ffffff',
                    'borderWidth' => 1,
                    'borderRadius' => 8,
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
                'tooltip' => [
                    'backgroundColor' => '#0f172a',
                    'titleColor' => '#f8fafc',
                    'bodyColor' => '#f8fafc',
                    'cornerRadius' => 4,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'grid' => [
                        'color' => 'rgba(0, 0, 0, 0.05)',
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }
}