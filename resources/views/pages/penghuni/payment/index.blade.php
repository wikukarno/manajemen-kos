@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<div class="row">
  	<div class="col-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Form Pembayaran</h4>
				<form action="{{ route('form-pembayaran-penghuni.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="bulan">Pembayaran Untuk Bulan</label>
						<div class="row">
							{{--  Membuat checkbox secara otomatis dengan menggnakan foreach  --}}
							@foreach (['Januari', 'Juli', 'Februari', 'Agustus', 'Maret', 'September', 'April', 'Oktober', 'Mei', 'November', 'Juni', 'Desember'] as $bulan)
								<div class="col-md-6">
									<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input" name="bulan[]" value="{{ $bulan }}" @if (in_array($bulan, explode(',', $item->bulan))) checked @endif> {{ $bulan }}
										</label>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					<div class="form-group">
						<label for="tahun">Tahun</label>
						<input type="number" class="form-control" id="tahun" name="tahun" placeholder="" required autocomplete="off">
					</div>
					<div class="form-group">
						<label for="jumlah">Jumlah Bayar</label>
						<input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="" required autocomplete="off">
					</div>
					<div class="form-group">
						<label>Unggah Bukti Transfer</label>
						<div class="input-group col-xs-12">
							<input type="file" class="form-control file-upload-info" name="bukti_bayar" placeholder="Unggah Gambar" required>
						</div>
					</div>
					<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
					<button class="btn btn-light">Cancel</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Riwayat Pembayaran</h4>
				<p class="card-description"> {{ $item->name }} </code>
				</p>
			<table class="table table-striped">
				<thead>
				<tr>
					<th> No </th>
					{{--  <th> Kwitansi </th>  --}}
					<th> Bulan </th>
					<th> Tahun </th>
					<th> Tanggal Bayar </th>
					<th> Tanggal Validasi </th>
					<th> Jumlah Bayar </th>
					<th> Sisa </th>
					<th> Status </th>
				</tr>
				</thead>
				<tbody>
					@foreach ($payments as  $payment)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $payment->bulan }}</td>
							<td>{{ $payment->tahun }}</td>
							<td>{{ $payment->tanggal_bayar }}</td>
							<td>{{ $payment->tanggal_validasi }}</td>
							<td>{{ $payment->jumlah }}</td>
							<td>{{ $payment->sisa }}</td>
							<td>{{ $payment->keterangan }}</td>
						</tr>
                     @endforeach
				</tbody>
			</table>
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