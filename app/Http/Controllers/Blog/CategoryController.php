<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    /**
     * Display categories.
     *
     * @param  $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $category = Category::with('posts')
            ->where('slug', $slug)
            ->whereHas('posts', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('title')
            ->firstOrFail();
        $post_categories = Category::with('posts')
            ->whereHas('posts', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('title')
            ->latest()
            ->get();
        $posts = $category->posts()
            ->with('category', 'user')
            ->with('user')
            ->where('active','1')
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        $tags = Tag::with('posts')
            ->whereHas('posts', function ($query) {
                $query->where('active', 1);
            })
            ->orderBy('title')
            ->get();

        return view('blog.category', compact('category', 'posts', 'tags', 'post_categories'));
    }
}
