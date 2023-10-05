@extends('layouts.app')

@section('title', 'Sewa Kamar')

@section('content')
<form action="{{ route('form-permintaan-penghuni.update', $item->id) }}" method="post">
  @csrf
  @method('put')
  <div class="row">
      	<div class="col-12">  
          	<div class="card">
				<div class="card-body">
					<h4 class="card-title">Sewa Kamar</h4>
					<form class="forms-sample">
						<div class="form-group">
							<label for="harga">Tipe Kamar</label>
							<input type="text" class="form-control" id="tipe" placeholder="" name="tipe">
						</div>
						<div class="form-group">
							<label for="harga">Nomor Kamar</label>
							<input type="text" class="form-control" id="nomor" placeholder="" name="nomor">
						</div>
						<div class="form-group">
							<label for="harga">Harga Kamar</label>
							<input type="text" class="form-control" id="harga" placeholder="" name="harga">
						</div>
						<div class="form-group">
							<label for="fasilitas">Fasilitas</label>
							<div class="row">
								<div class="col-md-6">
									<div class="form-check">
										{{--  Untuk mencentang semua checkbox  --}}
										<b><label class="form-check-label">
											<input type="checkbox" class="form-check-input select-all-checkbox" id="select-all"> Select All
										</label></b>
									</div>
								</div>
								{{--  Membuat checkbox secara otomatis dengan menggnakan foreach  --}}
								@foreach (['Listrik', 'Air', 'Wifi', 'Tempat Tidur', 'Kasur', 'Lemari', 'Meja Belajar', 'Kursi Belajar', 'Kipas Angin', 'Kloset Kamar Mandi', 'Keran', 'Shower'] as $fasilitas)
									<div class="col-md-6">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="fasilitas[]" value="{{ $fasilitas }}" @if (in_array($fasilitas, explode(',', $item->fasilitas))) checked @endif> {{ $fasilitas }}
											</label>
										</div>
									</div>
								@endforeach
							</div>
						{{--  <div class="row">
							<div class="col-md-6">
							<div class="form-group">
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" name="fasilitas[]" value="Listrik" @if (in_array('Listrik', explode(',', $item->fasilitas))) checked @endif> Listrik </label>
								</div>
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Air" @if (in_array('Air', explode(',', $item->fasilitas))) checked @endif> Air </label>
								</div>
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Wifi" @if (in_array('Wifi', explode(',', $item->fasilitas))) checked @endif> Wifi </label>
								</div>
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Tempat Tidur" @if (in_array('Tempat Tidur', explode(',', $item->fasilitas))) checked @endif> Tempat Tidur </label>
								</div>
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Kasur" @if (in_array('Kasur', explode(',', $item->fasilitas))) checked @endif> Kasur </label>
								</div>
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Lemari" @if (in_array('Lemari', explode(',', $item->fasilitas))) checked @endif> Lemari </label>
								</div>
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Meja Belajar" @if (in_array('Meja Belajar', explode(',', $item->fasilitas))) checked @endif> Meja Belajar </label>
								</div>
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Kursi Belajar" @if (in_array('Kursi Belajar', explode(',', $item->fasilitas))) checked @endif> Kursi Belajar </label>
								</div>
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Kipas Angin" @if (in_array('Kipas Angin', explode(',', $item->fasilitas))) checked @endif> Kipas Angin </label>
								</div>
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Kloset Kamar Mandi" @if (in_array('Kloset Kamar Mandi', explode(',', $item->fasilitas))) checked @endif> Kloset Kamar Mandi </label>
								</div>
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Keran" @if (in_array('Keran', explode(',', $item->fasilitas))) checked @endif> Keran </label>
								</div>
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input"  name="fasilitas[]" value="Shower" @if (in_array('Shower', explode(',', $item->fasilitas))) checked @endif> Shower </label>
								</div>
							</div>
							</div>
						</div>  --}}
						</div>
						<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
						<button class="btn btn-light">Cancel</button>
					</form>
				</div>
          	</div>
      	</div>
  	</div>
</form>
@endsection

@push('after-script')
<script>
    $('#form-akun').on('submit', function() {
        $('#btnSave').attr('disabled', 'disabled');
        $('#btnSave').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Menyimpan...');
    });
</script>
<script>
  // Handle the "Select All" checkbox
  const selectAllCheckbox = document.getElementById('select-all'); 
  const checkboxes = document.querySelectorAll('input[name="fasilitas[]"]');

  selectAllCheckbox.addEventListener('change', function () {
      checkboxes.forEach(function (checkbox) {
          checkbox.checked = selectAllCheckbox.checked;
      });
  });

  checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener('change', function () {
          // Uncheck "Select All" if any checkbox is unchecked
          if (!checkbox.checked) {
              selectAllCheckbox.checked = false;
          }
      });
  });
</script>
@endpush