@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Thread Header -->
        <div class="mb-8">
            <div class="flex items-center text-sm text-gray-500 mb-2">
                <a href="{{ route('forum.categories.show', $thread->forum_category->id) }}" class="text-blue-600 hover:underline">
                    {{ $thread->forum_category->name }}
                </a>
                <span class="mx-2">/</span>
                <span>{{ $thread->created_at->format('M d, Y') }}</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">{{ $thread->title }}</h1>
        </div>

        <!-- Original Post -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-4">
            <div class="p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                        <span class="text-xl font-bold text-gray-600">
                            {{ strtoupper(substr($thread->user->name, 0, 1)) }}
                        </span>
                        </div>
                    </div>
                    <div class="ml-4 flex-grow">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <span class="font-semibold text-gray-900">{{ $thread->user->name }}</span>
                                <span class="text-sm text-gray-500 ml-2">Thread Starter</span>
                            </div>
                            <span class="text-sm text-gray-500">{{ $thread->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="prose max-w-none">
                            {!! nl2br(e($thread->content)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Replies -->
        <div class="space-y-4">
            @forelse($posts as $post)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                <span class="text-xl font-bold text-gray-600">
                                    {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                </span>
                                </div>
                            </div>
                            <div class="ml-4 flex-grow">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="font-semibold text-gray-900">{{ $post->user->name }}</span>
                                    <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="prose max-w-none">
                                    {!! nl2br(e($post->content)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white shadow-md rounded-lg p-6 text-center text-gray-500">
                    No replies yet. Be the first to reply!
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $posts->links() }}
        </div>

        <!-- Reply Form -->
        @auth
            <div class="mt-8">
                <form action="{{ route('forum.posts.store', $thread->id) }}" method="POST">
                    @csrf
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Post Reply</h3>
                            <textarea
                                name="content"
                                rows="4"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            >{{ old('content') }}</textarea>
                            @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <div class="mt-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Post Reply
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @else
            <div class="mt-8 bg-white shadow-md rounded-lg p-6 text-center">
                <p class="text-gray-600">Please <a href="{{ route('login') }}" class="text-blue-600 hover:underline">log in</a> to post a reply.</p>
            </div>
        @endauth
    </div>
@endsection
