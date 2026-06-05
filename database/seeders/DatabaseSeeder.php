<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Admin
        User::updateOrCreate(
            ['email' => 'admin@shopsync.com'],
            [
                'name' => 'Admin ShopSync',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'status' => 'active'
            ]
        );

        // Seed Member
        User::updateOrCreate(
            ['email' => 'member@shopsync.com'],
            [
                'name' => 'Member ShopSync',
                'password' => bcrypt('password'),
                'role' => 'member',
                'status' => 'active'
            ]
        );
    }
}
