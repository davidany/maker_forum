<?php

namespace App\Http\Controllers;

use App\Models\ForumCategory;
use App\Models\ForumPost;
use App\Models\ForumThread;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class ForumThreadController extends Controller
{
    public function index()
    {
        $threads = ForumThread::with(['forum_category', 'user', 'forum_posts'])
            ->withCount('forum_posts')  // This gives us forum_posts_count
            ->latest('last_posted_at')
            ->paginate(10);

        return view('forum.index', compact('threads'));
    }
    public function show(ForumThread $thread)
    {
        $thread->load(['forum_category', 'user']);
        $posts = $thread->forum_posts()
            ->with('user')
            ->latest()
            ->paginate(20);

        return view('forum.threads.show', compact('thread', 'posts'));
    }

    public function create()
    {
        $categories = ForumCategory::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('forum.threads.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'category_id' => 'required|exists:forum_categories,id',
        ]);

        $thread = $request->user()->forum_threads()->create([
            ...$validated,
            'last_posted_at' => now(),
        ]);

        return redirect()
            ->route('forum.threads.show', $thread)
            ->with('success', 'Thread created successfully.');
    }

}
