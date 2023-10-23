@extends('layouts.home')
@section('tile')
    Form Isi Data
@endsection
@section('content')
    {{-- form pengisian data untuk pemesanan --}}
    <div class="col-12">
            <div class="card">
              <div class="card-body">
                @if(Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
                @endif
                <h3 class="card-title mb-5">Pembayaran Awal <b class="text-primary"></b></h3>
                <form class="form-sample" action="{{route('')}}" method="POST">
                  @csrf
                  @method('put')
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                      <div class="mb-3">
                            <label for="id" class="form-label">Nama Penghuni</label>
                            <input type="text" id="id" class="form-control" value="{{ auth()->user()->name}}" name="id" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="nomor_kamar" class="form-label">Nomor Kamar</label>
                            <input type="number" id="nomor_kamar" class="form-control" value="" name="nomor_kamar" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                            <input type="number" class="form-control" id="tipe_kamar" aria-describedby="tipe_kamar" value="" name="tipe_kamar" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="harga_kamar" class="form-label">Harga Kamar</label>
                            <input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" name="tempat_lahir" disabled>
                        </div>
                      </div>
                    </div>
                  </div>       
                </div>
                </form>
              </div>
            </div>
          </div>

@endsection