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
    <!-- Popular posts widget-->
    <div class="card mb-4">
        <div class="card-header">Popular Posts</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @foreach($popular_posts as $post)
                        <div id="popular">
                            <div class="nav-tab-item mx-3">
                                <div class="d-flex pb-2 pt-3">
                                    @if($post->image)
                                        <a href="{{ route('post', ['slug' => $post->slug]) }}">
                                            <div>
                                                <img src="{{ asset($post->image) }}"
                                                     class="pic p-1" alt="">
                                            </div>
                                        </a>
                                    @endif
                                    <div class="ps-3">
                                        <p class="m-0 g-color h5">
                                            <a class="text-decoration-none link-dark"
                                               href="{{ route('post', ['slug' => $post->slug]) }}">
                                                {{ Str::limit($post->title, 40) }}
                                            </a>
                                        </p>
                                        <p class="m-0 textmuted">
                                            <i class="bi bi-clock"></i>
                                            {{ $post->created_at->diffForHumans() }} |
                                            <i class="bi bi-eye"></i> {{ $post->views }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="text-decoration-none link-dark"
                                   href="{{ route('category', $category->slug) }}">
                                    {{ $category->title }}
                                    <span class="pull-right">({{ $category->posts_count }})</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Tags widget-->
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
