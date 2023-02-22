<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer(['home', 'blog.post', 'blog.category', 'blog.tag', 'blog.search'], function ($view) {
            if (Cache::has('categories')) {
                $categories = Cache::get('categories');
            } else {
                $categories = Category::with('posts')
                    ->withCount('posts')
                    ->whereHas('posts', function ($query) {
                        $query->where('active', 1);
                    })
                    ->orderBy('posts_count', 'desc')
                    ->get();
                Cache::put('categories', $categories, 20);
            }

            $view->with('popular_posts', Post::where('active', 1)->orderBy('views', 'desc')->limit(3)->get());
            $view->with('categories', $categories);
        });
    }
}
