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
                        <label class="col-sm-3 col-form-label">Nama Lengkap*</label>
                        <div class="col-sm-9">
                          <input name="name" id="name" type="text" class="form-control" placeholder="Masukkan Nama"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email address*</label>
                        <div class="col-sm-9">
                          <input name="email" id="email" type="email" class="form-control" placeholder="Masukkan Email"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" >Role*</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="role" id="role" style="height: 45px">
                            <option value="">Pilih</option>
                            <option value="Pemilik">Pemilik</option>
                            <option value="Pendaftar">Pendaftar</option>
                            <option value="Penghuni">Penghuni</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Akun*</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="status_akun" id="status_akun" style="height: 45px">
                            <option value="">Pilih</option>
                            <option value="Terverifikasi">Terverifikasi</option>
                            <option value="Belum Verifikasi">Tidak Terverifikasi</option>
                            <option value="Diblokir">Ditolak</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Handphone</label>
                        <div class="col-sm-9">
                          <input name="hp" id="hp" type="text" class="form-control" placeholder="0821xxxxxx73"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password*</label>
                        <div class="col-sm-9">
                          <input name="password" id="password" type="password" class="form-control" placeholder="Masukkan Password"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alasan Penolakan</label>
                        <div class="col-sm-9">
                          {{--  <input type="text-area" class="form-control" placeholder="Masukkan Alasan Penolakan"/>  --}}
                          <td><textarea name="alasan_penolakan" id="alasan_penolakan" class="form-control" placeholder="Masukkan Alasan Penolakan"></textarea></td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <td colspan="2">
                    <p style="font-size: 10px">Catatan : Yang bertanda (*) harus diisi
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