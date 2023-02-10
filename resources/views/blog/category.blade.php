@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>{{ $category->name }}</h3>
                <hr>
                <div class="row">
                    {{ dd($posts) }}
                    @foreach($posts as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="{{ route('post',['id' => $post->id]) }}">
                                    <img class="card-img-top"
                                         src="{{ asset($post->featured_image->thumbnail) }}"
                                         alt="..."/>
                                </a>
                                <div class="card-body">
                                    Posted by
                                    <a href="#">
                                        {{ $post->user->name }}
                                    </a>
                                    <div class="small text-muted">{{ $post->created_at->diffForHumans() }}</div>
                                    <div class="small text-muted"><i class="bi bi-eye"></i> {{ $post->views }}</div>
                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text">{!! Str::limit($post->content, 200) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $posts->links()}}
            </div>
        </div>
    </div>
@endsection
