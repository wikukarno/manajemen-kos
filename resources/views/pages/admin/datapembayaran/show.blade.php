@extends('layouts.app')

@section('title', 'Lihat Data Pembayaran')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
      <div class="card-header">
        <h3 class="m-0 font-weight-bold mt-3">Lihat Data Pembayaran
            <a href="{{ url('pemilik/data-pembayaran') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
        </h3>
    </div>

    <div class="col-12">
        <div class="card">
			<div class="card-body">
				@if(Session::has('success'))
				<p class="text-success">{{ session('success') }}</p>
				@endif
				<h4 class="card-title mb-5">Data Pembayaran <u class="text-primary"><b>{{ $item->users->name }}</b></u></h4>
				<form class="form-sample" action="{{ url('pemilik/data-pembayaran') }}" method="POST">
					@csrf
					<div class="card">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Nama Penghuni</b></label>
								<input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="off" required value="{{ $item->users->name }}" disabled/>
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
								<input name="id_tipe" id="id_tipe" type="text" class="form-control @error('id_tipe') is-invalid @enderror" autocomplete="off" required value="{{ $item->kamars->id_tipe }}" disabled/>
									@error('id_tipe')
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
								<input name="harga_bayar" id="harga_bayar" type="text" class="form-control @error('harga_bayar') is-invalid @enderror" autocomplete="off" required value="{{ $item->harga_bayar }}" disabled/>
									@error('harga_bayar')
									{{-- untuk info yang salah yang mana --}}
									<div class="invalid-feedback">
										{{ $message }}
									</div>            
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Bulan</b></label>
								<input name="bulan" id="bulan" type="text" class="form-control @error('bulan') is-invalid @enderror" autocomplete="off" required value="{{ $item->bulan }}" disabled/>
									@error('bulan')
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
								<label class="col-form-label"><b>Tahun</b></label>
								<input name="tahun" id="tahun" type="text" class="form-control @error('tahun') is-invalid @enderror" autocomplete="off" required value="{{ $item->tahun }}" disabled/>
									@error('tahun')
									{{-- untuk info yang salah yang mana --}}
									<div class="invalid-feedback">
										{{ $message }}
									</div>            
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Tanggal Bayar</b></label>
								<input name="tanggal_bayar" id="tanggal_bayar" type="date" class="form-control @error('tanggal_bayar') is-invalid @enderror" autocomplete="off" required value="{{ $item->tanggal_bayar }}" disabled/>
									@error('id_tipe')
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
								<label class="col-form-label"><b>Bukti</b></label>
								<input name="bukti_bayar" id="bukti_bayar" type="file" class="form-control @error('bukti_bayar') is-invalid @enderror" autocomplete="off" required value="{{ old('bukti_bayar') }}"/>
									@error('bukti_bayar')
									{{-- untuk info yang salah yang mana --}}
									<div class="invalid-feedback">
										{{ $message }}
									</div>            
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Tanggal Validasi</b></label>
								<input name="tanggal_validasi" id="tanggal_validasi" type="date" class="form-control @error('tanggal_validasi') is-invalid @enderror" autocomplete="off" required value="{{ $item->tanggal_validasi }}" disabled/>
									@error('id_tipe')
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
								<label class="col-form-label"><b>Status</b></label>
								<input name="status" id="status" type="text" class="form-control @error('status') is-invalid @enderror" autocomplete="off" required value="{{ $item->status }}" disabled/>
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
								<label class="col-form-label"><b>Keterangan</b></label>
								<td><textarea name="keterangan" id="keterangan" class="form-control" autocomplete="off" value="{{ $item->keterangan }}" disabled>{{ $item->keterangan }}</textarea><p style="font-size: 10px"><b>Catatan : </b> Max:255 karakter. Diisi jika ada pesan yang ingin di konfirmasi ke penghuni</p></td>
									@error('keterangan')
									{{-- untuk info yang salah yang mana --}}
									<div class="invalid-feedback">
										{{ $message }}
									</div>            
									@enderror
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