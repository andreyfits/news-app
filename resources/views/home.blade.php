@extends('layouts.template')

@section('content')
    @include('includes.alerts')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach($recent_posts as $recent_post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="{{ route('post', ['slug' => $recent_post->slug]) }}">
                                    <img class="card-img-top"
                                         src="{{ asset($recent_post->image) }}"
                                         alt="..."/>
                                </a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ $recent_post->created_at->diffForHumans() }}</div>
                                    <div class="small text-muted"><i class="bi bi-eye"></i> {{ $recent_post->views }}
                                    </div>
                                    <h2 class="card-title h4">{{ $recent_post->title }}</h2>
                                    <p class="card-text">{!! Str::limit($recent_post->content, 200) !!}</p>
                                    <a class="btn btn-primary"
                                       href="{{ route('post', ['slug' => $recent_post->slug]) }}">Read
                                        more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $recent_posts->links() }}
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                {{--                <!-- Search widget-->--}}
                {{--                <div class="card mb-4">--}}
                {{--                    <div class="card-header">Search</div>--}}
                {{--                    <div class="card-body">--}}
                {{--                        <div class="input-group">--}}
                {{--                            <input class="form-control" type="text" placeholder="Enter search term..."--}}
                {{--                                   aria-label="Enter search term..." aria-describedby="button-search"/>--}}
                {{--                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($post_categories as $post_category)
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="{{ route('category', $post_category->slug) }}">
                                                {{ $post_category->title }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Tags</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($tags as $tag)
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="{{ route('tag', $tag->slug) }}">{{ $tag->title }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
