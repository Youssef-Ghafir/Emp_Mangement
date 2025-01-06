<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PosteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre_poste' => $this->faker->jobTitle,
            'salaire_base' => $this->faker->numberBetween(2500, 5000),
            'departement' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
