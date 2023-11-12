@extends('layouts.app')

@section('title', 'Edit Data Penghuni')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">

		<div class="card-header">
			<h3 class="m-0 font-weight-bold mt-3">Edit Data Penghuni
				<a href="{{ url('pemilik/data-penyewa') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
			</h3>
		</div>

        <div class="col-12">
            <div class="card">
				<div class="card-body">
					@if(Session::has('success'))
					<p class="text-success">{{ session('success') }}</p>
					@endif
					<h4 class="card-title mb-5">Penghuni <b class="text-primary">{{ $penghuni->user->name }}</b></h4>
					{{--  <form class="form-sample" action="{{ url('pemilik/data-penyewa') }}" method="POST">  --}}
					<form action="{{ route('data-penyewa.update', $penghuni->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nama Lengkap</b></label>
										<input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama" autocomplete="off" required value="{{ $penghuni->user->name }}" disabled/>
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
									<label class="col-form-label"><b>Tipe Kamar</b></label>
									<input name="tipekamar" id="tipekamar" type="text" class="form-control" value="{{ $penghuni->kamar->type->name }}" disabled required/>
									{{--  <select class="form-control" name="tipekamar" id="tipekamar" style="height: 45px" disabled>
										<option value="{{ $penghuni->kamar->type->id }}">{{ $penghuni->kamar->type->name }}</option>
										@foreach ($tipe_kamar as $item)
											<option value="{{ $item->id }}">{{ $item->name }}</option>
										@endforeach
									</select>  --}}
								</div>
							</div>							
						</div>

						<div class="row">							
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nomor Kamar</b></label>
									<input name="nomor_kamar" id="nomor_kamar" type="text" class="form-control" value="{{ $penghuni->kamar->nomor_kamar }}" disabled/>
									{{--  <select class="form-control" name="nomor_kamar" id="nomor_kamar" style="height: 45px">
										<option value="{{ $penghuni->kamar->nomor_kamar }}">{{ $penghuni->kamar->nomor_kamar }}</option>

										@foreach ($query as $nomor)
											<option value="{{ $nomor->id }}">{{ $nomor->nomor_kamar }}</option>
										@endforeach
										
									</select>  --}}
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Harga Kamar</b></label>
									<input name="hargakamar" id="hargakamar" type="text" class="form-control" value="{{ $penghuni->kamar->harga }}" disabled required/>
								</div>
							</div>
						</div>	

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Email Address</b></label>
									<input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" autocomplete="off" required value="{{ $penghuni->user->email }}" disabled/>
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
										<input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Masukkan Tempat Lahir" autocomplete="off" required value="{{ $penghuni->user->tempat_lahir }}" disabled/>
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
										<input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" autocomplete="off" required value="{{ $penghuni->user->tanggal_lahir }}" disabled/>
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
									<input name="role" id="role" type="text" class="form-control @error('role') is-invalid @enderror" placeholder="Masukkan Role" autocomplete="off" required value="{{ $penghuni->user->role }}" disabled/>
										{{--  <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" style="height: 45px" required>
											<option value="{{ $penghuni->user->role }}">{{ $penghuni->user->role }}</option>
											<option value="Pemilik">Pemilik</option>
											<option value="Pendaftar">Pendaftar</option>
											<option value="Penghuni">Penghuni</option>
										</select>  --}}

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
									<input name="status_akun" id="status_akun" type="text" class="form-control @error('status_akun') is-invalid @enderror" placeholder="Masukkan Status Akun" autocomplete="off" required value="{{ $penghuni->user->status_akun }}" disabled/>
										{{--  <select class="form-control @error('status_akun') is-invalid @enderror" name="status_akun" id="status_akun" style="height: 45px" required>
											<option value="{{ $penghuni->user->status_akun }}">{{ $penghuni->user->status_akun }}</option>
											<option value="Terverifikasi">Terverifikasi</option>
											<option value="Belum Verifikasi">Tidak Terverifikasi</option>
											<option value="Diblokir">Ditolak</option>
										</select>  --}}
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
									<textarea name="alamat" id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Jl. xxxxx No.xx RT/RW xx/xx" autocomplete="off" required disabled>{{ $penghuni->user->alamat }}</textarea>
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
									<input name="hp" id="hp" type="text" class="form-control @error('hp') is-invalid @enderror" placeholder="0821xxxxxx73" autocomplete="off" required value="{{ $penghuni->user->hp }}" disabled/>
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
									<input name="wali" id="wali" type="text" class="form-control @error('wali') is-invalid @enderror" placeholder="Masukkan Nama Wali" autocomplete="off" required value="{{ $penghuni->user->wali }}" disabled/>
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
									<input name="hp2" id="hp2" type="text" class="form-control @error('hp2') is-invalid @enderror" placeholder="0821xxxxxx73" autocomplete="off" required value="{{ $penghuni->user->hp2 }}" disabled/>
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
										<input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Min. 8" required value="{{ $penghuni->user->password }}" autocomplete="off" disabled/>
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
									<input name="id_telegram" id="id_telegram" type="text" class="form-control @error('id_telegram') is-invalid @enderror" placeholder="Masukkan Id Telegram" autocomplete="off" required value="{{ $penghuni->user->id_telegram }}" disabled/>
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
									<input name="mac_addr" id="mac_addr" type="text" class="form-control" placeholder="00-B0-xx-xx-xx-26" autocomplete="off" value="{{ $penghuni->user->mac_addr }}"/>
								</div>
							</div>
						</div>	

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>KTP</b></label>
										<div class="mt-2 justify-content-center">
											@if ($penghuni->user->dokumen != null)
												<img src="{{ asset('storage/'. $penghuni->user->dokumen) }}" class="img-fluid" id="preview-image" width="250px">
											@else
												{{--  <img src="" class="img-fluid" id="preview-image">  --}}
												<p style="color: red"><b>Tidak ada file KTP</b></p>
											@endif
												{{--  <div class="mt-3">
													<input class="form-control @error('dokumen') is-invalid @enderror" type="file" id="dokumen" name="dokumen" onchange="previewImage()" >
													@error('dokumen')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
													@enderror
												</div>  --}}
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
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input select-all-checkbox" disabled> Pilih Semua
										</label>
									</div>
								</div>
						
								{{-- Membuat checkbox untuk setiap fasilitas --}}
								@foreach (['Listrik', 'Air', 'Wifi', 'Tempat Tidur', 'Kasur', 'Lemari', 'Meja Belajar', 'Kursi Belajar', 'Kipas Angin', 'Kloset Kamar Mandi', 'Keran', 'Shower'] as $fasilitas)
									<div class="col-md-6">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="fasilitas[]" value="{{ $fasilitas }}" @if (in_array($fasilitas, explode(',', $penghuni->user->fasilitas))) checked @endif disabled> {{ $fasilitas }}
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

