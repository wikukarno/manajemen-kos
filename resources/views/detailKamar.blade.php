@extends('layouts.home')
@section('title')
    Detail Kamar Kos
@endsection
@section('content')
        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
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
                                        <img src="../image/coba gambar.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="../image/coba gambar.jpg" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                        <img src="../image/coba gambar.jpg" class="d-block w-100" alt="...">
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

                       

                        {{-- <button href="" type="button" class="btn text-light rounded-5 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: orange; width:5cm"><a href="{{route('login')}}"></a>Pesan</button> --}}


                        @if (Auth::user()->role == 'Pendaftar')
                            <button href="" type="button" class="btn text-light rounded-5 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: orange; width:5cm">Pesan</button> 
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabelTogel1">Form Pendaftaran</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-labelledby="#exampleModalLabel"></button>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                                                    <div class="modal-body">
                                                        <form>
                                                        <div class="mb-3">
                                                            <label for="username" class="col-form-label">Username: </label>
                                                            <input type="text" class="form-control" name="username" id="username" value="{{auth()->user()->name}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="col-form-label">Email:</label>
                                                            <input type="email" class="form-control" id="email" name="email" value="{{auth()->user()->email}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="hp" class="col-form-label">Nomor HP:</label>
                                                            <input type="number" class="form-control" id="hp" name="hp" value="{{auth()->user()->hp}}">
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="namawali" class="col-form-label">Tempat lahir:</label>
                                                            <input type="text" class="form-control" id="namawali" name="namawali" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="namawali" class="col-form-label">Tangggal Lahir:</label>
                                                            <input type="date" class="form-control" id="namawali" name="namawali" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">  
                                                    <div class="modal-body">  
                                                        <div class="mb-3">
                                                            <label for="alamat" class="col-form-label">Alamat lengkap:</label>
                                                            <input type="text" class="form-control" id="alamat" name="alamat" >
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label for="namawali" class="col-form-label">Nama wali:</label>
                                                            <input type="text" class="form-control" id="namawali" name="namawali" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nohpwali" class="col-form-label">Nomor hp wali:</label>
                                                            <input type="number" class="form-control" id="nohpwali" name="nohpwali" >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="idtelegram" class="col-form-label">ID telegram:</label>
                                                            <input type="text" class="form-control" id="idtelegram" name="idtelegram" >
                                                        </div>
                                                        <div class="form-group mb-3" style="margin-top:0.8cm">
                                                            <label for="ktp">KTP</label>
                                                            <input type="file" class="form-control" name="ktp" id="ktp" style="background-color: white">
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" data-bs-target="#exampleModalLabel2" data-bs-toggle="modal">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModalLabel2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabelTogel1">Form Pembayaran</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-labelledby="#exampleModalLabel"></button>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group mb-3 mt-3">
                                                                <label for="nokamar">Nomor kamar</label>
                                                                <input type="number" class="form-control" name="nokamar" id="nokamar" style="background-color: white" value="{{$kamar->nomor_kamar}}" disabled>
                                                            </div>
                                                            <div class="form-group mb-3 mt-3">
                                                                <label for="tipe">Tipe Kamar</label>
                                                                <input type="text" class="form-control" name="tipe" id="tipe" style="background-color: white" value="Tipe {{$kamar->id_tipe}}" disabled>
                                                            </div>
                                                            <label for="username" class="col-form-label">Fasilitas:</label>
                                                            <div class="form-check">
                                                                
                                                                <input class="form-check-input" type="checkbox" value="" id="select-all">
                                                                <label class="form-check-label" for="MasterCheckbox">All</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""  checked>
                                                                <label class="form-check-label" for="kasur">Kasur</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="checkbox-item">
                                                                <label class="form-check-label" for="meja">Meja</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="checkbox-item">
                                                                <label class="form-check-label" for="kursi">kursi</label>
                                                            </div>
                                                            <script>
                                                                // Ambil referensi ke elemen "Select All" dan semua checkbox
                                                                const selectAllCheckbox = document.getElementById('select-all');
                                                                const checkboxes = document.querySelectorAll('.form-check-input');

                                                                // Tambahkan event listener untuk checkbox "Select All"
                                                                selectAllCheckbox.addEventListener('change', function() {
                                                                    // Atur status centang semua checkbox sesuai dengan status checkbox "Select All"
                                                                    checkboxes.forEach(checkbox => {
                                                                        checkbox.checked = selectAllCheckbox.checked;
                                                                    });
                                                                });

                                                                // Tambahkan event listener untuk semua checkbox lainnya
                                                                checkboxes.forEach(checkbox => {
                                                                    checkbox.addEventListener('change', function() {
                                                                        // Periksa apakah semua checkbox lainnya dicentang
                                                                        const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
                                                                        // Jika semua dicentang, centang juga checkbox "Select All", jika tidak, hilangkan centangnya
                                                                        selectAllCheckbox.checked = allChecked;
                                                                    });
                                                                });
                                                            </script>

                                                           
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">  
                                                    <div class="modal-body">
                                                            <div class="form-group mb-3 mt-3">
                                                                <label for="tipe">Harga Kamar</label>
                                                                <input type="text" class="form-control" name="tipe" id="tipe" style="background-color: white" value="Rp {{$kamar->harga}} /bulan" disabled>
                                                            </div>
                                                             <div class="form-group mb-3 mt-3">
                                                                <label for="ktp" for="form-label">Bukti Pembayaran</label>
                                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                                                <input class="form-control @error('ktp') is-invalid
                                                                @enderror"type="file" name="ktp" id="ktp" style="background-color: white" onchange="previewImage()">
                                                                @error('ktp')
                                                                    <div class="invalid-feedback">
                                                                        {{$message}}
                                                                    </div>
                                                                @enderror

                                                            </div>
                                                            
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-target="#exampleModal" data-bs-toggle="modal">Back</button>
                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="closeButton">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        @else
                        @guest
                        <a href="{{route('login')}}"><button class="btn text-light rounded-5 mt-5" style="background-color: orange; width:5cm">Pesan</button></a>
                        @endguest
                        @endif
                </div>

                <div class="row mb-3 mt-5 justify-content-center">
                    <h3 style="color: orange">Deskripsi Kamar</h3>
                    <p>{{ $kamar->deskripsi }}</p>
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
