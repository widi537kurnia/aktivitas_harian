<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
       User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'divisi' => 'web',
            'password' => bcrypt('password'),
        ]);

        // Anak Magang
        User::create([
            'name' => 'Anak Magang',
            'email' => 'anak@example.com',
            'role' => 'anak_magang',
            'divisi' => 'desain',
            'password' => bcrypt('password'),
        ]);

        // Sekolah
        User::create([
            'name' => 'Sekolah A',
            'email' => 'sekolah@example.com',
            'role' => 'sekolah',
            'divisi' => 'video',
            'password' => bcrypt('password'),

        ]);
    }
}
