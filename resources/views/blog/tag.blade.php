@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3>Posts by tags "{{ $tag->title }}"</h3>
                <hr>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                @if($post->image)
                                    <a href="{{ route('post', ['slug' => $post->slug]) }}">
                                        <img class="card-img-top" src="{{ asset($post->image) }}" alt="..."/>
                                    </a>
                                @endif
                                <div class="card-body">
                                    <h2 class="card-title h4 ">
                                        <a class="text-decoration-none link-dark"
                                           href="{{ route('post', ['slug' => $post->slug]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h2>
                                    <div class="small text-muted">
                                        <i class="bi bi-clock"></i> {{ $post->created_at->diffForHumans() }}
                                    </div>
                                    <a class="badge bg-secondary text-decoration-none link-light"
                                       href="{{ route('category', $post->category->slug) }}">
                                        {{ $post->category->title }}
                                    </a>
                                    <div class="small text-muted mt-1 mb-3">
                                        <i class="bi bi-eye"></i> {{ $post->views }}
                                    </div>

                                    <p class="card-text">{!! Str::limit($post->content, 200) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $posts->links()}}
            </div>
            <div class="col-lg-4">
                {{--                <!-- Search widget-->--}}
                {{--                <div class="card mb-4">--}}
                {{--                    <div class="card-header">Search</div>--}}
                {{--                    <div class="card-body">--}}
                {{--                        <div class="input-group">--}}
                {{--                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />--}}
                {{--                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($post_categories as $post_category)
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a class="text-decoration-none link-dark"
                                               href="{{ route('category', $post_category->slug) }}">
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
                                            <a class="text-decoration-none link-dark"
                                               href="{{ route('tag', $tag->slug) }}">{{ $tag->title }}</a>
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