{{--  // Untuk TipeKamar
  $('#tipekamar').change(function() {
    let idTipeKamar = $('#tipekamar option:selected').val();
	console.log(idTipeKamar);

        if (idTipeKamar != '' && idTipeKamar != null) {
            $.ajax({
                type: 'GET',
                url: "{{ url('/pemilik/data-penyewa/kamar') }}",
                data: {
                    id: idTipeKamar
                },
                dataType: 'json',
                beforeSend: function() {
                    $('.preloader').fadeIn();
                },
                success: function(res) {
                    if (res.status == true) {
                        $('#nomor_kamar').val(res.data.nomor_kamar);
                        $('#hargakamar').val(res.data.harga);
                    } else if (res.status == false) {
                        alert(res.message);
                    } else {
                        alert(res.responseJSON.message);
                    }
                },
                error: function(res) {
                    alert(res.responseJSON.message);
                },
                complete: function() {
                    $('.preloader').fadeOut();
                }
            });
        }
  });

  //untuk NomorKamar
  $('#nomor_kamar').change(function() {
    let idNomorKamar = $('#nomor_kamar option:selected').val();
	console.log(idNomorKamar);

        if (idNomorKamar != '' && idNomorKamar != null) {
            $.ajax({
                type: 'GET',
                url: "{{ url('/pemilik/data-penyewa/kamar') }}",
                data: {
                    id: idNomorKamar
                },
                dataType: 'json',
                beforeSend: function() {
                    $('.preloader').fadeIn();
                },
                success: function(res) {
                    if (res.status == true) {
                        $('#nomor_kamar').val(res.data.nomor_kamar);
                        $('#hargakamar').val(res.data.harga);
                    } else if (res.status == false) {
                        alert(res.message);
                    } else {
                        alert(res.responseJSON.message);
                    }
                },
                error: function(res) {
                    alert(res.responseJSON.message);
                },
                complete: function() {
                    $('.preloader').fadeOut();
                }
            });
        }
  });  --}}
</script>

@endpush