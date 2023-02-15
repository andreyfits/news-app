@extends('layouts.admin.template')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Post "{{ $post->title }}"</h3>
                            </div>
                            <!-- /.card-header -->

                            <form role="form" method="post" action="{{ route('posts.update', $post->id) }}"
                                  enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="card-body">
                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label for="title">Title</label>
                                        <input type="text" name="title"
                                               class="form-control @error('title') is-invalid @enderror" id="title"
                                               placeholder="Title"
                                               value="{{ $post->title }}">
                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                        <label for="content">Content</label>
                                        <textarea name="content"
                                                  class="form-control @error('content') is-invalid @enderror"
                                                  id="content" rows="7"
                                                  placeholder="Content ...">{{ $post->content }}</textarea>
                                        @if ($errors->has('content'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('content') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label for="category_id">Category</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                                id="category_id" name="category_id">
                                            @foreach($categories as $key => $value)
                                                <option value="{{ $key }}" @if($key === $post->category_id) selected
                                                    @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('category') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('tags[]') ? ' has-error' : '' }}">
                                        <label for="tags">Tags</label>
                                        <select name="tags[]" id="tags" class="select2" multiple="multiple"
                                                data-placeholder="Choose tags" style="width: 100%;">
                                            @foreach($tags as $key => $value)
                                                <option value="{{ $key }}" @if(in_array($key, $post->tags->pluck('id')
                                                ->all(), true)) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('tags[]'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('tags[]') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('image') ? ' has-error ':''}}">
                                        <label for="image">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" id="image"
                                                       class="custom-file-input">
                                                <label class="custom-file-label" for="image">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                        <img id="preview_image"
                                             src="@if(isset($post)){{$post->image}}@endif"
                                             class="img-thumbnail mt-2" height="150" width="150"/>
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
