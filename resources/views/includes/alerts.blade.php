@if(Session::has('success'))
    <div class="alert alert-success">
        <i class="bi bi-hand-thumbs-up"></i>
        {{ Session::get('success') }}
        <button data-bs-dismiss="alert" class="btn-close float-end" aria-label="Close"></button>
    </div>
@elseif(Session::has('danger'))
    <div class="alert alert-danger">
        {{ Session::get('danger') }}
        <button data-bs-dismiss="alert" class="btn-close float-end" aria-label="Close"></button>
    </div>
@elseif(Session::has('warning'))
    <div class="alert alert-warning">
        {{ Session::get('warning') }}
        <button data-bs-dismiss="alert" class="btn-close float-end" aria-label="Close"></button>
    </div>
@endif

@if (isset ($errors) && count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


