@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Category Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">{{ $category->name }}</h1>
                    <p class="text-gray-600 mt-2">{{ $category->description }}</p>
                </div>
                @auth
                    <a href="{{ route('forum.threads.create', ['category_id' => $category->id]) }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        New Thread
                    </a>
                @endauth
            </div>
        </div>

        <!-- Thread List -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="divide-y divide-gray-200">
                @forelse($threads as $thread)
                    <div class="p-4 hover:bg-gray-50">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold text-gray-800 mb-2">
                                    <a href="{{ route('forum.threads.show', $thread->id) }}" class="hover:text-blue-600">
                                        {{ $thread->title }}
                                    </a>
                                </h2>
                                <p class="text-gray-600 mb-2">{{ Str::limit($thread->content, 150) }}</p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <span>Posted by {{ $thread->user->name }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $thread->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="ml-6 text-right">
                                <div class="text-gray-900 font-medium">
                                    {{ $thread->forum_posts_count }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ Str::plural('reply', $thread->forum_posts_count) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-4 text-center text-gray-500">
                        No threads in this category yet.
                        @auth
                            <a href="{{ route('forum.threads.create', ['category_id' => $category->id]) }}"
                               class="text-blue-600 hover:underline">
                                Start a new thread
                            </a>
                        @endauth
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $threads->links() }}
        </div>
    </div>
@endsection
