<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Stephenjude\FilamentTwoFactorAuthentication\TwoFactorAuthenticatable;
use Filament\Models\Contracts\FilamentUser; // Correct import
use Filament\Panel; // Correct import

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;
    use TwoFactorAuthenticatable;


    public function canAccessFilament(): bool
    {
        // Customize the access logic if needed
        return true;  // Or implement specific logic, like checking roles or permissions
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // You can add logic here to restrict access to certain panels
        return true; // Or add custom logic to determine which panel the user can access
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
