<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationGroup;
use App\Filament\Widgets\AlumniJurusanChart;
use App\Filament\Widgets\AlumniTahunChart;
use App\Filament\Widgets\RentangGajiChart;
use App\Filament\Widgets\ProfesiAlumniChart;
use App\Filament\Widgets\AlumniStatsOverview;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
{
    return $panel
        
        ->default()
        ->id('admin')
        ->path('admin')
        ->profile() // Enable profile page
        ->login()
        ->widgets([
                AlumniStatsOverview::class,     
                AlumniTahunChart::class,
                AlumniJurusanChart::class,
                RentangGajiChart::class,
                ProfesiAlumniChart::class,
        ])
        ->colors([
            'primary' => Color::hex('#008b8b'), // Ubah warna primary ke #008b8b
        ])
       
        ->navigationGroups([
            NavigationGroup::make()
                ->label('Data Alumni')
                ->icon('heroicon-o-academic-cap'),
        ])

        
        ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
        ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
        ->pages([
            Pages\Dashboard::class,
        ])
        ->middleware([
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
            DisableBladeIconComponents::class,
            DispatchServingFilamentEvent::class,
        ])
        ->authMiddleware([
            Authenticate::class,
        ])
        ->databaseNotifications();
}

}
