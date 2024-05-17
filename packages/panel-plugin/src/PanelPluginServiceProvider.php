<?php

namespace DevIdkwhoami\PanelPlugin;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PanelPluginServiceProvider extends PackageServiceProvider
{

    public function configurePackage(Package $package): void
    {
        $package
            ->hasViews()
            ->runsMigrations()
            ->hasMigrations([
                'create_users_table',
                'create_tenants_table',
                'create_tenant_user_table'
            ])
            ->name('issue');
    }
}
