<?php

namespace Database\Seeders;

use App\Models\ForumPost;
use App\Models\ForumThread;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $threads = ForumThread::all();

        if ($users->isEmpty()) {
            $users = User::factory(5)->create();
        }

        foreach ($threads as $thread) {
            // Create 1-5 replies for each thread
            $numReplies = rand(1, 5);

            ForumPost::factory()
                ->count($numReplies)
                ->create([
                    'thread_id' => $thread->id,
                    'user_id' => $users->random()->id,
                ]);

            // Update thread's last_posted_at
            $thread->update(['last_posted_at' => now()]);
        }
    }
}
