<?php
namespace App\Filament\Widgets;

use App\Models\Alumni;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AlumniStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Alumni', Alumni::count())
                ->description('Seluruh data alumni')
                ->descriptionIcon('heroicon-o-users')
                ->color('teal')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->extraAttributes([
                    'class' => 'stat-card hover:shadow-lg transition-shadow',
                ]),

            Stat::make('Alumni Bekerja', Alumni::where('status', 'Kerja')->count())
                ->description('Sudah bekerja')
                ->descriptionIcon('heroicon-o-briefcase')
                ->color('emerald')
                ->extraAttributes([
                    'class' => 'stat-card hover:shadow-lg transition-shadow',
                ]),

            Stat::make('Alumni Wirausaha', Alumni::where('status', 'Wirausaha')->count())
                ->description('Berwirausaha')
                ->descriptionIcon('heroicon-o-sparkles')
                ->color('violet')
                ->extraAttributes([
                    'class' => 'stat-card hover:shadow-lg transition-shadow',
                ]),

            Stat::make('Alumni Kuliah', Alumni::where('status', 'Kuliah')->count())
                ->description('Melanjutkan pendidikan')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('sky')
                ->extraAttributes([
                    'class' => 'stat-card hover:shadow-lg transition-shadow',
                ]),

            Stat::make('Alumni Menganggur', Alumni::where('status', 'Menganggur')->count())
                ->description('Belum mendapatkan pekerjaan')
                ->descriptionIcon('heroicon-o-exclamation-circle')
                ->color('danger')
                ->extraAttributes([
                    'class' => 'stat-card hover:shadow-lg transition-shadow',
                ]),
        ];
    }

    protected function getColumns(): int
    {
        return 3;
    }
}
