@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title mt-3">Pembayaran <a href="{{ route('pembayaran-penghuni.index') }}" class="float-end btn btn-outline-success btn-sm mb-2">Kembali</a></h3>
			</div>
			<div class="card-body">
				<form action="{{ route('pembayaran-penghuni.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="tipekamar">Tanggal Hari Ini : <b style="color: rgb(91, 0, 125)">{{ $tanggalSekarang }}</b></label>
					</div>
					<div class="form-group">
						<label for="tipekamar">Tipe Kamar</label>
						<input type="string" class="form-control" id="tipekamar" name="tipe_kamar_penghuni" placeholder="" required autocomplete="off" value="" disabled> 
						{{--  {{ $payment->tipe_kamar_penghuni }}  --}}
					</div>
					<div class="form-group">
						<label for="nomorkamar">Nomor Kamar</label>
						<input type="number" class="form-control" id="nomorkamar" name="nomor_kamar_penghuni" placeholder="" required autocomplete="off" value="" disabled>
					</div>
					<div class="form-group">
						<label for="hargakamar">Harga Kamar</label>
						<input type="number" class="form-control" id="hargakamar" name="harga_bayar" placeholder="" required autocomplete="off" value="" disabled>
					</div>
					<div class="form-group">
						<label for="bulan">Bulan</label>
						<select class="form-select" aria-label="Default select example" name="selectedBulan">
							<option selected>Pembayaran Untuk Bulan</option>
							@foreach ($bulanNames as $index => $bulan )
								<option name="bulan" value="{{ $index + 1 }}" @if  ($bulan != now()->locale('en')->monthName && $statusPembayaran[$bulan])  disabled @endif>{{ $bulan }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="tahun">Tahun</label>
						<input type="number" class="form-control" id="tahun" name="tahun" placeholder="" autocomplete="off" value="{{ $tahun }}" disabled>
					</div>
					<div class="form-group">
						<label>Unggah Bukti Transfer</label>
						<div class="input-group col-xs-12">
							<input type="file" class="form-control file-upload-info" name="bukti_bayar" placeholder="Unggah Gambar" >
						</div>
					</div>
					<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
					<a href="{{ route('pembayaran-penghuni.index') }}" class="btn btn-light">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('after-script')
<script>
    $('#form-akun').on('submit', function() {
        $('#btnSave').attr('disabled', 'disabled');
        $('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Menyimpan...');
    });
</script>
@endpush