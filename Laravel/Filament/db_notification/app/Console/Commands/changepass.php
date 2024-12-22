<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash;

class changepass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:changepass';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates passwords of specific users to admin123';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Array of users whose passwords need to be updated
        $users = ['Sakthi', 'Murugan'];

        // Iterate over each user and update their password
        foreach ($users as $name) {
            // Find the user by name
            $user = User::where('name', $name)->first();

            // Check if the user exists
            if ($user) {
                // Update the password to 'admin123' (hashed)
                $user->password = Hash::make('admin123');
                $user->save();

                // Output success message to the console
                $this->info("Password updated for user: $name");
            } else {
                // Output error message if user not found
                $this->error("User not found: $name");
            }
        }
    }
}
