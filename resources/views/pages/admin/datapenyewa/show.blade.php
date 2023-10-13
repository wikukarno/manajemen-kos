@extends('layouts.app')

@section('title', 'Data Penyewa')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
      <div class="card-header">
        <h3 class="m-0 font-weight-bold mt-3">Data Penyewa
            <a href="{{ url('pemilik/data-penyewa') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
        </h3>
      </div>

        <div class="col-12">
            <div class="card"> 
              <div class="card-body">
                @if(Session::has('success'))
                  <p class="text-success">{{ session('success') }}</p>
                @endif
                <h4 class="card-title mb-5"><u>Data Penyewa <b class="text-primary">{{ $item->name }}</u></b></h4>
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
                                    <img src="{{ asset('storage/'. $item->dokumen) }}" class="img-fluid">
                                  @else
                                    <p>Gambar tidak tersedia</p>
                                  @endif

                              </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="fasilitas"><b>Fasilitas</b></label>

                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-check">
                                  <b><label class="form-check-label">
                                      <input type="checkbox" class="form-check-input select-all-checkbox" id="select-all" disabled> Pilih Semua
                                  </label></b>
                              </div>
                          </div>
                          
                          @foreach (['Listrik', 'Air', 'Wifi', 'Tempat Tidur', 'Kasur', 'Lemari', 'Meja Belajar', 'Kursi Belajar', 'Kipas Angin', 'Kloset Kamar Mandi', 'Keran', 'Shower'] as $fasilitas)
                              <div class="col-md-6">
                                  <div class="form-check">
                                      <label class="form-check-label">
                                          <input type="checkbox" class="form-check-input" name="fasilitas[]" value="{{ $fasilitas }}" @if (in_array($fasilitas, explode(',', $item->fasilitas))) checked @else disabled @endif> {{ $fasilitas }}
                                      </label>
                                  </div>
                              </div>
                          @endforeach
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