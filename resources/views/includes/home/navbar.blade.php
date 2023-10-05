<!-- Navbar Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">Kos</h1>
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
                                <a href="/" class="nav-item nav-link active">Home</a>
                                <a href="/availability" class="nav-item nav-link ">Kamar</a>
                            </div>
                            @guest
                            <a href="/login" class="nav-item nav-link"><button type="button" class="btn btn-sm text-light" style="background-color: orange">Masuk</button></a>
                            <a href="/register" class="nav-item nav-link" style="margin-left: -0.4cm"><button type="button" class="btn btn-outline-primary btn-sm">Buat Akun</button></a> 
                            @endguest
                            <div class="navbar-nav ms-2">
                                <div class="dropdown" style="margin-right: 1cm">
                                <a href="#" class="ms-3 d-none d-lg-block" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
                                >
                                @auth
                                    <div class="d-flex align-item-center">
                                        <div class="flex-shrink-0 pt-2">
                                            Hi, {{Auth::user()->name}}
                                        </div> 
                                        <div class="flex-grow-1 ms-2">
                                            @if (Auth::user()->profil == true)
                                                <img src="{{ Storage::url(Auth::user()->profil) }}" class="img-fluid ms-2 rounded-circle w-100 h-100" style="max-height: 40px; max-width:40px; border-radius:50px; background-size:cover" alt=""/>
                                                @else
                                                <img src="{{url('/images/user-regular.svg')}}" class="img-fluid ms-2 rounded-circle w-100 h-100" style="max-height: 40px; border-radius:50px; background-size:cover" alt="">
                                            @endif
                                        </div>
                                    </div>
                                @endauth
                                </a>
                                
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        @auth
                                            @if (Auth::user()->role == 'Pemilik')
                                            <a href="{{route('admin.dashboard')}}" class="dropdown-item">Akun saya</a>
                                            @elseif (Auth::user()->role == 'Penghuni')
                                            <a href="{{route('penghuni.dashboard')}}" class="dropdown-item">Akun saya</a>
                                            @else
                                            <a href="{{route('user.dashboard')}}" class="dropdown-item">Akun saya</a>
                                            @endif
                                        @endauth
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="dropdowan-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        >Keluar</a>
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