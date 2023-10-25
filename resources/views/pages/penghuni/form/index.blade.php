@extends('layouts.app')

@section('title', 'Form')

@section('content')

<div class="row" style="margin-left: 1px; margin-right:1px">
	@if($item->fasilitas == null)
		<div class="alert alert-warning" role="alert">
			<h4 class="alert-heading">Pemberitahuan</h4>
			<hr>
			<p>Lengkapi data untuk kamar anda terlebih dahulu, isi fasilitas yang akan anda pakai selama di kos ini. <a href="{{ route('fasilitas-penghuni.index') }}" class="alert-link">Lengkapi di sini</a></p>
		</div>	
	@endif
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
			<div class="card-header">
				<h3 class="card-title mt-3">Form Penghuni</h3>
			</div>
			<div class="card-body">
				@if(session()->has('success'))
					<div class="alert alert-success col-lg-12" role="alert">
						{{ session('success') }}
					</div>
				@endif
				<form class="form-sample">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Nama Lengkap</label>
								<div class="col-sm-9">
									<input type="name" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->name }}" disabled>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Tanggal Masuk</label>
								<div class="col-sm-9">
									<input type="date" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->tgl_masuk}}" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Email</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->email }}" disabled>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Alamat Lengkap</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->alamat }}" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Nomor Handphone</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->hp }}" disabled>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Nomor Handphone Wali</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->hp2 }}" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Nama Wali</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->wali }}" disabled>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Id Telegram</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->id_telegram }}" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Tempat Lahir</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="tempatlahir" name="tempat_lahir" value="{{ auth()->user()->tempat_lahir }}" disabled>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-9">
									<input type="date" class="form-control" id="tanggallahir" name="tanggal_lahir" value="{{ auth()->user()->tanggal_lahir }}" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row">
								<label class="col-sm-3 col-form-label">KTP</label>
								<div class="col-sm-9">
									<div class="mt-2 justify-content-center">
										@if ($item->dokumen != null)
										<img src="{{ Storage::url($item->dokumen) }}"class="img-fluid">
										@else
										<p><b>Tidak ada file KTP</b></p>
										<input type="hidden">
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>

					@if($item->fasilitas != null)
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row mt-5">
								<div class="col-sm-9">
									<a href="{{ route('form-penghuni.edit', $item->id) }}" class="btn btn-primary mb-5">Edit Profil</a>
								</div>
							</div>
						</div>
					</div>	
					@endif
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