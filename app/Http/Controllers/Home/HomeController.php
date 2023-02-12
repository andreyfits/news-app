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
        $recent_posts = Post::with('user')
            ->orderBy('created_at', 'asc')
            ->where('active', 1)
            ->paginate(4);
        $post_categories = Category::with('posts')
            ->where('active', 1)
            ->whereHas('posts', function ($query) {
                $query->where('active', 1);
            })
            ->latest()
            ->get();
        $featured_posts = Post::with('user')
            ->where('featured_post', 1)
            ->get();
        $tags = Tag::has('posts')->get();

        return view('home', compact('recent_posts', 'post_categories', 'featured_posts', 'featured_posts', 'tags'));
    }
}
