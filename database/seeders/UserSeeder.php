<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name' => 'Admin Telkom',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Akun Dosen
        User::create([
            'name' => 'Dosen Telkom',
            'email' => 'dosen@test.com',
            'password' => Hash::make('password'),
            'role' => 'dosen',
        ]);

        // Akun Mahasiswa
        User::create([
            'name' => 'Mahasiswa Telkom',
            'email' => 'mahasiswa@test.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
    }
}