<?php

use App\Http\Controllers\ForumThreadController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

    Route::get('/forum', [ForumThreadController::class, 'index'])->name('forum.index');
Route::get('/forum/threads/{thread}', [ForumThreadController::class, 'show'])->name('forum.threads.show');
Route::post('/forum/threads/{thread}/posts', [ForumPostController::class, 'store'])->name('forum.posts.store')->middleware('auth');
Route::get('/forum/categories/{category}', [ForumCategoryController::class, 'show'])->name('forum.categories.show');


Route::get('/for', function () {
    return view('forum');
});
