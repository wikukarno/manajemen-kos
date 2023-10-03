@extends('layouts.app')

@section('title', 'Tambah Data User')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mt-2">Tambah Data User
                <a href="{{ url('pemilik/data-user') }}" class="float-end btn btn-outline-success btn-sm" >View All</a>
            </h6>
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-body">
                @if(Session::has('success'))
                  <p class="text-success">{{ session('success') }}</p>
                @endif
                <h4 class="card-title">Data User Pendaftar</h4>
                <form class="form-sample" action="{{ url('pemilik/data-user') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Nama Lengkap*</b></label>
                        <div class="col-sm-9">
                          <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama" autocomplete="off" required value="{{ old('name') }}"/>
                          @error('name')
                          {{-- untuk info yang salah yang mana --}}
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>            
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Email Address*</b></label>
                        <div class="col-sm-9">
                          <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" autocomplete="off" required value="{{ old('email') }}"/>
                          @error('email')
                          {{-- untuk info yang salah yang mana --}}
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>            
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" ><b>Role*</b></label>
                        <div class="col-sm-9">
                          <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" style="height: 45px" required value="{{ old('role') }}">
                            <option value="">Pilih</option>
                            <option value="Pemilik">Pemilik</option>
                            <option value="Pendaftar">Pendaftar</option>
                            <option value="Penghuni">Penghuni</option>
                          </select>
                          @error('role')
                          {{-- untuk info yang salah yang mana --}}
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>            
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Status Akun*</b></label>
                        <div class="col-sm-9">
                          <select class="form-control @error('status_akun') is-invalid @enderror" name="status_akun" id="status_akun" style="height: 45px" required value="{{ old('status_akun') }}">
                            <option value="">Pilih</option>
                            <option value="Terverifikasi">Terverifikasi</option>
                            <option value="Belum Verifikasi">Tidak Terverifikasi</option>
                            <option value="Diblokir">Ditolak</option>
                          </select>
                          @error('status_akun')
                          {{-- untuk info yang salah yang mana --}}
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>            
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Nomor Handphone</b></label>
                        <div class="col-sm-9">
                          <input name="hp" id="hp" type="text" class="form-control" placeholder="0821xxxxxx73" autocomplete="off" required value="{{ old('hp') }}"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Password*</b></label>
                        <div class="col-sm-9">
                          <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Min. 8" required value="{{ old('password') }}" autocomplete="off"/>
                          @error('password')
                          {{-- untuk info yang salah yang mana --}}
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>            
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Alasan Penolakan</b></label>
                        <div class="col-sm-9">
                          {{--  <input type="text-area" class="form-control" placeholder="Masukkan Alasan Penolakan"/>  --}}
                          <td><textarea name="alasan_penolakan" id="alasan_penolakan" class="form-control" placeholder="Masukkan Alasan Penolakan" autocomplete="off" required value="{{ old('alasan_penolakan') }}"></textarea></td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <td colspan="2">
                    <p style="font-size: 10px"><b>Catatan : </b> Yang bertanda (*) harus diisi
                      <input type="submit" class="float-end btn btn-gradient-primary btn-sm">
                    </p>
                  </td>
                </form>
              </div>
            </div>
          </div>

    </div>
</div>
<!-- /.container-fluid -->

@endsection