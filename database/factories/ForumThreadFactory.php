<?php

namespace Database\Factories;

use App\Models\ForumCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ForumThread>
 */
class ForumThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(3, true),
            'user_id' => User::factory(),
            'category_id' => ForumCategory::factory(),
            'is_pinned' => false,
            'is_locked' => false,
            'last_posted_at' => now(),
        ];
    }
}
