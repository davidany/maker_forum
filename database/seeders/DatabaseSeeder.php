<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => fake()->words(2, true),
            'email' => fake()->email(),
        ]);

         $this->call(ForumCategorySeeder::class);
         $this->call(ForumThreadSeeder::class);
    }
}
