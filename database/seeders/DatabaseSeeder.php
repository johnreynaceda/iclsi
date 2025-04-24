<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'admin'
        ]);
        User::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'teacher'
        ]);
        User::create([
            'name' => 'registrar',
            'email' => 'registrar@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'registrar'
        ]);
        User::create([
            'name' => 'parent',
            'email' => 'parent@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'parent'
        ]);
    }
}
