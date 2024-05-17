<?php

namespace App\Filament\Pages;

use DevIdkwhoami\PanelPlugin\Models\Tenant;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant as BaseRegisterTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RegisterTenant extends BaseRegisterTenant
{
    public static function getLabel(): string
    {
        return 'Non Plugin Register';
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns()
            ->statePath('data')
            ->schema([
                TextInput::make('string')
                    ->default(Str::random())
                    ->label('NonPlugin String'),
                TextInput::make('number')
                    ->default('1234567890')
                    ->label('NonPlugin Number')
                    ->numeric(),
            ]);
    }

    protected function handleRegistration(array $data): Model
    {
        $tenant = Tenant::create([
            'name' => $data['string'],
            'owner_id' => auth()->user()->id,
        ]);

        auth()->user()->tenants()->attach($tenant);

        return $tenant;
    }
}
