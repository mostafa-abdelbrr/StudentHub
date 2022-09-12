<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">StudentHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="/">Home</a>--}}
{{--                </li>--}}
                @if(Auth::check() && Auth::User()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.list') }}">User List</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('company.list') }}">Company List</a>
                    </li>
                @endif
                <li>
                    <a class="nav-link" href="{{ route('internship.list') }}">Internship List</a>
                </li>
                @if(Auth::check())
                    <li>
                        <a class="nav-link" href="{{ route('user.profile') }}">Profile</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('user.logout') }}">Log out</a>
                    </li>
                @else
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    </li>
                @endif
                {{ $slot }}
            </ul>
        </div>
    </div>
</nav>
