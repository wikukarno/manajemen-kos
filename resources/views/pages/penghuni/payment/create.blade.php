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
						<label for="tipekamar">Tipe Kamar</label>
						<input type="string" class="form-control" id="tipekamar" name="tipekamar" placeholder="" required autocomplete="off" value="" disabled>
					</div>
					<div class="form-group">
						<label for="nomorkamar">Nomor Kamar</label>
						<input type="number" class="form-control" id="nomorkamar" name="nomorkamar" placeholder="" required autocomplete="off" value="" disabled>
					</div>
					<div class="form-group">
						<label for="hargakamar">Harga Kamar</label>
						<input type="number" class="form-control" id="hargakamar" name="hargakamar" placeholder="" required autocomplete="off" value="" disabled>
					</div>
					 
					<div class="form-group">
						<label for="tahun">Tahun</label>
						<input type="number" class="form-control" id="tahun" name="tahun" placeholder="" required autocomplete="off" value="{{ date('Y') }}" disabled>
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