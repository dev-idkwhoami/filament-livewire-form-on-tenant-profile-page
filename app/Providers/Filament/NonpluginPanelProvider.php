<?php

namespace App\Providers\Filament;

use App\Filament\Pages\CustomEditProfile;
use App\Filament\Pages\NonPluginEditTenantProfile;
use App\Filament\Pages\RegisterTenant;
use DevIdkwhoami\PanelPlugin\Models\Tenant;
use DevIdkwhoami\PanelPlugin\Pages\Auth\Login;
use Filament\Http\Middleware\Authenticate;
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
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class NonpluginPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('nonplugin')
            ->path('nonplugin')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->login(Login::class)
            /*->tenant(Tenant::class)
            ->tenantProfile(NonPluginEditTenantProfile::class)
            ->tenantRegistration(RegisterTenant::class)*/
            ->profile(CustomEditProfile::class)
            ->discoverResources(in: app_path('Filament/Nonplugin/Resources'), for: 'App\\Filament\\Nonplugin\\Resources')
            ->discoverPages(in: app_path('Filament/Nonplugin/Pages'), for: 'App\\Filament\\Nonplugin\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Nonplugin/Widgets'), for: 'App\\Filament\\Nonplugin\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ]);
    }
}
