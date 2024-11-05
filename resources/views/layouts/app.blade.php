<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link type="image/png" href="/favicon.ico?v=1" rel="shortcut icon"/>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/js/app.js')

    @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>

    <!--    Will render javascript from child -->

    <script src="//unpkg.com/alpinejs" defer></script>

    @livewireStyles
</head>

<body>
{{--<x-notifications position="top-right"/>--}}
{{--<x-dialog z-index="z-50" blur="sm" align="center"/>--}}
{{-- @section --}}
<div class="main-container">
    <div class="main-content">
        @yield('content')
    </div>
</div>
@livewireScripts
</body>
<script>document.addEventListener('logMessage', event => {
        console.log(event.detail.message);
    });</script>
</html>
