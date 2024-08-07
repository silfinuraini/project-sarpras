<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailBarangKeluar>
 */
class DetailBarangKeluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_barang_keluar' => 'BK' . str_pad($this->faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'kode_item' => $this->faker->numberBetween(1, 10),
            'kuantiti' => $this->faker->numberBetween(1, 10)
        ];
    }
}
