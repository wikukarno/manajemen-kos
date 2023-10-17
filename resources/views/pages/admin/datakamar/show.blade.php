@extends('layouts.app')

@section('title', 'Lihat Data Kamar')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
      <div class="card-header">
        <h3 class="m-0 font-weight-bold mt-3">Lihat Data Kamar
            <a href="{{ url('pemilik/data-kamar') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
        </h3>
    </div>

    <div class="col-12">
        <div class="card">
          <div class="card-body">
            @if(Session::has('success'))
              <p class="text-success">{{ session('success') }}</p>
            @endif
            <h4 class="card-title mb-5">Data Kamar <u class="text-primary">{{ $item->nomor_kamar }}</u></h4>
            <form class="form-sample" action="{{ url('pemilik/data-kamar') }}" method="POST">
              @csrf
              <div class="card">

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label"><b>Nomor Kamar</b></label>
                        <input name="nomor_kamar" id="nomor_kamar" type="text" class="form-control" placeholder="Masukkan Nomor Kamar" autocomplete="off" value="{{ $item->nomor_kamar }}" disabled/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label"><b>Id Tipe</b></label>
                        <input name="id_tipe" id="id_tipe" type="text" class="form-control" placeholder="Masukkan Nomor Kamar" autocomplete="off" value="{{ $item->id_tipe }}" disabled/>
                      </div>
                    </div>
                </div>

                <div class="form-group">
                  <label for="deskripsi"><b>Deskripsi</b></label>
                  <input name="deskripsi" id="deskripsi" type="text" class="form-control" placeholder="Masukkan deskripsi Kamar" autocomplete="off" required value="{{ $item->deskripsi }}" disabled/>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label"><b>Status</b></label>
                        <input name="status" id="status" type="text" class="form-control" placeholder="Masukkan Nomor Kamar" autocomplete="off" value="{{ $item->status }}" disabled/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label"><b>Slug</b></label>
                        <input name="slug" id="slug" type="text" class="form-control" placeholder="Masukkan Nomor Kamar" autocomplete="off" value="{{ $item->slug }}" disabled/>
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label"><b>Harga</b></label>
                        <input name="harga" id="harga" type="text" class="form-control" placeholder="Masukkan Nomor Kamar" autocomplete="off" value="{{ $item->harga }}" disabled/>
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