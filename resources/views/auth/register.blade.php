<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <b>Register</b>
        </div>
        <div class="card-body">
            <form action="{{ route('register.perform') }}" method="post">
                {{ csrf_field() }}

                @if ($errors->has('name'))
                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                @endif
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           name="name"
                           placeholder="Full name"
                           value="{{ old('name') }}"
                           autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('username'))
                    <strong class="text-danger">{{ $errors->first('username') }}</strong>
                @endif
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           name="username"
                           placeholder="Username"
                           value="{{ old('username') }}"
                           autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('email'))
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                @endif
                <div class="input-group mb-3">
                    <input type="email"
                           class="form-control"
                           name="email"
                           placeholder="Email"
                           value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                @endif
                <div class="input-group mb-3">
                    <input type="password"
                           class="form-control"
                           name="password"
                           placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @if ($errors->has('password_confirmation'))
                    <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
                @endif
                <div class="input-group mb-3">
                    <input type="password"
                           class="form-control"
                           name="password_confirmation"
                           placeholder="Confirm password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>
            <a href="#" class="text-center mt-1">I already have a membership</a>
        </div>

    </div>
</div>
<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>
</html>

