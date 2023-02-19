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
                            @include('includes.post')
                        </div>
                    @endforeach
                </div>
                {{ $posts->links()}}
            </div>

            @include('includes.sidebar')

        </div>
    </div>
@endsection
