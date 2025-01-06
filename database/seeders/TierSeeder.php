<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tier;
use App\Models\Post;
use App\Models\Item;

class TierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all posts
        $posts = Post::all();

        // Loop through each post
        foreach ($posts as $post) {
            // Create 3 tiers for each post
            $tiers = Tier::factory()->count(3)->create([
                'post_id' => $post->id,
            ]);

            // Loop through each tier and create 0 to 3 items for each tier
            foreach ($tiers as $tier) {
                $itemCount = rand(0, 3); // Generate random number of items between 0 and 3
                Item::factory()->count($itemCount)->create([
                    'tier_id' => $tier->id, // Associate item with the current tier
                ]);
            }
        }
    }
}
