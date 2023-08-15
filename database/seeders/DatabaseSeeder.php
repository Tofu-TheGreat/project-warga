<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pekerjaan;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(9)->create();
        // Warga::factory(20)->create();
        // Pekerjaan::factory(20)->create();

        User::factory()->create([
            'nama_lengkap' => "JonggunTzy",
            'nik' => "2172991009199069",
            'alamat' => "Rumah Sakit Sumber Waras",
            'nomor' => "1",
            'agama' => "2",
            'tanggal_lahir' => "2022-11-21",
            'foto' => null,
            'jenis_kelamin' => "L",
            'status_perkawinan' => "0",
            'status_kependudukan' => "0",
            'peran' => "rw",
            'kewarganegaraan' => "0",
            'nomor_telpon' => "087827303328",
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'nama_lengkap' => "Muhammad Pasya Abinaya",
            'nik' => "2172991009199070",
            'alamat' => "Rumah Sakit Sumber Waras dan Sirotolmustakim",
            'nomor' => "2",
            'agama' => "2",
            'tanggal_lahir' => "2022-11-21",
            'foto' => null,
            'jenis_kelamin' => "L",
            'status_perkawinan' => "0",
            'status_kependudukan' => "0",
            'peran' => "rw",
            'kewarganegaraan' => "0",
            'nomor_telpon' => "087781127193",
            'password' => bcrypt('password'),
        ]);
    }
}
