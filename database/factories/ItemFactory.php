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
            // Generate meaningful item names like "Golden Sword", "Health Potion", etc.
            'name' => ucfirst($this->faker->randomElement(['Golden', 'Silver', 'Mystic', 'Ancient', 'Healing']) . ' ' . $this->faker->randomElement(['Sword', 'Potion', 'Amulet', 'Ring', 'Shield'])),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence,
            'post_id' => Post::inRandomOrder()->first()->id,
            'tier_id' => null,
        ];
    }
}
