<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tier>
 */
class TierFactory extends Factory
{
    protected $model = Tier::class;

    public function definition(): array
    {
        return [
            'post_id' => Post::factory(), // Creates a related post
            'name' => $this->faker->word(),
            'rank' => $this->faker->numberBetween(1, 5),
        ];
    }
}
