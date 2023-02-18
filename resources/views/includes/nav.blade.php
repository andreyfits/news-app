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
                <li class="nav-item me-5"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
            </ul>
            @auth
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout.perform') }}">Logout</a>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login.perform') }}" class="btn btn-outline-light btn-sm me-2">Login</a>
                <a href="{{ route('register.perform') }}" class="btn btn-warning btn-sm">Sign-up</a>
            @endguest
        </div>
    </div>
</nav>
