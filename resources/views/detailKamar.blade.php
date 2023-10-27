@extends('layouts.home')
@section('title')
    Detail Kamar Kos
@endsection
@section('content')
        <!-- Room Start -->
        <div class="container-xxl py-5">
 
                 <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Kamar Tersedia</h6>
                    <h1 class="mb-5">Pilihanan<span class="text-primary text-uppercase"> Kamar</span></h1>
                </div>
                <div class="row mb-5 justify-content-start">
                    <div class="col-md-6">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="p-4 mt-2">
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner" >
                                        <div class="carousel-item active">
                                            <img src="/image/img/room-1.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="/image/img/room-2.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="/image/img/room-3.jpg" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="col-md-6 mt-3">
                        <h3 class="text-secondary mt-2">Nomor Kamar : {{$kamar->nomor_kamar}} </h3>
                        <p class="fs-4">Tipe : {{ $kamar->id_tipe }}</p>
                        <p class="fs-2 text-danger">Rp. {{ $kamar->harga }}</p>
                            @auth
                            <form action="{{route('isi-data.store')}}" method="POST">
                                @csrf
                                <input type="text" value="{{$kamar->id}}" name="id_kamar" hidden>
                                <button type="submit" class="btn text-light rounded-5 mt-5"  style="background-color: orange; width:300px" >Pesan</button>
                                
                            </form>
                            @if (session('error'))
                            <div class="alert alert-danger mt-3" style="width:380px">
                                {{ session('error') }}
                            </div>
                                
                            @endif
                            @endauth
                            @guest
                            {{-- <button ></button> --}}
                                <a type="button" class="btn text-light rounded-5 mt-5"  style="background-color: orange; width:300px"  href="/login">Pesan</a>
                            @endguest
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                                
                            @endif
                            
                    </div>

                    <div class="row mb-3 mt-5 justify-content-center">
                        <h3 style="color: orange">Deskripsi Kamar</h3>
                    <p>{{$kamar->deskripsi}}</p>
                    </div>
                    <div class="row mb-5 justify-content-center">
                        <h3 style="color: orange">Peraturan Kos</h3>
                        <div>
                        <ul>
                            <li>Jam malam diberlakukan setiap hari pukul 22:00 - 07:00 WIB. Apabila ada keperluan mendesak, dapat menghubungi PIHAK KOS.</li>
                            <li>Tamu lawan jenis dilarang masuk kedalam kos. Apabila kuliarga terdekat (Ayah, Abang laki-laki, atau Adik laki-laki) ingin mengunjungi, silahkan meminta izin di grup WhatsApp Kos.</li>
                            <li>Tidak diperbolehkan membawa dispenser ke dalam kamar untuk meminimalisir potensi kebaran.</li>
                            <li>Tidak diperkenankan untuk memindah sewakan kos atau memberikan perubahan dan tambahan fasilitas pada bangunan yang disewakan, kecuali atas izin PIHAK KOS</li>
                            <li>Untuk pemutusan masa kontrak, harusn memberitahu PIHAK KOS selambat-lambatnya sebulan sebelum pemutusan masa kontrak dilakukan.</li>
                        </ul>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Room End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    
    </div>
@endsection
