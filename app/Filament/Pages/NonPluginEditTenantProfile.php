<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;

class NonPluginEditTenantProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Non Plugin Profile';
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return [
            'string' => 'abcdefghijklmnop',
            'number' => '1234567890',
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        dd($data);

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns()
            ->statePath('data')
            ->schema([
                TextInput::make('string')
                    ->label('NonPlugin String'),
                TextInput::make('number')
                    ->label('NonPlugin Number')
                    ->numeric(),
            ]);
    }
}
