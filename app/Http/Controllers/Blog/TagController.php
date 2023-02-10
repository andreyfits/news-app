<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class TagController extends Controller
{
    /**
     * Display tags.
     *
     * @param  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        $posts = $tag->posts()->where('posts.active', 1)->paginate(4);

        return view('blog.tag', compact('tag', 'posts'));
    }
}
