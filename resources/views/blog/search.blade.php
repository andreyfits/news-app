@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3>Search Results for "{{ $search }}"</h3>
                <hr>
                <div class="row">
                    @foreach($search_results as $post)
                        <div class="col-lg-6">
                            @include('includes.post')
                        </div>
                    @endforeach
                </div>
                {{ $search_results->appends(['search' => Request::get('search')])->links()}}
            </div>

            @include('includes.sidebar')

        </div>
    </div>
@endsection
