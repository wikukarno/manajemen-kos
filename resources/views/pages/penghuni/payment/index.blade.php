@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')

<div class="row" style="margin-left: 1px; margin-right:1px">
	@if($item->fasilitas == null)
		<div class="alert alert-warning" role="alert">
			<h4 class="alert-heading">Pemberitahuan</h4>
			<hr>
			<p>Lengkapi data untuk kamar anda terlebih dahulu, isi fasilitas yang akan anda pakai selama di kos ini. <a href="{{ route('fasilitas-penghuni.index') }}" class="alert-link">Lengkapi di sini</a></p>
		</div>	
	@endif
	@if($riwayatPembayaranTerakhir == null)
		<div class="alert alert-warning" role="alert">
			<h4 class="alert-heading">Pemberitahuan</b></h4>
			<hr>
			<p>Silahkan melakukan pembayaran pertama <a href="{{ route('pembayaran-penghuni.create') }}" class="alert-link">Tambah Pembayaran</a></p>
			<p class="mb-0"></p>
		</div>
  	@endif
</div>

<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title mt-3">Riwayat Pembayaran 
					@if($item->fasilitas != null)
						@if($tambahPembayaranDisabled)
							<a href="{{ route('pembayaran-penghuni.create') }}" class="float-end btn btn-outline-success btn-sm mb-2 disabled">Tambah Pembayaran</a>
						@else
							<a href="{{ route('pembayaran-penghuni.create') }}" class="float-end btn btn-outline-success btn-sm mb-2">Tambah Pembayaran</a>
						@endif
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
								<th> Aksi </th>
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
        
        ordering: [[4, 'desc']],
        ajax: {
            url: "{!! url()->current() !!}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'bulan', name: 'bulan' },
            { data: 'tahun', name: 'tahun' },
            { data: 'tanggal_bayar', name: 'tanggal_bayar' },
            { data: 'tanggal_validasi', name: 'tanggal_validasi' },
            { data: 'harga_bayar', name: 'harga_bayar' },
            { data: 'status', name: 'status' },
            { data: 'keterangan', name: 'keterangan' },
            { data: 'aksi', name: 'aksi' },
        ],
    });
</script>
@endpush