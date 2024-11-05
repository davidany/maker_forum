@extends('layouts.forum')

@section('forum-content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="divide-y divide-gray-200">
            @forelse($threads as $thread)

                <div class="p-4 hover:bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">
                        <a href="{{ route('forum.threads.show', $thread->id) }}" class="hover:text-blue-600">
                            {{ $thread->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 mb-2">{{ Str::limit($thread->content, 150) }}</p>
                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <div>
                            Posted by {{ $thread->user->name }} in
                            <a href="{{ route('forum.categories.show', $thread->forum_category->id) }}" class="text-blue-600 hover:underline">
                                {{ $thread->forum_category->name }}
                            </a>
                        </div>
                        <span>
                        {{ $thread->last_posted_at->diffForHumans() }} •
                        {{ $thread->forum_posts_count }}
                            {{ Str::plural('reply', $thread->forum_posts_count) }}
                    </span>
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">
                    No threads found. Be the first to create one!
                </div>
            @endforelse
        </div>
    </div>

    <div class="mt-4">
        {{ $threads->links() }}
    </div>
@endsection
