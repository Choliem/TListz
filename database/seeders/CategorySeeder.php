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
        //Category::factory(3)->create()

        Category::create([
            'name' => 'Game',
            'slug' => 'game',
        ]);

        Category::create([
            'name' => 'Sport',
            'slug' => 'sport',
        ]);

        Category::create([
            'name' => 'Adventure',
            'slug' => 'avdventure',
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'UI UX',
            'slug' => 'ui-ux',
        ]);
        
        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programing',
        ]);
    }
}
