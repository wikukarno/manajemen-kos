@extends('layouts.app')

@section('title', 'Lihat Data User')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mt-2">Data User ( {{ $item->name }} )
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
                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9 mt-3">
                          {{--  <input name="name" id="name" type="text" class="form-control" placeholder="Masukkan Nama"/>  --}}
                          <td> {{ $item->name }} </td>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email address</label>
                        <div class="col-sm-9 mt-3">
                          {{--  <input name="email" id="email" type="email" class="form-control" placeholder="Masukkan Email"/>  --}}
                          <td> {{ $item->email }} </td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9 mt-3">
                          {{--  <select class="form-control" name="role" id="role">
                            <option value="">Pilih</option>
                            <option value="Pemilik">Pemilik</option>
                            <option value="Pendaftar">Pendaftar</option>
                            <option value="Penghuni">Penghuni</option>
                          </select>  --}}
                          <td> {{ $item->role }} </td>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status Akun</label>
                        <div class="col-sm-9 mt-3">
                          {{--  <select class="form-control" name="status_akun" id="status_akun">
                            <option value="">Pilih</option>
                            <option value="Terverifikasi">Terverifikasi</option>
                            <option value="Belum Verifikasi">Tidak Terverifikasi</option>
                            <option value="Diblokir">Ditolak</option>
                          </select>  --}}
                          <td> {{ $item->status_akun }} </td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nomor Handphone</label>
                        <div class="col-sm-9 mt-3">
                          {{--  <input name="hp" id="hp" type="text" class="form-control" placeholder="0821xxxxxx73"/>  --}}
                          <td> {{ $item->hp }} </td>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alasan Penolakan</label>
                        <div class="col-sm-9 mt-3">
                          {{--  <input type="text-area" class="form-control" placeholder="Masukkan Alasan Penolakan"/>  --}}
                          {{--  <td><textarea name="alasan_penolakan" id="alasan_penolakan" class="form-control" placeholder="Masukkan Alasan Penolakan"></textarea></td>  --}}
                          <td> {{ $item->alasan_penolakan }} </td>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

    </div>
</div>
<!-- /.container-fluid -->



@endsection