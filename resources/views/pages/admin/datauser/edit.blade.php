@extends('layouts.app')

@section('title', 'Edit Data User')

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
                  @method('put')
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                          <input value="{{ $item->name }}" name="name" id="name" type="text" class="form-control"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email address</label>
                        <div class="col-sm-9">
                          <input name="email" id="email" type="email" class="form-control" value="{{ $item->email }}"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" >Role</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="role" id="role" style="height: 45px">
                            <option value="{{ $item->role }}" selected>{{ $item->role }}</option>
                            <option value="Pemilik">Pemilik</option>
                            <option value="Pendaftar">Pendaftar</option>
                            <option value="Penghuni">Penghuni</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Akun</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="status_akun" id="status_akun" style="height: 45px">
                            <option value="{{ $item->status_akun }}" selected>{{ $item->status_akun }}</option>
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
                          <input name="hp" id="hp" type="text" class="form-control" value="{{ $item->hp }}"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alasan Penolakan</label>
                        <div class="col-sm-9">
                          <td><textarea name="alasan_penolakan" id="alasan_penolakan" class="form-control" >{{ $item->alasan_penolakan }}</textarea></td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    
                  </div>
                  <td colspan="2">
                    <input type="submit" class="float-end btn btn-gradient-primary btn-sm">
                  </td>
                </form>
              </div>
            </div>
          </div>

    </div>
</div>
<!-- /.container-fluid -->

@endsection