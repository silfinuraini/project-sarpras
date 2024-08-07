<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
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
            'email' => $this->faker->email(),
            'avatar' => $this->faker->imageUrl(640, 480, 'person', true),
            'nama' => $this->faker->name(),
        ];
    }
}
