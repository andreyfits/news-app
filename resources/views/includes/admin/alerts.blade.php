@if(Session::has('success'))
    <div class="alert alert-success">
        <i class="fas fa-thumbs-up"></i>
        <button data-dismiss="alert" class="close">&times;</button>
        {{ Session::get('success') }}
    </div>
@elseif(Session::has('danger'))
    <div class="alert alert-danger">
        <button data-dismiss="alert" class="close">&times;</button>
        {{ Session::get('danger') }}
    </div>
@elseif(Session::has('warning'))
    <div class="alert alert-warning">
        <button data-dismiss="alert" class="close">&times;</button>
        {{ Session::get('warning') }}
    </div>
@elseif(Session::has('info'))
    <div class="alert alert-info">
        <button data-dismiss="alert" class="close">&times;</button>
        {{ Session::get('info') }}
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-danger">
        <button data-dismiss="alert" class="close">&times;</button>
        {{ Session::get('error') }}
    </div>
@endif
