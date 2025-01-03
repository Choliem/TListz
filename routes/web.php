<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/posts/{post:slug}', function(Post $post){
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user){
    // $posts = $user->posts->load('category', 'author');
    return view('posts', ['title' => count($user -> posts) . ' Articles by ' . $user->name, 'posts' => $user -> posts]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    // $posts = $category->posts->load('category', 'author');
    return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $category -> posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us'], ['nama' => 'Choyim']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
