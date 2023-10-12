@extends('layouts.home')
@section('title')
    Halaman Beranda Kos
@endsection

@section('content')
{{-- <div class="container bg-white p-0"> --}}
        <!-- Carousel Start -->
        <div class="container-fluid bg-white p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="../image/img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Akira Kos</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Kos Nyaman dan Murah</h1>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="../image/img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Akira Kos</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown">Kos Nyaman dan Murah</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


        


        <!-- About Start -->
        <div class="container-xxl py-5 bg-white">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">Kos</span></h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                       
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="../image/img/about-1.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="../image/img/about-2.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="../image/img/about-3.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="../image/img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->



        

       <!-- Types Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Tipe Kamar</h6>
                    <h1 class="mb-5">Pilihanan<span class="text-primary text-uppercase"> Tipe Kamar</span></h1>
                </div>

               
                <div class="row mb-5 justify-content-center">
                     @foreach ($types as $tipe)
                    <div class="col-md-4" style="margin-bottom: 40px">
                        <div class="room-item shadow rounded overflow-hidden">
                            
                            <div class="position-relative">
                                <img class="img-fluid" src="../image/img/room-1.jpg" alt="">
                                {{-- <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp. {} </small> --}}
                                <p class="position-absolute end-0  top-100 translate-middle-y bg-primary text-white rounded py-4 px-3 fs-5">{{ $tipe->name }}</p>
                            </div>
                           
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">{{ $tipe->tipe }}</h5>
                                   
                                </div>
                                <div class="d-flex mb-3">
                                    @if ($tipe->tipe=='Tipe 1')
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 bed</small>
                                    @elseif ($tipe->tipe=='Tipe 2')
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>2 bed</small>
                                    @endif

                                    <small ><i class="fa fa-bath text-primary me-2"></i>Kamar mandi di dalam kamar</small>
                                    
                                </div>
                               
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{route('detailTipe', $tipe->slug)}}">Lihat Kamar</a>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Types End -->


      

        <!-- Service Start -->
        <div class="container-xxl py-5 mb-6">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Fasilitas</h6>
                    <h1 class="mb-5">Lihat Fasilitas <span class="text-primary text-uppercase">kamar</span></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa fa-hotel fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Daket dengan kampus UIR</h5>
                            <p class="text-body mb-0">250 Meter dari Universitas Islam Riau</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa-regular fa-2x fa-hospital"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Dekat Rumah Sakit Mesra</h5>
                            <p class="text-body mb-0">260 Meter dari Rumah Sakit Mesra</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-2x fa-wifi"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Free Wi-Fi</h5>
                            
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-2x fa-kitchen-set"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Dapur Bersama</h5>
                            <p class="text-body mb-0">Dilengkapi dengan fasilitas kompor gas dan kulkas</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-2x fa-bolt-lightning"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Free Listrik dan Air</h5>
                            
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-2x fa-video"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Kamanan CCTV</h5>
                            <p class="text-body mb-0">Keamanan kos dengan kamera cctv 24 jam.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-2x fa-bed"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Kamar full furnished</h5>
                            <p class="text-body mb-0">Di lengkapi dengan kasur, ranjang, meja, kursi, lemari.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-2x fa-shower"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Kamar mandi di dalam kamar</h5>
                            <p class="text-body mb-0">Kamar mandi di dalam kamar yang memiliki kloset duduk dan shower</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <a class="service-item rounded" href="">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-2x fa-fingerprint"></i>
                                </div>
                            </div>
                            <h5 class="mb-3">Keamanan Fingerprint</h5>
                            <p class="text-body mb-0">Pintu dengan keamanan fingerprint.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

        <!-- WhatsApp -->
        <div class="row">
            <div class="col">
            <a class="btn btn-lg btn-primary btn-lg-square back-to-top btn-social rounded-circle border-success" style="background-color:rgb(12, 203, 12)"  href="https://api.whatsapp.com/send?phone=6281365505655&text=Assalamualikum+ada+kamar+kosong%3F" id="social"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
        

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection