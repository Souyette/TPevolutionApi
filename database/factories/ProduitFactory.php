<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->jobTitle(),
            'description'=> $this->faker->company(),
            'lien_image'=> $this->faker->imageUrl($width = 640, $height = 480),
            'prix'=> $this->faker->numberBetween(1, 50000),
            'tva'=> $this->faker->numberBetween(5, 25),
        ];
    }
}
