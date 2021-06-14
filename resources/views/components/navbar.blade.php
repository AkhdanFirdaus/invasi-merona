{{-- @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
@else
<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

@if (Route::has('register'))
<a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
@endif
@endauth
</div>
@endif --}}

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Invasi Merona</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a @if(url()->current() === url('/')) class="nav-link active" aria-current="page" @else
                        class="nav-link"
                        @endif
                        href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a @if(url()->current() === url('/artikel')) class="nav-link active" aria-current="page" @else
                        class="nav-link"
                        @endif href="{{ url('/artikel') }}">Artikel</a>
                </li>
                <li class="nav-item">
                    <a @if(url()->current() === url('/covid')) class="nav-link active" aria-current="page" @else
                        class="nav-link"
                        @endif href="{{ url('/covid') }}">Covid 19</a>
                </li>
                <li class="nav-item">
                    <a @if(url()->current() === url('/vaksin')) class="nav-link active" aria-current="page" @else
                        class="nav-link"
                        @endif href="{{ url('/vaksin') }}">Vaksin</a>
                </li>
                <li class="nav-item">
                    <a @if(url()->current() === url('/tentang-kami')) class="nav-link active" aria-current="page" @else
                        class="nav-link"
                        @endif href="{{ url('/tentang-kami') }}">Tentang Kami</a>
                </li>
                @auth()
                <li class="nav-item dropdown">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#sidebar" role="button"
                        aria-controls="sidebar">
                        {{auth()->user()->name}}
                    </a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li><a class="dropdown-item" href="{{ url('/logout') }}">logout</a></li>
                </ul>
                </li> --}}
                @endauth
            </ul>
            @guest
            <a class="btn btn-primary" href="{{ url('/login') }}">Login</a>
            @endguest
        </div>
    </div>
</nav>
