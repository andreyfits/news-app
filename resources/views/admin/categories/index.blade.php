@extends('layouts.admin.template')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categories</h1>
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
                                <h3 class="card-title">List of categories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @include('includes.admin.alerts')
                                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add new</a>
                                @if (count($categories))
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th style="width: 30px">#</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->title }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td>
                                                        <form
                                                            action="{{ route('categories.destroy', $category->id) }}"
                                                            method="post" class="float-left">
                                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                               class="btn btn-primary btn-sm float-left mr-1">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Do you really want to delete category!')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p>There are no categories yet...</p>
                                @endif
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                {!! $categories->links() !!}
                            </div>
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
    <!-- /.content-wrapper -->
@endsection
