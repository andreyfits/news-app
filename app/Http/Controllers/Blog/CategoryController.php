<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $category = Category::findOrFail($id);
        $posts = $category->posts()->where('posts.active', 1)->paginate(4);

        return view('blog.category', compact('category', 'posts'));
    }
}
