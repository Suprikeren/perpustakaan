<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('1234567890'),
            'address' => 'jalan lintas sumbawa utan',
            'registrasi_date' => now(),
        ]);

        $anggota = ['anggota', 'naruto', 'sakura', 'sasuke','ino','sai','supri'];

        foreach ($anggota as $user) {
            User::factory()->create([
                'name' => $user,
                'email' => "$user@example.com",
                'role' => 'anggota',
                'password' => bcrypt('1234567890'),
                'address' => 'jalan lintas sumbawa utan',
                'registrasi_date' => now(),
            ]);
        }
    }
}
