<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Game',
            'slug' => 'game',
            'color' => 'purple'
        ]);

        Category::create([
            'name' => 'Sport',
            'slug' => 'sport',
            'color' => 'green'
        ]);

        Category::create([
            'name' => 'Adventure',
            'slug' => 'adventure',
            'color' => 'red'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'blue'
        ]);

        Category::create([
            'name' => 'UI UX',
            'slug' => 'ui-ux',
            'color' => 'yellow'
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
            'color' => 'pink'
        ]);

        Category::create([
            'name' => 'Photography',
            'slug' => 'photography',
            'color' => 'orange'
        ]);

        Category::create([
            'name' => 'Music',
            'slug' => 'music',
            'color' => 'cyan'
        ]);

        Category::create([
            'name' => 'Movies',
            'slug' => 'movies',
            'color' => 'lime'
        ]);

        Category::create([
            'name' => 'Travel',
            'slug' => 'travel',
            'color' => 'teal'
        ]);

        Category::create([
            'name' => 'Food',
            'slug' => 'food',
            'color' => 'brown'
        ]);

        Category::create([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'color' => 'gold'
        ]);

        Category::create([
            'name' => 'Education',
            'slug' => 'education',
            'color' => 'indigo'
        ]);

        Category::create([
            'name' => 'Technology',
            'slug' => 'technology',
            'color' => 'silver'
        ]);

        Category::create([
            'name' => 'Fitness',
            'slug' => 'fitness',
            'color' => 'violet'
        ]);

        Category::create([
            'name' => 'Health',
            'slug' => 'health',
            'color' => 'magenta'
        ]);

        Category::create([
            'name' => 'Finance',
            'slug' => 'finance',
            'color' => 'charcoal'
        ]);

        Category::create([
            'name' => 'Business',
            'slug' => 'business',
            'color' => 'beige'
        ]);

        Category::create([
            'name' => 'Nature',
            'slug' => 'nature',
            'color' => 'forestgreen'
        ]);

        Category::create([
            'name' => 'DIY',
            'slug' => 'diy',
            'color' => 'navy'
        ]);

        Category::create([
            'name' => 'Art',
            'slug' => 'art',
            'color' => 'coral'
        ]);

        Category::create([
            'name' => 'Science',
            'slug' => 'science',
            'color' => 'skyblue'
        ]);

        Category::create([
            'name' => 'History',
            'slug' => 'history',
            'color' => 'maroon'
        ]);

        Category::create([
            'name' => 'Lifestyle',
            'slug' => 'lifestyle',
            'color' => 'peach'
        ]);

        Category::create([
            'name' => 'Gaming',
            'slug' => 'gaming',
            'color' => 'crimson'
        ]);

        Category::create([
            'name' => 'Books',
            'slug' => 'books',
            'color' => 'plum'
        ]);

        Category::create([
            'name' => 'Cars',
            'slug' => 'cars',
            'color' => 'darkgreen'
        ]);

        Category::create([
            'name' => 'Pets',
            'slug' => 'pets',
            'color' => 'orchid'
        ]);

        Category::create([
            'name' => 'Parenting',
            'slug' => 'parenting',
            'color' => 'steelblue'
        ]);

        Category::create([
            'name' => 'Culture',
            'slug' => 'culture',
            'color' => 'salmon'
        ]);
    }
}
