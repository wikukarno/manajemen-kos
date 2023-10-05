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
				<label for="masa">Masa Pembayaran (Bulan)</label>
				<select class="form-control" id="masa" name="masa" style="height: 1.2cm">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>6</option>
					<option>12</option>
				</select>
				</div>
				<div class="form-group">
				<label for="jumlah">Jumlah Bayar</label>
				<input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="" >
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
@endpush