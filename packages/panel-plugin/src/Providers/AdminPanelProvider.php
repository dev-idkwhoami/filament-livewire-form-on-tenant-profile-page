<?php

namespace DevIdkwhoami\PanelPlugin\Providers;

use DevIdkwhoami\PanelPlugin\Models\Tenant;
use DevIdkwhoami\PanelPlugin\Pages\Auth\Login;
use DevIdkwhoami\PanelPlugin\Pages\TenantProfilePage;
use DevIdkwhoami\PanelPlugin\Pages\TestPage;
use DevIdkwhoami\PanelPlugin\PanelPlugin;
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

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Emerald,
            ])
            ->tenant(Tenant::class)
            ->tenantProfile(TenantProfilePage::class)
            ->login(Login::class)
            ->plugins([
                PanelPlugin::make()
            ])
            //->discoverResources(in: app_path('DevIdkwhoami/PanelPlugin/Resources'), for: 'DevIdkwhoami\\PanelPlugin\\Resources')
            //->discoverPages(in: app_path('DevIdkwhoami/PanelPlugin/Pages'), for: 'DevIdkwhoami\\PanelPlugin\\Pages')
            ->pages([
                Pages\Dashboard::class,
                TestPage::class
            ])
            ->discoverWidgets(in: app_path('DevIdkwhoami/PanelPlugin/Widgets'), for: 'DevIdkwhoami\\PanelPlugin\\Widgets')
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
