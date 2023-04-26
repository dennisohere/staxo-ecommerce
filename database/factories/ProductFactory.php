<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2,true);
        return [
            'name' => $name,
            'price' => $this->faker->numberBetween(30, 130),
            'slug' => Str::slug($name),
            'imagePath' => $this->faker->imageUrl
        ];
    }
}
