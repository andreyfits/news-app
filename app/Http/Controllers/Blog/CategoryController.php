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
     * @param  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $category = Category::with('posts')
            ->where('id', $id)
            ->firstOrFail();
        $post_categories = Category::with('posts')
            ->where('active', 1)
            ->whereHas('posts', function ($query) {
                $query->where('active', 1);
            })
            ->latest()
            ->get();
        $posts = $category->posts()
            ->with('user')
            ->where('posts.active', 1)
            ->paginate(4);
        $tags = Tag::has('posts')
            ->get();

        return view('blog.category', compact('category', 'posts', 'tags', 'post_categories'));
    }
}
