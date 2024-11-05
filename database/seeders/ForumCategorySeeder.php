<?php

namespace Database\Seeders;

use App\Models\ForumCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ForumCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => '3D Printing',
                'description' => 'Discuss 3D printing projects and techniques',
                'order' => 1,
            ],
            [
                'name' => 'Electronics',
                'description' => 'Share electronics projects and knowledge',
                'order' => 2,
            ],
            [
                'name' => 'Woodworking',
                'description' => 'Wood crafting and carpentry discussions',
                'order' => 3,
            ],
            [
                'name' => 'General Discussion',
                'description' => 'General makerspace topics',
                'order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            ForumCategory::create([
                'name' => $category['name'],
                'description' => $category['description'],
                'order' => $category['order'],
                'is_active' => true,
            ]);
        }
    }
}
