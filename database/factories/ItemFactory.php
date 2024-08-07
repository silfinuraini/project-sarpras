<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'kode' => 'BRG' . str_pad($this->faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'merk' => $this->faker->word(),
            'satuan' => 'pcs',
            'gambar' => $this->faker->imageUrl(640, 480, 'person', true),
            'harga' => $this->faker->numberBetween(2000, 5000),
            'stok' => $this->faker->numberBetween(10, 100),
            'stok_minimum' => $this->faker->numberBetween(10, 100),
            'kategori_id' => $this->faker->numberBetween(1, 10),
            'deskripsi' => $this->faker->text(),
        ];
    }
}
