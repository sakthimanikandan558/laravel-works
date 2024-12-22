<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CreateRandomUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create-random';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user with a random username every time the command is executed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Generate a random string for the username
        $randomUsername = Str::random(8); // Generate a random 8-character string
        $randomEmail = $randomUsername . '@example.com'; // Create a random email

        // Create a new user
        $user = User::create([
            'name' => $randomUsername,
            'email' => $randomEmail,
            'password' => Hash::make('password123'), // Default password
        ]);

        // Output success message to the console
        $this->info("User created: $randomUsername ($randomEmail)");
    }
}

