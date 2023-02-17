<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contacts</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
            </ul>
        </div>
        @auth
            <div class="fs-6 text-danger ps-5 pe-3">{{ auth()->user()->name }}</div>
            <div class="text-end">
                <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
            </div>
        @endauth

        @guest
            <div class="text-end ps-5">
                <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
            </div>
        @endguest
    </div>
</nav>
