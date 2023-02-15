<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Show home page
     *
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $recent_posts = Post::orderBy('created_at', 'desc')
            ->paginate(4);
        $post_categories = Category::with('posts')
            ->orderBy('title')
            ->latest()
            ->get();
        $tags = Tag::has('posts')
            ->orderBy('title')
            ->get();

        return view('home', compact('recent_posts', 'post_categories', 'tags'));
    }
}
