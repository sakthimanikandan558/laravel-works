<?php

namespace App\Providers\Filament;

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
use App\Filament\Widgets\ListUsersWidget; // Add this line to import the widget
use Stephenjude\FilamentBlog\BlogPlugin;
use Teguh02\FilamentDbSync\FilamentDbSync;
use Stephenjude\FilamentTwoFactorAuthentication\TwoFactorAuthenticationPlugin;
use CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin;
use EightyNine\FilamentPageAlerts\FilamentPageAlertsPlugin;
use Filament\Actions\Action;
use Orion\FilamentGreeter\GreeterPlugin;





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
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
                // ListUsersWidget::class, // Add your custom widget here
            ])
            ->plugins([
                \DiscoveryDesign\FilamentGaze\FilamentGazePlugin::make(),
                GreeterPlugin::make()
                ->message('Welcome,')
                ->name(auth()->user() ? auth()->user()->name : 'Stark')
                ->title('The First of Her Name, the Unburnt, Queen of Meereen, Queen of the Andals and the Rhoynar and the First Men, Khalisee of the Great Grass Sea, Breaker of Chains and Mother of Dragons')
                ->avatar(size: 'w-16 h-16', url: 'https://avatarfiles.alphacoders.com/236/236674.jpg')
                ->action(
                    Action::make('action')
                        ->label('Buy more unsullied')
                        ->icon('heroicon-o-shopping-cart')
                        ->url('https://buyunsulliedonline.com')
                )
                ->sort(-1)
                ->columnSpan('full'),
                FilamentDbSync::make(),
                TwoFactorAuthenticationPlugin::make()
                ->addTwoFactorMenuItem() // Add 2FA settings to user menu items
                ->enforceTwoFactorSetup(),
                BlogPlugin::make(),
                GlobalSearchModalPlugin::make()
                ->highlighter(false), // disable highlighting
                FilamentPageAlertsPlugin::make(),
                \Hasnayeen\Themes\ThemesPlugin::make()
            ])            
            ->middleware([
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class,
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
            ->databaseNotifications()
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
