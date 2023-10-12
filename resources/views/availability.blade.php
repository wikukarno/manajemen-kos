@extends('layouts.home')
@section('title')
    Menampilkan berbagai macam kamar yang tersedia
@endsection
@section('content')

    <div class="container-xxl bg-white p-0">
       {{-- <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End --> --}}

        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Rooms</h1>
               
                </div>
            </div>
        </div>
        <!-- Page Header End -->



        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Kamar Tersedia</h6>
                    <h1 class="mb-5">Pilihanan<span class="text-primary text-uppercase"> Kamar</span></h1>
                </div>

               
                <div class="row mb-5 justify-content-center">
                    @foreach ($availabilitys as $availability)
                    <div class="col-md-4">
                        <div class="room-item shadow rounded overflow-hidden">
                            
                            <div class="position-relative">
                                <img class="img-fluid" src="img/room-1.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp {{ $availability->harga }}</small>
                                <p class="position-absolute end-0  top-100 translate-middle-y bg-primary text-white rounded py-4 px-3 fs-5">{{ $availability->nomor_kamar }}</p>
                            </div>
                           
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">{{ $availability->tipe }}</h5>
                                   
                                </div>
                                <div class="d-flex mb-3">
                                    @if ($availability->tipe=='Tipe 1')
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 bed</small>
                                    @elseif ($availability->tipe=='Tipe 2')
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>2 bed</small>
                                    @endif

                                    <small ><i class="fa fa-bath text-primary me-2"></i>Kamar mandi di dalam kamar</small>
                                    
                                </div>
                               
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{route('detail', $availability->slug)}}">Lihat Ditel</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Room End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    
@endsection