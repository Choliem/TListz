<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'TestUser',
            'username' => 'guest123',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Admin',
            'username' => 'Admin01',
            'email' => 'admin01@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin001'),
            'is_admin' => true,
            'remember_token' => Str::random(10)
        ]);


        User::factory(5)->create();
    }
}
