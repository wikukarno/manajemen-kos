@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title mt-3">Riwayat Pembayaran <a href="{{ route('pembayaran-penghuni.create') }}" class="float-end btn btn-outline-success btn-sm mb-2">Tambah Pembayaran</a></h3>
			</div>
			<div class="card-body">
				{{--  <h4 class="card-title">Riwayat Pembayaran</h4>  --}}
				<div class="table-responsive">
					<table id="tb_datapembayaran" class="table table-hover scroll-horizontal-vertical w-100">
						<thead>
							<tr>
								<th> No </th>
								<th> Tipe Kamar </th>
								<th> Nomor Kamar </th>
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
            { data: 'tipe_kamar_penghuni', name: 'tipe_kamar_penghuni' },
            { data: 'nomor_kamar_penghuni', name: 'nomor_kamar_penghuni' },
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