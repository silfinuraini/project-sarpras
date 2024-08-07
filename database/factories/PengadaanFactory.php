<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengajuan>
 */
class PengadaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => $this->faker->randomNumber(5),
            'kode' => 'PG' . str_pad($this->faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'jumlah_barang' => $this->faker->numberBetween(1,10),
        ];
    }
}
