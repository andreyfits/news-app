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
     * @param  $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $post = Post::with('user')
            ->where('slug', $slug)
            ->where('active', 1)
            ->orderBy('created_at', 'desc')
            ->firstOrFail();
        $post_categories = Category::with('posts')
            ->where('active', 1)
            ->whereHas('posts', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('title')
            ->latest()
            ->get();
        $tags = Tag::has('posts')
            ->orderBy('title')
            ->latest()
            ->get();

        ++$post->views;
        $post->update();

        return view("blog.post", compact('post', 'post_categories', 'tags'));
    }
}
