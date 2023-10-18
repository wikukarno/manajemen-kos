@extends('layouts.app')

@section('title', 'Tambah Data Pembayaran')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
      <div class="card-header">
        <h3 class="m-0 font-weight-bold mt-3">Tambah Data Pembayaran
            <a href="{{ url('pemilik/data-pembayaran') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
        </h3>
    </div>

    <div class="col-12">
        <div class="card">
          <div class="card-body">
            @if(Session::has('success'))
              <p class="text-success">{{ session('success') }}</p>
            @endif
            <h4 class="card-title mb-5">Data Pembayaran</h4>
            <form class="form-sample" action="{{ url('pemilik/data-pembayaran') }}" method="POST">
              @csrf
              <div class="card">

                <div class="form-group">
                    <label for="deskripsi"><b>Deskripsi</b></label>
                    <input name="deskripsi" id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi Kamar" autocomplete="off" required value="{{ old('deskripsi') }}"/>
                        @error('deskripsi')
                        {{-- untuk info yang salah yang mana --}}
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>            
                        @enderror
                  </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label"><b>Nama Penghuni</b></label>
                        <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Penghuni" autocomplete="off" required value="{{ old('name') }}"/>
                          @error('name')
                            {{-- untuk info yang salah yang mana --}}
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>            
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label"><b>Id Tipe</b></label>
                        <select class="form-control @error('id_tipe') is-invalid @enderror" name="id_tipe" id="id_tipe" style="height: 45px" required value="{{ old('id_tipe') }}">
                            <option value="">Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                          </select>
                          @error('id_tipe')
                            {{-- untuk info yang salah yang mana --}}
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>            
                          @enderror
                      </div>
                    </div>
                </div>

                <div class="form-group">
                  <label for="deskripsi"><b>Deskripsi</b></label>
                  <input name="deskripsi" id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi Kamar" autocomplete="off" required value="{{ old('deskripsi') }}"/>
                      @error('deskripsi')
                      {{-- untuk info yang salah yang mana --}}
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>            
                      @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label"><b>Status</b></label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" style="height: 45px" required value="{{ old('status') }}">
                            <option value="">Pilih</option>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Tidak Tersedia">Tidak Tersedia</option>
                          </select>
                          @error('status')
                            {{-- untuk info yang salah yang mana --}}
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>            
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label"><b>Slug</b></label>
                        <input name="slug" id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Masukkan Slug" autocomplete="off" required value="{{ old('slug') }}"/>
                          @error('slug')
                            {{-- untuk info yang salah yang mana --}}
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>            
                          @enderror
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label"><b>Harga</b></label>
                        <input name="harga" id="harga" type="text" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga" autocomplete="off" required value="{{ old('harga') }}"/>
                          @error('harga')
                            {{-- untuk info yang salah yang mana --}}
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>            
                          @enderror
                      </div>
                    </div>
                </div>

                
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