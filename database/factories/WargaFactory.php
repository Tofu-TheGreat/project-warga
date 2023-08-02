<?php

namespace Database\Factories;

use App\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */
class WargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_lengkap' => fake()->name(),
            'nik' => fake()->nik(),
            'alamat' => fake()->address(),
            'id_user' => fake()->randomElement(["1", "2", "3", "4", "5", "6"]),
            'agama' => fake()->randomElement(["0", "1", "2", "3", "4", "5"]),
            'tanggal_lahir' => fake()->date('Y_m_d'),
            'jenis_kelamin' => fake()->randomElement(["L", "P"]),
            'foto' => null,
            'id_pekerjaan' => fake()->randomDigitNotNull(),
            'status_perkawinan' => fake()->randomElement(["0", "1", "2"]),
            'status_kependudukan' => fake()->randomElement(["0", "1"]),
            'kewarganegaraan' => fake()->randomElement(["0", "1"]),
            'nomor_telpon' => fake()->randomNumber(5, true),
        ];
    }
}
