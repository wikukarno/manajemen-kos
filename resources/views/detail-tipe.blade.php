@extends('layouts.home')
@section('title')
    Menampilkan detail dati tipe kamar yang ada
@endsection
@section('content')



        <!-- Room Start -->
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Tipe Kamar {{$tipeKamar->name }}</h6>
                    <h1 class="mb-5">Pilihanan<span class="text-primary text-uppercase"> Kamar</span></h1>
                </div>

               
                <div class="row mb-5 justify-content-center">
                     @foreach ($kamar as $kamar)
                    <div class="col-md-4">
                        <div class="room-item shadow rounded overflow-hidden">
                            
                            <div class="position-relative">
                                <img class="img-fluid" src="/image/img/room-1.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">Rp {{ $kamar->harga }}</small>
                                <p class="position-absolute end-0  top-100 translate-middle-y bg-primary text-white rounded py-4 px-3 fs-5">{{ $kamar->nomor_kamar }}</p>
                            </div>
                           
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">{{ $kamar->tipe }}</h5>
                                   
                                </div>
                                <div class="d-flex mb-3">
                                    @if ($kamar->tipe=='Tipe 1')
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>1 bed</small>
                                    @elseif ($kamar->tipe=='Tipe 2')
                                    <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i>2 bed</small>
                                    @endif

                                    <small ><i class="fa fa-bath text-primary me-2"></i>Kamar mandi di dalam kamar</small>
                                    
                                </div>
                               
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{route('detail', $kamar->slug)}}">Lihat Ditel Kamar</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
            </div>
            
        <!-- Room End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    
@endsection


    
        
