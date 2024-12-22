<?php
namespace App\Filament\Pages;
 
use Filament\Forms\Form;
use Filament\Pages\Auth\Register;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Wizard;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
 
class Registration extends Register
{
    protected ?string $maxWidth = '2xl';
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Contact')
                        ->schema([
                            $this->getNameFormComponent(),
                            $this->getEmailFormComponent(),
                        ]),
                    Wizard\Step::make('Social')
                        ->schema([
                            $this->getGithubFormComponent(),
                            $this->getTwitterFormComponent(),
                        ]),
                    Wizard\Step::make('Password')
                        ->schema([
                            $this->getPasswordFormComponent(),
                            $this->getPasswordConfirmationFormComponent(),
                        ]),
                ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                        wire:submit="register"
                    >
                        Register
                    </x-filament::button>
                    BLADE))),
            ]);
    }
 
    protected function getFormActions(): array
    {
        return [];
    }
 
    protected function getGithubFormComponent(): Component
    {
        return TextInput::make('github')
            ->prefix('https://github.com/')
            ->label(__('GitHub'))
            ->maxLength(255);
    }
 
    protected function getTwitterFormComponent(): Component
    {
        return TextInput::make('twitter')
            ->prefix('https://x.com/')
            ->label(__('Twitter (X)'))
            ->maxLength(255);
    }
}