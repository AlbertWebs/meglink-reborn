<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // unique check
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'), // change later
                'is_admin' => true, // make sure you added this column in migration
            ]
        );
    }
}
