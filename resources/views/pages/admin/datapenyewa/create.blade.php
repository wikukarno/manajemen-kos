@extends('layouts.app')

@section('title', 'Tambah Data Penyewa')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
		
        <div class="card-header">
            <h3 class="m-0 font-weight-bold mt-3">Tambah Data Penyewa
                <a href="{{ url('pemilik/data-penyewa') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
            </h3>
        </div>

        <div class="col-12">
            <div class="card">
				<div class="card-body">
					@if(Session::has('success'))
					<p class="text-success">{{ session('success') }}</p>
					@endif
					<h4 class="card-title mb-5">Data Penyewa</h4>
					<form class="form-sample" action="{{ url('pemilik/data-penyewa') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nama Lengkap</b></label>
										<input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama" autocomplete="off" required value="{{ old('name') }}"/>
										@error('name')
											{{-- untuk info yang salah yang mana --}}
											<div class="invalid-feedback">
											{{ $message }}
											</div>            
										@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nomor Kamar</b></label>
									<select class="form-control @error('nomor_kamar') is-invalid @enderror" name="nomor_kamar" id="nomor_kamar" style="height: 45px" value="{{ old('nomor_kamar') }}">
										<option value="">Pilih Nomor Kamar</option>
										@foreach ($kamar as $n)
											<option value="{{ $n->id_kamar }}">{{ $n->nomor_kamar }}</option>
										@endforeach
									</select>
										@error('nomor_kamar')
										<div class="invalid-feedback">
											{{ $message }}
										</div>            
										@enderror
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Email Address</b></label>
									<input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" autocomplete="off" required value="{{ old('email') }}"/>
										@error('email')
											{{-- untuk info yang salah yang mana --}}
											<div class="invalid-feedback">
											{{ $message }}
											</div>            
										@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Tempat Lahir</b></label>
										<input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Masukkan Tempat Lahir" autocomplete="off" required value="{{ old('tempat_lahir') }}"/>
										@error('tempat_lahir')
											{{-- untuk info yang salah yang mana --}}
											<div class="invalid-feedback">
											{{ $message }}
											</div>            
										@enderror
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Tanggal Lahir</b></label>
										<input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" autocomplete="off" required value="{{ old('tanggal_lahir') }}"/>
										@error('tanggal_lahir')
											{{-- untuk info yang salah yang mana --}}
											<div class="invalid-feedback">
											{{ $message }}
											</div>            
										@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label" ><b>Role</b></label>
										<select class="form-control @error('role') is-invalid @enderror" name="role" id="role" style="height: 45px" required value="{{ old('role') }}">
											<option value="">Pilih</option>
											<option value="Pemilik">Pemilik</option>
											<option value="Pendaftar">Pendaftar</option>
											<option value="Penghuni">Penghuni</option>
										</select>
										@error('role')
											{{-- untuk info yang salah yang mana --}}
											<div class="invalid-feedback">
											{{ $message }}
											</div>            
										@enderror
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Status Akun</b></label>
										<select class="form-control @error('status_akun') is-invalid @enderror" name="status_akun" id="status_akun" style="height: 45px" required value="{{ old('status_akun') }}">
											<option value="">Pilih</option>
											<option value="Terverifikasi">Terverifikasi</option>
											<option value="Belum Verifikasi">Tidak Terverifikasi</option>
											<option value="Diblokir">Ditolak</option>
										</select>
										@error('status_akun')
											{{-- untuk info yang salah yang mana --}}
											<div class="invalid-feedback">
											{{ $message }}
											</div>            
										@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Alamat</b></label>
									<textarea name="alamat" id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Jl. xxxxx No.xx RT/RW xx/xx" autocomplete="off" required value="{{ old('alamat') }}"></textarea>
									@error('alamat')
										{{-- untuk info yang salah yang mana --}}
										<div class="invalid-feedback">
										{{ $message }}
										</div>            
									@enderror
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nomor Handphone</b></label>
									<input name="hp" id="hp" type="text" class="form-control @error('hp') is-invalid @enderror" placeholder="0821xxxxxx73" autocomplete="off" required value="{{ old('hp') }}"/>
									@error('hp')
										{{-- untuk info yang salah yang mana --}}
										<div class="invalid-feedback">
										{{ $message }}
										</div>            
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nama Wali</b></label>
									<input name="wali" id="wali" type="text" class="form-control @error('wali') is-invalid @enderror" placeholder="Masukkan Nama Wali" autocomplete="off" required value="{{ old('wali') }}"/>
									@error('wali')
										{{-- untuk info yang salah yang mana --}}
										<div class="invalid-feedback">
										{{ $message }}
										</div>            
									@enderror
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nomor Handphone Wali</b></label>
									<input name="hp2" id="hp2" type="text" class="form-control @error('hp2') is-invalid @enderror" placeholder="0821xxxxxx73" autocomplete="off" required value="{{ old('hp2') }}"/>
									@error('hp2')
										{{-- untuk info yang salah yang mana --}}
										<div class="invalid-feedback">
										{{ $message }}
										</div>            
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Password</b></label>
										<input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Min. 8" required value="{{ old('password') }}" autocomplete="off"/>
										@error('password')
											{{-- untuk info yang salah yang mana --}}
											<div class="invalid-feedback">
											{{ $message }}
											</div>            
										@enderror
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Id Telegram</b></label>
									<input name="id_telegram" id="id_telegram" type="text" class="form-control @error('id_telegram') is-invalid @enderror" placeholder="Masukkan Id Telegram" autocomplete="off" required value="{{ old('id_telegram') }}"/>
									@error('id_telegram')
										{{-- untuk info yang salah yang mana --}}
										<div class="invalid-feedback">
										{{ $message }}
										</div>            
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Mac Address</b></label>
									<input name="mac_addr" id="mac_addr" type="text" class="form-control" placeholder="00-B0-xx-xx-xx-26" autocomplete="off" value="{{ old('mac_addr') }}"/>
									
								</div>
							</div>
							
						</div>	
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>KTP</b></label>
										<div class="mt-2 justify-content-center">
											@if ($item->dokumen != null)
												<img src="{{ asset('storage/'. $item->dokumen) }}" class="img-fluid" id="preview-image" width="100px">
											@else
												<img src="" class="img-fluid" id="preview-image" width="100px">
											@endif
												<div class="mt-3">
													<input class="form-control @error('dokumen') is-invalid @enderror" type="file" id="dokumen" name="dokumen" onchange="previewImage()" required>
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
						
						<div class="form-group">
							<label for="fasilitas"><b>Fasilitas</b></label>							
							<div class="row">
								{{-- Membuat checkbox untuk memilih semua fasilitas --}}
								<div class="col-md-6">
									<div class="form-check">
										<b><label class="form-check-label">
											<input type="checkbox" class="form-check-input select-all-checkbox"> Pilih Semua
										</label></b>
									</div>
								</div>
						
								{{-- Membuat checkbox untuk setiap fasilitas --}}
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
						</div>

						<td colspan="2">
							<input type="submit" class="float-end btn btn-gradient-primary btn-sm">
						</td>
					</form>
				</div>
            </div>
		</div>

    </div>
</div>
<!-- /.container-fluid -->

@endsection

@push('after-script')

{{--  untuk melihat ktp yang di upload  --}}
<script>
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

<script>
  // Menangani peristiwa klik pada checkbox "Pilih Semua"
  document.querySelector('.select-all-checkbox').addEventListener('click', function () {
      // Dapatkan semua checkbox fasilitas
      const checkboxes = document.querySelectorAll('input[name="fasilitas[]"]');
      
      // Setel status checked sesuai dengan checkbox "Pilih Semua"
      checkboxes.forEach(function (checkbox) {
          checkbox.checked = document.querySelector('.select-all-checkbox').checked;
      });
  });
</script>

@endpush