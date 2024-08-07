<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangMasuk>
 */
class BarangMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode' => 'BM' . str_pad($this->faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'nip' => $this->faker->randomNumber(10),
            'kode_supplier' => $this->faker->numberBetween(1, 10),
            'jumlah_item' => $this->faker->numberBetween(1, 10),
        ];
    }
}
