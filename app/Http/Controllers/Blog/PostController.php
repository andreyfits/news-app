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
        $post = Post::active()->findOrFail($id);
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();

        ++$post->views;
        $post->update();

        return view("blog.post", compact('post', 'categories', 'tags'));

    }
}
