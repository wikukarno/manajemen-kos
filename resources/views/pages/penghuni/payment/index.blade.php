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
							@php
								$bulanNames = [];
								for ($i = 1; $i <= 12; $i++) {
									$bulan = \Carbon\Carbon::create()->month($i)->locale('id_ID')->monthName;
									array_push($bulanNames, $bulan);
								}
							@endphp
							@foreach ($bulanNames as $index => $bulan)
							<div class="col-md-6">
								<div class="form-check">
									<label class="form-check-label">
										{{--  ($data=['keterangan'] == null)  --}}
										<input type="checkbox" class="form-check-input" name="bulan[]" value="{{ $index + 1 }}" @if  ($bulan != now()->locale('id_ID')->monthName)  disabled @endif> {{ $bulan }}
									</label>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="form-group">
						<label for="tahun">Tahun</label>
						<input type="number" class="form-control" id="tahun" name="tahun" placeholder="" required autocomplete="off" value="{{ \Carbon\Carbon::now()->format('Y') }}" disabled>
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
				<div class="table-responsive">
					<table id="tb_datapembayaran" class="table table-hover scroll-horizontal-vertical w-100">
						<thead>
							<tr>
								<th> No </th>
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

						</tbody>
					</table>
				</div>
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
<script>
    $('#tb_datapembayaran').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        
        ordering: [[1, 'asc']],
        ajax: {
            url: "{!! url()->current() !!}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'bulan', name: 'bulan' },
            { data: 'tahun', name: 'tahun' },
            { data: 'tanggal_bayar', name: 'tanggal_bayar' },
            { data: 'tanggal_validasi', name: 'tanggal_validasi' },
            { data: 'jumlah', name: 'jumlah' },
            { data: 'sisa', name: 'sisa' },
            { data: 'keterangan', name: 'keterangan' },
        ],
    });
</script>
@endpush