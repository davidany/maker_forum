@extends('layouts.app')

@section('content')
    <body class="bg-gray-100">
    <nav class="bg-yellow-400 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold text-gray-800">lvl1</div>
            <div class="space-x-4">
                <a href="#" class="text-gray-800 hover:text-gray-600 font-medium">Home</a>
                <a href="#" class="text-gray-800 hover:text-gray-600 font-medium">Forum</a>
                <a href="#" class="text-gray-800 hover:text-gray-600 font-medium">About</a>
                <a href="#" class="text-gray-800 hover:text-gray-600 font-medium">Events</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Community Forum</h1>
            <div class="flex justify-between items-center">
                <div class="relative w-64">
                    <input type="text" placeholder="Search topics..." class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" />
                    <button class="absolute right-0 top-0 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        </svg>
                    </button>
                </div>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    New Topic
                </button>
            </div>
        </header>

        @yield('forum-content')

        <footer class="mt-8 text-center text-gray-500">
            <p>&copy; 2024 Community Forum. All rights reserved.</p>
        </footer>
    </div>
    </body>
@endsection