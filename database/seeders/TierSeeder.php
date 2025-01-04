<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tier;
use App\Models\Post;

class TierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            Tier::factory()->count(2)->create([
                'post_id' => $post->id,
            ]);
        }
    }
}
