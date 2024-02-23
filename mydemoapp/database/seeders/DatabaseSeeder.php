<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Create users and assign roles
        $adminUser = User::factory()->create([
            'username' => 'AlAmin',
            'email' => 'alamin@gmail.com',
            'password' => bcrypt('123456'), // Hash the password
        ]);
        $adminUser->roles()->attach($adminRole->id); // Attach admin role to user

        // Add Hridoy and assign the role user
        $userHridoy = User::factory()->create([
            'username' => 'Hridoy',
            'email' => 'hridoy@example.com',
            'password' => bcrypt('password123'), // Hash the password
        ]);
        $userHridoy->roles()->attach($userRole->id); // Attach user role to Hridoy

        // Create products
        \App\Models\Product::factory(10)->create();
    }
}
