<?php

namespace App\Http\Controllers;

use App\Models\ForumCategory;
use Illuminate\Http\Request;

class ForumCategoryController extends Controller
{
    public function index()
    {
        $categories = ForumCategory::orderBy('order')
            ->withCount('forum_threads')
            ->get();

        return view('forum.categories.index', compact('categories'));
    }

    public function show(ForumCategory $category)
    {
        $threads = $category->forum_threads()
            ->with('user')
            ->withCount('forum_posts')
            ->latest()
            ->paginate(20);

        return view('forum.categories.show', compact('category', 'threads'));
    }
}
