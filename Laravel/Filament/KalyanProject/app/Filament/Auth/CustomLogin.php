<?php

namespace App\Filament\Auth;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Auth\Login;
use Filament\Forms\Components\HTML;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;
use Illuminate\Validation\ValidationException;

class CustomLogin extends Login
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getLoginFormComponent(),
                        $this->getPasswordComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getLoginFormComponent()
    {
        return TextInput::make('email')
            ->label(__('Email'))
            ->email()
            ->rules(['required'])
            ->validationAttribute('Email')
            ->autocomplete()
            ->placeholder('sakthi@kalyan.com')
            ->autofocus()
            ->label(new HtmlString('<b>Email</b>'))
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getPasswordComponent()
    {
        return TextInput::make('password')
            ->label(__('filament-panels::pages/auth/login.form.password.label'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->autocomplete('current-password')
            ->placeholder('*********')
            ->rules(['required'])
            ->validationAttribute('Password')
            ->label(new HtmlString('<b>Password</b>'))
            ->extraInputAttributes(['tabindex' => 2]);
    }
    public function getHeading():string
    {
        return '';
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.email' => __('Please enter the correct Email or Password'),
        ]);
    }

    protected function getAuthenticateFormAction(): Action
    {
        return Action::make('authenticate')
            ->label(__('filament-panels::pages/auth/login.form.actions.authenticate.label'))
            ->submit('authenticate')
            ->size('sm')
            ->extraAttributes([
                'class' => 'custom-bg-red text-white w-1/2 mx-auto',
                'style' => 'background-color:#D71920;  width:300px'
            ]);
    }

}
