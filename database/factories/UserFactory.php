<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'nomor' => fake()->randomDigitNotNull(),
            'agama' => fake()->randomElement(["0", "1", "2", "3", "4", "5"]),
            'tanggal_lahir' => fake()->date('Y_m_d'),
            'foto' => null,
            'jenis_kelamin' => fake()->randomElement(["L", "P"]),
            'status_perkawinan' => fake()->randomElement(["0", "1", "2"]),
            'status_kependudukan' => fake()->randomElement(["0", "1"]),
            'peran' => fake()->randomElement(["rt"]),
            'kewarganegaraan' => fake()->randomElement(["0", "1"]),
            'nomor_telpon' => fake()->randomNumber(5, true),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
