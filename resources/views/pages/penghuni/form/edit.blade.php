@extends('layouts.app')

@section('title', 'Form')

@section('content')
<form action="{{ route('form-penghuni.update', $item->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
<div class="row">
    <div class="col-12">
        <div class="card">
			<div class="card-body">
				<h3 class="card-title">Form Penghuni</h3>
				<form class="form-sample">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Nama Lengkap</label>
							<div class="col-sm-9">
								<input type="name" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->name }}" name="name" required autocomplete="off">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Uname</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->uname }}" name="uname" required autocomplete="off">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->email }}" name="email" required autocomplete="off" disabled>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Alamat Lengkap</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->alamat }}" name="alamat" required autocomplete="off">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Nomor Handphone</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->hp }}" name="hp" required autocomplete="off">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Nomor Handphone Wali</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->hp2 }}" name="hp2" required autocomplete="off">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Nama Wali</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->wali }}" name="wali" required autocomplete="off">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Id Telegram</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->id_telegram }}" name="id_telegram" required autocomplete="off">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Tempat Lahir</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="tempatlahir" name="tempat_lahir" value="{{ auth()->user()->tempat_lahir }}" required autocomplete="off">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-9">
								<input type="date" class="form-control" id="tanggallahir" name="tanggal_lahir" value="{{ auth()->user()->tanggal_lahir }}" required autocomplete="off">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">KTP</label>
							<div class="col-sm-9">
								<div class="mt-3">
									@if ($item->dokumen != null)
										<img src="{{ asset('storage/'. $item->dokumen) }}" class="img-fluid" id="preview-image">
									@else
										<p><b>Tidak ada file KTP</b></p>
									@endif
									<div class="mt-3">
										<input class="form-control @error('dokumen') is-invalid @enderror" type="file" id="dokumen" name="dokumen" onchange="previewImage()">
										<input type="hidden" id="hidden-input" name="hidden-input">
										@error('dokumen')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group row mt-5">
							<div class="col-sm-9">
								<button type="submit" class="btn btn-primary mt-4">Save</button>
								<a href="{{ route('form-penghuni.index') }}" class="btn btn-light mt-4 ms-1">Cancel</a>
							</div>
						</div>
					</div>
				</div>
				</form>
			</div>
        </div>
	</div>
</div>
</form>


<form action="" id="" name="" method=""</form>

@endsection

@push('after-script')
<script>
    $('#form-akun').on('submit', function() {
        $('#btnSave').attr('disabled', 'disabled');
        $('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Menyimpan...');
    });
</script>
<script>
  // Fungsi untuk menampilkan pratinjau dokumen
  function previewImage() {
    var input = document.getElementById('dokumen');
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
@endpush