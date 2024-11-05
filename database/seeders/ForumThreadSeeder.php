<?php

namespace Database\Seeders;

use App\Models\ForumCategory;
use App\Models\ForumThread;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = ForumCategory::all();

        if ($users->isEmpty()) {
            $users = User::factory(5)->create();
        }

        if ($categories->isEmpty()) {
            $categories = ForumCategory::factory(4)->create();
        }

        foreach ($categories as $category) {
            ForumThread::factory()
                ->count(5)
                ->create([
                    'category_id' => $category->id,
                    'user_id' => $users->random()->id,
                ]);
        }
    }

}
