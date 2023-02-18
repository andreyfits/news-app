@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3>Posts by category "{{ $category->title }}"</h3>
                <hr>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                @if($post->image)
                                    <a class="text-decoration-none link-dark" href="{{ route('post', $post->slug) }}">
                                        <img class="card-img-top" src="{{ asset($post->image) }}" alt="..."/>
                                    </a>
                                @endif
                                <div class="card-body">
                                    <h2 class="card-title h4">
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

            @include('includes.sidebar')

        </div>
    </div>
@endsection
