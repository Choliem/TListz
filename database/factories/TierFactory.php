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
            'post_id' => Post::inRandomOrder()->first()->id,
            'name' => ucfirst($this->faker->randomElement(['Basic', 'Standard', 'Premium', 'Elite', 'Ultimate'])),
            'rank' => $this->faker->numberBetween(1, 5),
        ];
    }
}
