<?php

namespace DevIdkwhoami\PanelPlugin\Pages\Auth;
use Filament\Pages\Auth\Login as BaseAuth;

class Login extends BaseAuth
{

    public function mount(): void
    {
        $this->form->fill([
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
    }

}
