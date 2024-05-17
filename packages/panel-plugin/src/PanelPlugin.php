<?php

namespace DevIdkwhoami\PanelPlugin;

use Filament\Contracts\Plugin;

class PanelPlugin implements Plugin
{

    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'issue';
    }

    public function register(\Filament\Panel $panel): void
    {
        // TODO: Implement register() method.
    }

    public function boot(\Filament\Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
