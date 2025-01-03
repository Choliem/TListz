<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{

    function show()
    {
        return view("post.show");
    }

    function add()
    {
        return view("post.add", ['title' => 'Add New Post', 'categories' => Category::all()]);


        $categories = Category::all();
        return view('add', ['title' => 'Add New Post', 'categories' => $categories]);
    }

    public function store(Request $request)
    {


        // Validasi input
        $request->validate(['title' => 'required|string|max:255', 'body' => 'required|string', 'category' => 'required|string|max:255',]);

        // Cari atau buat kategori baru
        $category = Category::firstOrCreate(['name' => $request->category]);

        // Buat post baru
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->body = $request->body;
        $post->category_id = $category->id;
        $post->author_id = Auth::id();
        $post->save();
        return redirect()->route('post.add')->with('success', 'Post Added!');
    }
}
