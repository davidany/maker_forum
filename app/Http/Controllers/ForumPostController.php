<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumPostController extends Controller
{
    public function store(Request $request, ForumThread $thread)
    {
        $validated = $request->validate([
            'content' => 'required|min:2',
            'parent_id' => 'nullable|exists:forum_posts,id'
        ]);

        $post = $thread->forum_posts()->create([
            ...$validated,
            'user_id' => $request->user()->id
        ]);

        $thread->update(['last_posted_at' => now()]);

        return redirect()
            ->route('forum.threads.show', $thread)
            ->with('success', 'Reply posted successfully.');
    }

    public function destroy(ForumPost $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back()->with('success', 'Post deleted successfully.');
    }
}
