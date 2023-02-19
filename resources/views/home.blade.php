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
                    @foreach($recent_posts as $post)
                        <div class="col-lg-6">
                            @include('includes.post')
                        </div>
                    @endforeach
                </div>
                {{ $recent_posts->links() }}
            </div>

            @include('includes.sidebar')

        </div>
    </div>
@endsection
