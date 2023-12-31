<!-- Navbar Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">

                        <img src="{{asset('../image/img/AKIRA.jpg')}}" alt="" style="width: 50px; height:50px; margin-right:9px" class="img-fluid ms-2 rounded-circle">
                        <h2 class="m-0 text-primary text-uppercase">Akira Kos</h2>
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.html" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">Kos</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0 ">
                                <a href="/" class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}">Home</a>
                                <a href="/availability" class="nav-item nav-link {{ (request()->is('availability')) ? 'active' : '' }}">Kamar</a>
                            </div>
                            @guest
                            <a href="/login" class="nav-item nav-link"><button type="button" class="btn btn-sm text-light" style="background-color: orange">Masuk</button></a>
                            <a href="/register" class="nav-item nav-link" style="margin-left: -0.4cm"><button type="button" class="btn btn-outline-primary btn-sm">Buat Akun</button></a> 
                            @endguest
                        
                            <div class="navbar-nav ms-2" style="margin-right: 0.4cm">
                                <div class="dropdown" style="margin-right: 1cm">
                                    {{-- <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false"> --}}
                                    <a href="#" class="ms-3 d-none d-lg-block" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                    >
                                    <div class="nav-profile-img">
                                    @auth
                                        <div class="d-flex align-item-center">
                                            <div class="flex-shrink-0 pt-1">
                                                Hi, {{Auth::user()->name}}
                                            </div> 
                                            <div class="flex-grow-1 ms-2">
                                                @if (Auth::user()->profil == true)
                                                    <img src="{{ Storage::url(Auth::user()->profil) }}" class="img-fluid ms-2 rounded-circle" id="profile-image" style="max-width:40px; max-height:40px; border-radius: 50px; background-size: cover" alt="">
                                                    @else
                                                    <img src="../image/profile.svg" class="img-fluid ms-2 rounded-circle" id="profile-image" style="max-height: 40px; border-radius:40px; background-size:cover" alt="">
                                                @endif
                                            </div>
                                        </div>
                                    @endauth
                                    </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            @auth
                                                @if (Auth::user()->role == 'Penghuni')
                                                <a href="{{route('penghuni.dashboard')}}" class="dropdown-item">
                                                    <i class="fas fa-user me-2 text-success"></i>Akun saya</a>
                                                @elseif (Auth::user()->role == 'Pendaftar')
                                                <a href="{{route('akun-pendaftar.index')}}" class="dropdown-item"><i class="fas fa-user me-2 text-success"></i>Akun saya</a>
                                                @else
                                                <a href="{{route('admin.dashboard')}}" class="dropdown-item"><i class="fas fa-user me-2 text-success"></i>Akun saya</a>
                                                @endif
                                            @endauth
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="#">
                                                <form action="{{route('logout')}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-primary btn-md">Keluar<i class="fa-solid fa-right-from-bracket" style="margin-left: 18px; margin-right:8px"></i></button>
                                                </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->