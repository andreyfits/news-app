<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TagController extends Controller
{
    /**
     * Display tags.
     *
     * @param  $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $tag = Tag::with('posts')
            ->where('slug', $slug)
            ->orderBy('title')
            ->firstOrFail();
        $tags = Tag::has('posts')
            ->orderBy('title')
            ->get();
        $posts = $tag->posts()
            ->with('user')
            ->where('posts.active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        $post_categories = Category::with('posts')
            ->where('active', 1)
            ->whereHas('posts', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('title')
            ->latest()
            ->get();

        return view('blog.tag', compact('tag', 'tags', 'posts', 'post_categories'));
    }
}
