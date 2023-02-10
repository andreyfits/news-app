<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        $recent_posts = Post::OrderBy('created_at', 'Desc')->where('active', '1')->limit(4)->get();
        $categories = Category::latest()->get();
        $featured_posts = Post::where('featured_post', '1')->get();
        $tags = Tag::has('posts')->get();

        return view('home', compact('recent_posts', 'categories', 'featured_posts', 'featured_posts', 'tags'));
    }
}
