<?php

namespace DevIdkwhoami\PanelPlugin\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class TestPage extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data;

    protected static ?string $slug = 'testpage';

    protected static string $view = 'issue::pages.test-page';

    public function mount(): void
    {
        $this->form->fill([
            'string' => 'abcdefghijklmnop',
            'number' => '1234567890',
        ]);
    }


    public function form(Form $form): Form
    {
        return $form
            ->columns()
            ->statePath('data')
            ->schema([
                TextInput::make('string')
                    ->label("Test String"),
                TextInput::make('number')
                    ->label("Test Number")
                    ->numeric()
            ]);
    }

    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        dd($this->data);
    }

}
