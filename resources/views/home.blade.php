@extends('layouts.template')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                @foreach($featured_posts as $featured_post)
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="{{ url('/blog/post/' . $featured_post->id) }}">
                            <img class="card-img-top"
                                 src="{{ asset($featured_post->featured_image->medium) }}"
                                 alt="..."/>
                        </a>
                        <div class="card-body">
                            Posted by <a href="#">{{ $featured_post->user->name }}</a>
                            <div class="small text-muted">{{ $featured_post->created_at->diffForHumans() }}</div>
                            <div class="small text-muted"><i class="bi bi-eye"></i> {{ $featured_post->views }}</div>
                            <h2 class="card-title">{{ $featured_post->title }}</h2>
                            <p class="card-text">{!! Str::limit($featured_post->content, 200) !!}</p>
                            <a class="btn btn-primary" href="{{ url('blog/post/' . $featured_post->id) }}">Read more
                                →</a>
                        </div>
                    </div>
                @endforeach
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach($recent_posts as $recent_post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="{{ url('/blog/post/' . $recent_post->id) }}">
                                    <img class="card-img-top"
                                         src="{{ asset($recent_post->featured_image->thumbnail) }}"
                                         alt="..."/>
                                </a>
                                <div class="card-body">
                                    Posted by <a href="#">{{ $recent_post->user->name }}</a>
                                    <div class="small text-muted">{{ $recent_post->created_at->diffForHumans() }}</div>
                                    <div class="small text-muted"><i class="bi bi-eye"></i> {{ $recent_post->views }}
                                    </div>
                                    <h2 class="card-title h4">{{ $recent_post->title }}</h2>
                                    <p class="card-text">{!! Str::limit($recent_post->content, 200) !!}</p>
                                    <a class="btn btn-primary" href="{{ url('/blog/post/' . $recent_post->id) }}">Read
                                        more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
{{--                    {{ $recent_posts->links() }}--}}
                <!-- Pagination-->
                {{--                <nav aria-label="Pagination">--}}
                {{--                    <hr class="my-0"/>--}}
                {{--                    <ul class="pagination justify-content-center my-4">--}}
                {{--                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a>--}}
                {{--                        </li>--}}
                {{--                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#!">2</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#!">3</a></li>--}}
                {{--                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#!">15</a></li>--}}
                {{--                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>--}}
                {{--                    </ul>--}}
                {{--                </nav>--}}
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
                                            <a href="{{ route('category', ['id' => $post_category]) }}">
                                                {{ $post_category->name }}
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
                                            <a href="{{ route('tag', ['id' => $tag]) }}">{{ $tag->name }}</a>
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
