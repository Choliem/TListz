<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Toggle like for a post.
     */
    public function toggleLike(Post $post)
    {
        $user = Auth::user();

        // Check if the user already liked the post
        $like = Like::where('post_id', $post->id)->where('user_id', $user->id)->first();

        if ($like) {
            // Unlike the post
            $like->delete();
            $status = 'unliked';
        } else {
            // Like the post
            Like::create([
                'post_id' => $post->id,
                'user_id' => $user->id,
            ]);
            $status = 'liked';
        }

        // Return the like count and status
        return response()->json([
            'status' => $status,
            'likesCount' => $post->likes()->count(),
        ]);
    }
}
