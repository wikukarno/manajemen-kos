@extends('layouts.app')

@section('title', 'Data Penyewa')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mt-2">Data Penyewa
                <a href="{{ url('pemilik/data-penyewa') }}" class="float-end btn btn-outline-success btn-sm" >View All</a>
            </h6>
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-body">
                @if(Session::has('success'))
                  <p class="text-success">{{ session('success') }}</p>
                @endif
                <h4 class="card-title">Data Penyewa</h4>
                <form class="form-sample" action="{{ url('pemilik/data-penyewa') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Nama Lengkap*</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->name }}</td>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Email Address*</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->email }}</td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Tempat Lahir</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->tempat_lahir }}</td>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Tanggal Lahir</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->tanggal_lahir }}</td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" ><b>Role*</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->role }}</td>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Status Akun*</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->status_akun }}</td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Alamat</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->alamat }}</td>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Nomor Handphone</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->hp }}</td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Nama Wali</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->wali }}</td>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Nomor Handphone Wali</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->hp2 }}</td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Username</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->uname }}</td>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Id Telegram</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->id_telegram }}</td>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><b>Mac Address</b></label>
                        <div class="col-sm-9 mt-3">
                          <td>{{ $item->mac_addr }}</td>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><b>KTP</b></label>
                          <div class="col-sm-9 mt-3">
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