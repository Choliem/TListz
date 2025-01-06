<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Post;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            Item::factory()->count(10)->create([
                'post_id' => $post->id,
            ]);
        }
    }
}
