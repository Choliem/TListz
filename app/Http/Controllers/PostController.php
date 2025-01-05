<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Post;
use App\Models\Tier;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show($slug)
    {
        // Eager load tiers and items
        $post = Post::with(['tiers.items', 'comments'])->where('slug', $slug)->firstOrFail();

        // Extract tiers from the post
        $tiers = $post->tiers;

        // Pass both $post and $tiers to the view
        return view('post.show', compact('post', 'tiers', 'comments'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('post.add', ['title' => 'Add New Post', 'categories' => $categories]);
    }

    public function edit($slug)
    {
        // Fetch the post and its associated tiers and items
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->load(['tiers.items']);

        // Fetch categories (unchanged)
        $categories = Category::all();

        // Fetch items with null tier_id (unassigned items)
        $unassignedItems = Item::where('post_id', $post->id)->whereNull('tier_id')->get();

        // Return the view with the post, categories, and unassigned items
        return view('post.edit', compact('post', 'categories', 'unassignedItems'), ['title' => 'Edit Post']);
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'required|string|max:255',
            'tiers.*.name' => 'required|string|max:255',
        ]);

        // Fetch and update the post
        $post = Post::where('slug', $slug)->firstOrFail();
        $hasChanges = false;

        if ($post->title !== $request->title) {
            $post->title = $request->title;
            $hasChanges = true;
        }

        if ($post->body !== $request->body) {
            $post->body = $request->body;
            $hasChanges = true;
        }

        $category = Category::firstOrCreate(['name' => $request->category]);
        if ($post->category_id !== $category->id) {
            $post->category_id = $category->id;
            $hasChanges = true;
        }

        // Update tier names
        if ($request->has('tiers')) {
            foreach ($request->input('tiers') as $tierId => $tierData) {
                $tier = Tier::find($tierId);
                if ($tier && $tier->name !== $tierData['name']) {
                    $tier->name = $tierData['name'];
                    $tier->save();
                    $hasChanges = true;
                }
            }
        }

        if ($hasChanges) {
            $post->save();
            return redirect()->route('post.edit', $post->slug)->with('success', 'Post Updated!');
        }

        return redirect()->route('post.edit', $post->slug);
    }

    public function delete($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $postTitle = $post->title;
        $post->delete();

        return redirect()->route('home')->with('success', '"' . $postTitle . '" has been deleted successfully!');
    }

    public function submit(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category' => 'required|string|max:255',
        ]);

        // Cari atau buat kategori baru
        $category = Category::firstOrCreate(['name' => $request->category]);

        // Buat post baru
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-') . '-' . Str::random(8);
        $post->body = $request->body;
        $post->category_id = $category->id;
        $post->author_id = Auth::id();
        $post->save();
        return redirect()->route('post.add')->with('success', 'Post Added!');
    }

}
