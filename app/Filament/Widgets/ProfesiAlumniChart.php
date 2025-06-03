<?php
namespace App\Filament\Widgets;

use App\Models\Alumni;
use Filament\Widgets\DoughnutChartWidget;

class ProfesiAlumniChart extends DoughnutChartWidget
{
    protected static ?string $heading = 'Rasio Profesi Alumni';
    protected static ?string $maxHeight = '400px';
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';
    
    protected function getOptions(): array
    {
        return [
            'cutout' => '70%',
            'plugins' => [
                'legend' => [
                    'position' => 'right',
                    'labels' => [
                        'font' => [
                            'size' => 14,
                            'family' => 'Inter'
                        ],
                        'padding' => 20,
                        'usePointStyle' => true,
                    ]
                ],
                'tooltip' => [
                    'enabled' => true,
                    'backgroundColor' => '#1F2937',
                    'titleFont' => ['size' => 16],
                    'bodyFont' => ['size' => 14],
                ]
            ],
            'responsive' => true,
            'maintainAspectRatio' => true,
        ];
    }

    protected function getData(): array
    {
        $data = [
            'Kuliah' => Alumni::where('status', 'Kuliah')->count(),
            'Bekerja' => Alumni::where('status', 'Kerja')->count(),
            'Wirausaha' => Alumni::where('status', 'Wirausaha')->count(),
            'Menganggur' => Alumni::where('status', 'Menganggur')->count(),
        ];

        $total = array_sum($data);
        
        return [
            'datasets' => [
                [
                    'data' => array_values($data),
                    'backgroundColor' => [
                        '#4F46E5', // Indigo
                        '#10B981', // Emerald
                        '#F59E0B', // Amber
                        '#EF4444', // Red
                    ],
                    'borderWidth' => 0,
                    'hoverOffset' => 10,
                ],
            ],
            'labels' => array_map(function($label, $value) use ($total) {
                $percentage = $total > 0 ? round(($value / $total) * 100, 1) : 0;
                return "$label ($percentage%)";
            }, array_keys($data), array_values($data)),
        ];
    }
}