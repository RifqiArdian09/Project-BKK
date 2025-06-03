<?php
namespace App\Filament\Widgets;

use App\Models\Alumni;
use Filament\Widgets\PieChartWidget;

class RentangGajiChart extends PieChartWidget
{
    protected static ?string $heading = 'Distribusi Gaji Alumni';
    protected static ?string $maxHeight = '400px';
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';
    
    protected function getOptions(): array
    {
        return [
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
                    'callbacks' => [
                        'label' => 'function(context) {
                            var label = context.label || "";
                            var value = context.raw || 0;
                            var total = context.dataset.data.reduce((a, b) => a + b, 0);
                            var percentage = Math.round((value / total) * 100);
                            return label + ": " + value + " (" + percentage + "%)";
                        }'
                    ]
                ]
            ],
            'responsive' => true,
            'maintainAspectRatio' => true,
        ];
    }

    protected function getData(): array
    {
        $data = [
            '≤2.5 juta' => Alumni::where(function ($query) {
                $query->where('gaji_kerja', '<=', 2500000)
                      ->orWhere('gaji_wirausaha', '<=', 2500000);
            })->count(),
            
            '2.5-5 juta' => Alumni::where(function ($query) {
                $query->whereBetween('gaji_kerja', [2500000, 5000000])
                      ->orWhereBetween('gaji_wirausaha', [2500000, 5000000]);
            })->count(),
            
            '5-15 juta' => Alumni::where(function ($query) {
                $query->whereBetween('gaji_kerja', [5000000, 15000000])
                      ->orWhereBetween('gaji_wirausaha', [5000000, 15000000]);
            })->count(),
            
            '>15 juta' => Alumni::where(function ($query) {
                $query->where('gaji_kerja', '>', 15000000)
                      ->orWhere('gaji_wirausaha', '>', 15000000);
            })->count(),
        ];

        $total = array_sum($data);
        
        return [
            'datasets' => [
                [
                    'data' => array_values($data),
                    'backgroundColor' => [
                        '#3B82F6', // Blue
                        '#10B981', // Emerald
                        '#F59E0B', // Amber
                        '#8B5CF6', // Violet
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