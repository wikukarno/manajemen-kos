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
                <h3 class="card-title mb-5 text-center">Akun <b class="text-primary"></b></h3>
                <form class="form-sample" action="{{ route('akun-pendaftar.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="row">
                    <div class="col-12 col-lg-12 text-center">
                        <div class="profile mb-5">
                            @if($item->profil != null)
                                <img src="{{ Storage::url($item->profil) }}" alt="image" name="profil" width="150" class="rounded"/>
                            @else
                                <b>Tidak ada foto profil</b>
                            @endif
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="name" id="nama" value="{{ auth()->user()->name }}">
                        </div>  
                    </div>
                  </div>
                  <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-lg-12">
                          <div class="form-group mb-3">
                              <label for="hp">Nomor WA (Aktif)</label>
                              <input type="number" class="form-control" name="hp" id="hp" value="{{ auth()->user()->hp }}">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="form-group mb-3">
                            <label for="profil">Foto Profile</label>
                            <input type="file" class="form-control" name="profil" id="profil">
                        </div>
                    </div>
                  </div>
                  <div class="d-grid gap-2 d-flex">
                    <a href="{{ route('akun-pendaftar.index') }}" class="btn btn-secondary col">Batal</a>
                    <button type="submit" class="btn btn-primary col" id="btnSave">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

@endsection