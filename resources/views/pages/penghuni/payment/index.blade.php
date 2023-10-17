@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title mt-3">Riwayat Pembayaran 
					@if($tambahPembayaranDisabled)
						<a href="{{ route('pembayaran-penghuni.create') }}" class="float-end btn btn-outline-success btn-sm mb-2 disabled">Tambah Pembayaran</a>
					@else
						<a href="{{ route('pembayaran-penghuni.create') }}" class="float-end btn btn-outline-success btn-sm mb-2">Tambah Pembayaran</a>
					@endif
					</h3>
			</div>
			<div class="card-body">
				@if(session()->has('success'))
					<div class="alert alert-success col-lg-12" role="alert">
					{{ session('success') }}
					</div>
				@endif
				<p>Pembayaran ke rekening : <b style="color: red">123456788797 - NA</b></p>
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
								<th> Status </th>
								<th> Keterangan </th>
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
{{--  <script>
    $('#form-akun').on('submit', function() {
        $('#btnSave').attr('disabled', 'disabled');
        $('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Menyimpan...');
    });
</script>  --}}
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
            { data: 'status', name: 'status' },
            { data: 'keterangan', name: 'keterangan' },
        ],
    });
</script>
@endpush