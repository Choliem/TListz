<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Tier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence,
            'tier_id' => Tier::inRandomOrder()->first()->id, // Ensure each item is associated with a tier
        ];
    }
}

