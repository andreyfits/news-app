<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name">Name *</label>
    <input type="text" name="name"
           class="form-control @error('name') is-invalid @enderror" id="name"
           placeholder="Name"
           @if(isset($user->name))value="{{ $user->name }} @else value="{{ old('name') }}" @endif">
    @if ($errors->has('name'))
        <span class="help-block">
            <strong class="text-danger">{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label for="username">Username *</label>
    <input type="text" name="username"
           class="form-control @error('username') is-invalid @enderror" id="username"
           placeholder="Username"
           @if(isset($user->username))value="{{ $user->username }} @else value="{{ old('username') }}"@endif">
    @if ($errors->has('username'))
        <span class="help-block">
            <strong class="text-danger">{{ $errors->first('username') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email">Email *</label>
    <input type="email" name="email"
           class="form-control @error('email') is-invalid @enderror" id="email"
           placeholder="Email"
           @if(isset($user->email))value="{{ $user->email }} @else value="{{ old('email') }}"@endif">
    @if ($errors->has('email'))
        <span class="help-block">
            <strong class="text-danger">{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password">Password *</label>
    <input type="password" name="password"
           class="form-control @error('password') is-invalid @enderror" id="password"
           placeholder="Password"
           value="{{ old('password') }}">
    @if ($errors->has('password'))
        <span class="help-block">
            <strong class="text-danger">{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
    <label for="confirm_password">Confirm password *</label>
    <input type="password" name="confirm_password"
           class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password"
           placeholder="Confirm password"
           value="{{ old('confirm_password') }}">
    @if ($errors->has('confirm_password'))
        <span class="help-block">
            <strong class="text-danger">{{ $errors->first('confirm_password') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label>Is Admin: *</label>
    <label class="radio-inline">
        <input id="yes" name="is_admin" type="radio" value="1" @if(isset($user->is_admin)) {{ ($user->is_admin
        ===
        1) ?
        "checked" :
        "" }} @endif> Yes
    </label>
    <label class="radio-inline">
        <input id="no" name="is_admin" type="radio" value="0" @if(isset($user->is_admin)) {{ ($user->is_admin
        ===
        0) ?
        "checked" :
        "" }} @endif> No
    </label>
</div>
