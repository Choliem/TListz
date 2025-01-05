<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Category::factory(3)->create()

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
            'slug' => 'avdventure',
            'color' => 'red'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color'=> 'blue'
        ]);

        Category::create([
            'name' => 'UI UX',
            'slug' => 'ui-ux',
            'color'=> 'yellow'
        ]);

        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programing',
            'color'=> 'pink'
        ]);
    }
}
