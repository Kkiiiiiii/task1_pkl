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
        // User::factory(10)->create();

        User::create([
            'nama_lengkap' => 'min',
            'no_ktp' => '1234567890123456',
            'alamat' => 'Jl. Bronco No. 1',
            'email' => 'amin@example.com',
            'no_handphone' => '081234567890',
            'status_perkawinan' => 'belum_menikah',
            'jenis_kelamin' => 'laki-laki',
            'nama_ibu_kandung' => 'Ibu min',
            'password' => bcrypt('123456'),
            'foto' => '1.jpg'
        ]);
    }
}
