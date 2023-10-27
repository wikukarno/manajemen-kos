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
                <form class="form-sample" action="{{ route('pembayaran-pertama.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
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
                            <input type="number" id="nomor_kamar" class="form-control"  name="nomor_kamar" value="{{ $tipe->kamar->nomor_kamar }}" disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                            <input type="text" class="form-control" id="tipe_kamar" aria-describedby="tipe_kamar" name="tipe_kamar" value="{{ $tipe->kamar->type->name }}" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="harga_kamar" class="form-label">Harga Kamar</label>
                            <input type="text" class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir" name="tempat_lahir" value="{{ $tipe->kamar->harga }}" disabled>
                        </div>
                      </div>
                    </div>
                  </div>       
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="bulan" class="form-label">Bulan</label>
                            {{--  <input type="date" class="form-control" id="bulan" aria-describedby="bulan" name="bulan">  --}}
							<select class="form-select" aria-label="Default select example" name="selectedBulan" required>
								<option selected>Pembayaran Untuk Bulan</option>
								@foreach ($bulanNames as $index => $bulan )
									<option name="bulan" value="{{ $index + 1 }}">{{ $bulan }}</option>
								@endforeach
							</select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" id="tahun" aria-describedby="tahun" name="tahun" value="{{ $tahun }}">
                        </div>
                      </div>
                    </div>
                  </div>       
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <div class="mb-3">
                            <label for="bukti_bayar" class="form-label">Bukti bayar</label>
                            <input type="file" class="form-control" id="bukti_bayar" aria-describedby="bukti_bayar" name="bukti_bayar">
                        </div>
                      </div>
                    </div>
                  </div>  
                  <button type="submit" class="btn btn-primary">Kirim Data</button>     
                </div>
                </form>
              </div>
            </div>
          </div>

@endsection