@extends('layouts.home')
@section('tile')
    Form Isi Data
@endsection
@section('content')
    {{-- form pengisian data untuk pemesanan --}}
    <div class="col-12">
            <div class="card">
              <div class="card-body">
                @if(Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
                @endif
                <h3 class="card-title mb-5">Pembayaran Awal <b class="text-primary"></b></h3>
                <form class="form-sample" action="{{ route('pembayaran-awal.update', $user->id) }}" method="POST">
                  @csrf
                  @method('put')
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                      <div class="mb-3">
                            <label for="id" class="form-label">ID Penghuni</label>
                            <input type="text" id="id" class="form-control" value="{{ auth()->user()->id}}" name="id" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
                            <input type="number" id="nomor_kamar" class="form-control" value="" name="nomor_kamar" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                            <input type="number" class="form-control" id="tipe_kamar" aria-describedby="tipe_kamar" value="" name="tipe_kamar" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="harga_kamar" class="form-label">Harga Kamar</label>
                            <input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" name="tempat_lahir">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Fasilitas</label>
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
                    </div>         
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary ">Batal</button>
                            <button type="submit" class="btn btn-primary ">kirim data</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            {{-- <button type="submit" class="btn btn-primary">Kirim Data</button> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

@endsection