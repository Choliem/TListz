<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TierController;



Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', function () {

    // $posts = Post::with(['author', 'category'])->latest()->get();
    return view('posts', ['title' => 'Blog Page', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(12)->withQueryString()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    $post->load(['tiers.items']);
    return view('post.show', ['title' => 'Single Post', 'post' => $post]);
});


Route::get('/authors/{user:username}', function (User $user) {
    // $posts = $user->posts->load('category', 'author');
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});


Route::get('/categories/{category:slug}', function (Category $category) {
    // $posts = $category->posts->load('category', 'author');
    return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/my-page', function () {
    return view('mypage', ['title' => 'My Page']);
})->middleware('auth');


Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/add', [PostController::class, 'add'])->name('post.add');
Route::post('/post/submit', [PostController::class, 'submit'])->name('post.submit')->middleware('auth');

Route::get('/post/edit/{slug}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/post/update/{slug}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/delete/{slug}', [PostController::class, 'delete'])->name('post.delete');

Route::post('/tiers', [TierController::class, 'store']);
Route::delete('/tiers/{tier}', [TierController::class, 'destroy']);

Route::post('/items', [ItemController::class, 'store']);
