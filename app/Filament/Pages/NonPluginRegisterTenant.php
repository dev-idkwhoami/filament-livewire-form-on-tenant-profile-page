<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;

class NonPluginRegisterTenant extends RegisterTenant
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
                    ->default('abcdefghijklmnop')
                    ->label('NonPlugin String'),
                TextInput::make('number')
                    ->default('1234567890')
                    ->label('NonPlugin Number')
                    ->numeric(),
            ]);
    }

    protected function handleRegistration(array $data): Model
    {
        dd($data);
    }
}
