@extends('layouts.app')

@section('title', 'Tambah Data Penghuni')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mt-2">Tambah Data Penghuni
                <a href="{{ url('pemilik/data-penghuni') }}" class="float-end btn btn-outline-success btn-sm" >View All</a>
            </h6>
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-body">
                @if(Session::has('success'))
                  <p class="text-success">{{ session('success') }}</p>
                @endif
                <h4 class="card-title">Data User Penghuni</h4>
                <form class="form-sample" action="{{ url('pemilik/data-penghuni') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                          <input name="name" id="name" type="text" class="form-control" placeholder="Masukkan Nama"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email address</label>
                        <div class="col-sm-9">
                          <input name="email" id="email" type="email" class="form-control" placeholder="Masukkan Email"/>
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
                        <label class="col-sm-3 col-form-label">Status Akun</label>
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
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                          <input name="alamat" id="alamat" type="text" class="form-control" placeholder="Jl. xxxxx No.xx RT/RW xx/xx"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-9">
                              <input name="hp" id="hp" type="text" class="form-control" placeholder="0821xxxxxx73"/>
                            </div>
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Wali</label>
                            <div class="col-sm-9">
                              <input name="wali" id="wali" type="text" class="form-control" placeholder="Masukkan Nama Wali"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Handphone Wali</label>
                            <div class="col-sm-9">
                              <input name="hp2" id="hp2" type="text" class="form-control" placeholder="0821xxxxxx73"/>
                            </div>
                          </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                          <input name="uname" id="uname" type="text" class="form-control" placeholder="contoh123"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Id Telegram</label>
                        <div class="col-sm-9">
                          <input name="id_telegram" id="id_telegram" type="text" class="form-control" placeholder="Masukkan Id Telegram"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mac Address</label>
                        <div class="col-sm-9">
                          <input name="mac_addr" id="mac_addr" type="text" class="form-control" placeholder="00-B0-xx-xx-xx-26"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">KTP</label>
                        <div class="col-sm-9">
                            <div class="mt-2 justify-content-center">
                                @if ($item->dokumen != null)
                                <img src="{{ Storage::url($item->dokumen) }}"class="img-fluid">
                                @else
                                <img src="https://source.unsplash.com/500x200?" class="img-fluid">
                                <input type="hidden">
                                @endif
                                <div class="mt-3">
                                  <input class="form-control 
                                  @error('dokumen') 
                                  is-invalid
                                  @enderror" type="file" id="dokumen" name="dokumen" onchange="previewImage()">
                                  @error('dokumen')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  {{--  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">KTP</label>
                    <div class="col-sm-9">
                        <div class="mt-2 justify-content-center">
                            @if ($item->dokumen != null)
                            <img src="{{ Storage::url($item->dokumen) }}"class="img-fluid">
                            @else
                            <img src="https://source.unsplash.com/500x200?" class="img-fluid">
                            <input type="hidden">
                            @endif
                        </div>
                    </div>
                  </div>  --}}

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