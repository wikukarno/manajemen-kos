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
                <h3 class="card-title mb-5">Akun <b class="text-primary"></b></h3>
                <form class="form-sample" action="" method="POST">
                  @csrf
                  @method('put')
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                      <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" id="name" class="form-control" value="{{ auth()->user()->name}}" name="name" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" value="{{ auth()->user()->email}}" name="email" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="hp" class="form-label">Nomor HP</label>
                            <input type="number" class="form-control" id="hp" aria-describedby="hp" value="{{ auth()->user()->hp}}" name="hp" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" name="tempat_lahir">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir" name="tanggal_lahir">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" aria-describedby="alamat" name="alamat">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="wali" class="form-label">Nama Wali</label>
                            <input type="text" class="form-control" id="wali" aria-describedby="wali" name="wali">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="hp2" class="form-label">Nomor Hp Wali</label>
                            <input type="number" class="form-control" id="hp2" aria-describedby="hp2" name="hp2">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="id_telegram" class="form-label">ID Telegram</label>
                            <input type="text" class="form-control" id="id_telegram" aria-describedby="id_telegram" name="id_telegram">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="dokumen" class="form-label">KTP</label>
                            <input type="file" class="form-control" id="dokumen" aria-describedby="dokumen" name="dokumen">
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Kirim Data</button>
                </form>
              </div>
            </div>
          </div>

@endsection