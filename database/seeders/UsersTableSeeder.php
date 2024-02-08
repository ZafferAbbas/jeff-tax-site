<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create a new user named "Zaffer"
        $user = User::create([
            'name' => 'Zaffer',
            'email' => 'zaffer@vrexx.org',
            'password' => bcrypt('Zaffer3242@'), // Replace with the desired password
        ]);

        // Retrieve the "admin" role
        $adminRole = Role::where('name', 'admin')->first();

        // Assign the "admin" role to the user
        $user->roles()->attach($adminRole);
    }
}
