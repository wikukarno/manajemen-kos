@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title mt-3"> Riwayat Pembayaran 
					@if($data->bukti_bayar != null)
					<a href="{{ route('pembayaran-penghuni.index') }}" class="float-end btn btn-outline-success btn-sm mb-2">Kembali</a>
					@endif
				</h3>
			</div>
			<div class="card-body">
				<form action="{{ route('pembayaran-penghuni.update', $data->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					@if($data->status == 'Lunas')	
						<div class="alert alert-success" role="alert">
							Pembayaran untuk bulan {{ $data->bulan }} tahun {{ $data->tahun }} sudah lunas.
						</div>
					@elseif ($data->status == 'Unggah Bukti Bayar')
						<div class="alert alert-danger" role="alert">
							Silahkan unggah bukti bayar terlebih dahulu.
						</div>
					@elseif ($data->status == 'Menunggu Validasi')
						<div class="alert alert-warning" role="alert">
							Silahkan menunggu validasi dari pemilik kos.
						</div>
					@endif
					<div class="form-group">
						<label for="tipekamar">Tipe Kamar</label>
						<input type="string" class="form-control" id="tipekamar" name="tipe_kamar_penghuni" placeholder="" required autocomplete="off" value="{{ $tipe->kamar->id_tipe }}" disabled>
					</div>
					<div class="form-group">
						<label for="nomorkamar">Nomor Kamar</label>
						<input type="number" class="form-control" id="nomorkamar" name="nomor_kamar_penghuni" placeholder="" required autocomplete="off" value="{{ $tipe->kamar->nomor_kamar }}" disabled>
					</div>
					<div class="form-group">
						<label for="hargakamar">Harga Kamar</label>
						<input type="number" class="form-control" id="hargakamar" name="harga_bayar" placeholder="" required autocomplete="off" value="{{ $data->harga_bayar }}" disabled>
					</div>
					<div class="form-group">
						<label for="bulan">Bulan</label>
						<input type="string" class="form-control" id="bulan" name="bulan" placeholder="" required autocomplete="off" value="{{ $data->bulan }}" disabled>
					</div>
					<div class="form-group">
						<label for="tahun">Tahun</label>
						<input type="number" class="form-control" id="tahun" name="tahun" placeholder="" autocomplete="off" value="{{ $data->tahun }}" disabled>
					</div>
					@if($data->bukti_bayar == null)
						<div class="form-group">
							<label>Unggah Bukti Transfer</label>
							<div class="mt-3">
								<input class="form-control @error('bukti_bayar') is-invalid @enderror" type="file" id="bukti_bayar" name="bukti_bayar" onchange="previewImage()">
							</div>
						</div>
						<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
						<a href="{{ route('pembayaran-penghuni.index') }}" class="btn btn-light">Cancel</a>
					@endif
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('after-script')
{{--  <script>
    $('#form-akun').on('submit', function() {
        $('#btnSave').attr('disabled', 'disabled');
        $('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Menyimpan...');
    });
</script>  --}}
@endpush

<script>
	// Fungsi untuk menampilkan pratinjau dokumen
	function previewImage() {
	  var input = document.getElementById('bukti_bayar');
	  var img = document.getElementById('preview-image');
	  var hiddenInput = document.getElementById('hidden-input');
  
	  if (input.files && input.files[0]) {
		var reader = new FileReader();
  
		reader.onload = function(e) {
		  img.src = e.target.result;
		  hiddenInput.value = e.target.result;
		};
  
		reader.readAsDataURL(input.files[0]);
	  } else {
		img.src = '';
		hiddenInput.value = '';
	  }
	}
  </script>