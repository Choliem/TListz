<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Post;
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
            'post_id' => Post::inRandomOrder()->first()->id,
            'tier_id' => $this->faker->boolean ? Tier::factory() : null, // Allow nullable tier_id
        ];
    }
}

