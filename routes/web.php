<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {
    $posts = Post::with(['author', 'category'])->latest()->get();
    return view('posts', ['title' => 'Blog Page', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function(Post $post){
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user){
    $posts = $user->posts->load('category', 'author');
    return view('posts', ['title' => count($posts) . ' Articles by ' . $user->name, 'posts' => $posts]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Us'], ['nama' => 'Choyim']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Us']);
});

