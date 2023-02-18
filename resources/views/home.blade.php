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
                                @if($recent_post->image)
                                    <a href="{{ route('post', ['slug' => $recent_post->slug]) }}">
                                        <img class="card-img-top"
                                             src="{{ asset($recent_post->image) }}"
                                             alt="..."/>
                                    </a>
                                @endif
                                <div class="card-body">
                                    <h2 class="card-title h4">
                                        <a class="text-decoration-none link-dark" href="{{ route('post', ['slug' =>
                                        $recent_post->slug]) }}">
                                            {{ $recent_post->title }}
                                        </a>
                                    </h2>
                                    <div class="small text-muted">
                                        <i class="bi bi-clock"></i> {{ $recent_post->created_at->diffForHumans() }}
                                    </div>
                                    <a class="badge bg-secondary text-decoration-none link-light"
                                       href="{{ route('category', $recent_post->category->slug) }}">
                                        {{ $recent_post->category->title }}
                                    </a>
                                    <div class="small text-muted mt-1 mb-3">
                                        <i class="bi bi-eye"></i> {{ $recent_post->views }}
                                    </div>
                                    <p class="card-text">{!! Str::limit($recent_post->content, 200) !!}</p>
                                    <a class="btn btn-primary"
                                       href="{{ route('post', ['slug' => $recent_post->slug]) }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $recent_posts->links() }}
            </div>

            @include('includes.sidebar')

        </div>
    </div>
@endsection
