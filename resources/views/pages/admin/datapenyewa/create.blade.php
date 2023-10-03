@extends('layouts.app')

@section('title', 'Tambah Data Penyewa')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mt-2">Tambah Data Penyewa
                <a href="{{ url('pemilik/data-penyewa') }}" class="float-end btn btn-outline-success btn-sm" >View All</a>
            </h6>
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-body">
                @if(Session::has('success'))
                  <p class="text-success">{{ session('success') }}</p>
                @endif
                <h4 class="card-title">Data User Penyewa</h4>
                <form class="form-sample" action="{{ url('pemilik/data-penyewa') }}" method="POST">
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
                        <label class="col-sm-3 col-form-label"><b>Alamat</b></label>
                        <div class="col-sm-9">
                          <textarea name="alamat" id="alamat" type="text" class="form-control" placeholder="Jl. xxxxx No.xx RT/RW xx/xx" autocomplete="off"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Nomor Handphone</b></label>
                        <div class="col-sm-9">
                          <input name="hp" id="hp" type="text" class="form-control" placeholder="0821xxxxxx73" autocomplete="off"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Nama Wali</b></label>
                        <div class="col-sm-9">
                          <input name="wali" id="wali" type="text" class="form-control" placeholder="Masukkan Nama Wali" autocomplete="off"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Nomor Handphone Wali</b></label>
                        <div class="col-sm-9">
                          <input name="hp2" id="hp2" type="text" class="form-control" placeholder="0821xxxxxx73" autocomplete="off"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Username</b></label>
                        <div class="col-sm-9">
                          <input name="uname" id="uname" type="text" class="form-control" placeholder="contoh123" autocomplete="off"/>
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
                        <label class="col-sm-3 col-form-label"><b>Id Telegram</b></label>
                        <div class="col-sm-9">
                          <input name="id_telegram" id="id_telegram" type="text" class="form-control" placeholder="Masukkan Id Telegram" autocomplete="off"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Mac Address</b></label>
                        <div class="col-sm-9">
                          <input name="mac_addr" id="mac_addr" type="text" class="form-control" placeholder="00-B0-xx-xx-xx-26" autocomplete="off"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>KTP</b></label>
                        <div class="col-sm-9">
                            <div class="mt-2 justify-content-center">
                                @if ($item->dokumen != null)
                                <img src="{{ Storage::url($item->dokumen) }}"class="img-fluid">
                                @else
                                <img src="" class="img-fluid">
                                <input type="hidden">
                                @endif
                                <div class="mt-3">
                                  <input class="form-control @error('dokumen') is-invalid @enderror" type="file" id="dokumen" name="dokumen" onchange="previewImage()">
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