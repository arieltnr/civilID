<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        $super_admin = User::where('email', 'sysadmin123@gmail.com')->first();
        if (empty($super_admin)) {
            User::create([
                'name' => 'Sysadmin',
                'email' => 'sysadmin123@gmail.com',
                'password' => Hash::make('Abcd-4321'),
            ]);
        }
    }
}
