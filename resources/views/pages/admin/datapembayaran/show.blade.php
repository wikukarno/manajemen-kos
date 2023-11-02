@extends('layouts.app')

@section('title', 'Detail Data Pembayaran')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
      <div class="card-header">
        <h3 class="m-0 font-weight-bold mt-3">Detail Data Pembayaran
            <a href="{{ url('pemilik/data-pembayaran') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
        </h3>
    </div>

    <div class="col-12">
        <div class="card">
			<div class="card-body">
				@if(Session::has('success'))
				<p class="text-success">{{ session('success') }}</p>
				@endif
				<h4 class="card-title mb-5"><b class="text-primary">{{ $item->users->name }}</b></h4>
				<form class="form-sample" action="{{ url('pemilik/data-pembayaran') }}" method="POST">
					@csrf
					<div class="card">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Nama Penghuni</b></label>
								<input name="name" id="name" type="text" class="form-control" autocomplete="off" required value="{{ $item->users->name }}" disabled placeholder="Masukkan Nama Penghuni"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Id Tipe</b></label>
								<input name="id_tipe" id="id_tipe" type="text" class="form-control" autocomplete="off" required value="{{ $item->kamars->type->name }}" disabled/>
								</div>
							</div>							
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Nomor Kamar</b></label>
								<input name="nomor_kamar" id="nomor_kamar" type="text" class="form-control" autocomplete="off" required value="{{ $item->kamars->nomor_kamar }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Harga</b></label>
								<input name="harga_bayar" id="harga_bayar" type="text" class="form-control" autocomplete="off" required value="{{ $item->harga_bayar }}" disabled/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Bulan</b></label>
								<input name="bulan" id="bulan" type="text" class="form-control" autocomplete="off" required value="{{ $item->bulan }}" disabled placeholder="Masukkan Bulan"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Tahun</b></label>
								<input name="tahun" id="tahun" type="text" class="form-control" autocomplete="off" required value="{{ $item->tahun }}" disabled/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Tanggal Bayar</b></label>
								<input name="tanggal_bayar" id="tanggal_bayar" type="date" class="form-control" autocomplete="off" required value="{{ $item->tanggal_bayar }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Bukti</b></label>
								<input name="bukti_bayar" id="bukti_bayar" type="file" class="form-control" autocomplete="off" required value="{{ old('bukti_bayar') }}"/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Tanggal Validasi</b></label>
								<input name="tanggal_validasi" id="tanggal_validasi" type="date" class="form-control" autocomplete="off" required value="{{ $item->tanggal_validasi }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Status</b></label>
								<input name="status" id="status" type="text" class="form-control" autocomplete="off" required value="{{ $item->status }}" disabled/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Keterangan</b></label>
								<td><textarea name="keterangan" id="keterangan" class="form-control" autocomplete="off" value="{{ $item->keterangan }}" disabled placeholder="Masukkan Keterangan" >{{ $item->keterangan }}</textarea><p style="font-size: 10px"><b>Catatan : </b> Max:255 karakter. Diisi jika ada pesan yang ingin di konfirmasi ke penghuni</p></td>
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