<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel">Invasi Merona</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <img src="{{ asset('img/coollogo.png') }}" alt="Logo" class="img-fluid">
            <p>Kenali penyakit sebelum dikenai penyakit</p>
        </div>
        <hr />
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <a class="btn
                    @if(url()->current() === url('/'))
                    btn-primary
                    @else
                    btn-light
                    @endif
                    align-items-center" href="{{ url('/') }}">Home</a>
            </li>
            @if (auth()->user()->role != 3)
            <li class="mb-1">
                <a class="btn
                    @if(url()->current() === url('/dashboard/pendaftaran'))
                    btn-primary
                    @else
                    btn-light
                    @endif
                    align-items-center" href="{{ url('/dashboard/pendaftaran') }}">
                    Pendaftar
                </a>
            </li>
            @else
            <li class="mb-1">
                <a class="btn
                    @if(url()->current() === url('/dashboard/data-diri'))
                    btn-primary
                    @else
                    btn-light
                    @endif
                    align-items-center" href="{{ url('/dashboard/data-diri') }}">
                    Data Diri
                </a>
            </li>
            @endif
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#dashboard-collapse" aria-expanded="false">
                    Dashboard
                </button>
                <div class="collapse mt-1" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="mb-1">
                            <a class="
                                btn
                                @if(url()->current() === url('/dashboard/artikel'))
                                btn-primary
                                @else
                                btn-light
                                @endif" href="{{ url('/dashboard/artikel') }}">Artikel</a>
                        </li>
                        <li class="mb-1">
                            <a class="
                                btn
                                @if(url()->current() === url('/dashboard/covid'))
                                btn-primary
                                @else
                                btn-light
                                @endif" href="{{ url('/dashboard/covid') }}">Covid</a>
                        </li>
                        <li class="mb-1">
                            <a class="btn
                                @if(url()->current() === url('/dashboard/vaksin'))
                                btn-primary
                                @else
                                btn-light
                                @endif" href="{{ route('vaksin.index') }}">Vaksin</a>
                        </li>
                    </ul>
                </div>
            </li>
            @if (auth()->user()->role != 3)
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#orders-collapse" aria-expanded="false">
                    Rumah Sakit
                </button>
                <div class="collapse mt-1" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="mb-1">
                            <a class="btn
                            @if(url()->current() === url('/rumah-sakit'))
                            btn-primary
                            @else
                            btn-light
                            @endif" href="{{ url('/rumah-sakit') }}">Overview</a>
                        </li>
                        @if (auth()->user()->role == 2)
                        <li class="mb-1">
                            <a class="
                            btn
                            @if(url()->current() === url('/rumah-sakit/profil'))
                            btn-primary
                            @else
                            btn-light
                            @endif" href="{{ url('/rumah-sakit/profil') }}">Profil</a>
                        </li>
                        <li class="mb-1">
                            <a class="
                            btn
                            @if(url()->current() === url('/rumah-sakit/jadwal'))
                            btn-primary
                            @else
                            btn-light
                            @endif" href="{{ url('/rumah-sakit/jadwal') }}">Jadwal</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>
            @endif
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle d-flex align-items-center rounded collapsed" data-bs-toggle="collapse"
                    data-bs-target="#account-collapse" aria-expanded="false">
                    <div class="flex-shrink-0">
                        <i class="fas fa-user-circle fa-2x"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        {{ auth()->user()->name }}
                    </div>
                </button>
                <div class="collapse mt-1" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                        <li class="mb-1"><a href="{{ url('/profil') }}" class="btn btn-light">Profile</a></li>
                        <li class="mb-1"><a href="#" class="btn btn-light my-2">Settings</a></li>
                        <li class="mb-1"><a href="{{ url('/logout') }}" class="btn btn-danger">Logout</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
