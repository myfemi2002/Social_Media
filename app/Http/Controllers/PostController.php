<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments.replies.user', 'comments.user')->get();
        return view('user.index', compact('posts'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'nullable|in:Everyone,Friends,Only me',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->content = $request->input('content');
        $post->status = $request->input('status');

        // Process image if it exists in the request
        if ($request->hasFile('image')) {
            // Generate a unique name for the new image
            $imageName = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();

            // Resize and save the new image
            // $manager = new ImageManager();
            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('image')->getRealPath())->resize(750, 500);
            $image->save(public_path('upload/post_images/' . $imageName));

            // Set the image field in the post
            $post->image = 'upload/post_images/' . $imageName;
        }

        $post->save();

        return redirect()->back()->with('success', 'Post created successfully!');
    }


}
