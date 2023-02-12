<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    /**
     * Display single post.
     *
     * @param  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $post = Post::with('user')
            ->where('active', 1)
            ->findOrFail($id);
        $post_categories = Category::with('posts')
            ->where('active', 1)
            ->whereHas('posts', function ($query) {
                $query->where('active', 1);
            })
            ->latest()
            ->get();
        $tags = Tag::has('posts')
            ->latest()
            ->get();

        ++$post->views;
        $post->update();

        return view("blog.post", compact('post', 'post_categories', 'tags'));
    }
}
