@extends('layouts.app')

@section('title', 'Detail Data Penyewa')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
		<div class="card-header">
			<h3 class="m-0 font-weight-bold mt-3">Detail Data Penyewa
				<a href="{{ url('pemilik/data-penyewa') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
			</h3>
		</div>

        <div class="col-12">
            <div class="card"> 
				<div class="card-body">
					@if(Session::has('success'))
					<p class="text-success">{{ session('success') }}</p>
					@endif
					<h4 class="card-title mb-5"><b class="text-primary">{{ $item->name }}</b></h4>
					<form class="form-sample" action="{{ url('pemilik/data-penyewa') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nama Lengkap</b></label>
										<input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama" autocomplete="off" required value="{{ $item->name }}" disabled/>
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
									<label class="col-form-label"><b>Email Address</b></label>
									<input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" autocomplete="off" required value="{{ $item->email }}" disabled/>
										@error('email')
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
									<label class="col-form-label"><b>Tempat Lahir</b></label>
										<input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Masukkan Tempat Lahir" autocomplete="off" required value="{{ $item->tempat_lahir }}" disabled/>
										@error('tempat_lahir')
											{{-- untuk info yang salah yang mana --}}
											<div class="invalid-feedback">
											{{ $message }}
											</div>            
										@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Tanggal Lahir</b></label>
										<input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" autocomplete="off" required value="{{ $item->tanggal_lahir }}" disabled/>
										@error('tanggal_lahir')
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
									<label class="col-form-label" ><b>Role</b></label>
									<input name="role" id="role" type="text" class="form-control @error('role') is-invalid @enderror" autocomplete="off" required value="{{ $item->role }}" disabled/>
										@error('role')
											{{-- untuk info yang salah yang mana --}}
											<div class="invalid-feedback">
											{{ $message }}
											</div>            
										@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Status Akun</b></label>
									<input name="status_akun" id="status_akun" type="text" class="form-control @error('status_akun') is-invalid @enderror" autocomplete="off" required value="{{ $item->status_akun }}" disabled/>
										@error('status_akun')
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
									<label class="col-form-label"><b>Alamat</b></label>
									<textarea name="alamat" id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Jl. xxxxx No.xx RT/RW xx/xx" autocomplete="off" required disabled>{{ $item->alamat }}</textarea>
									@error('alamat')
										{{-- untuk info yang salah yang mana --}}
										<div class="invalid-feedback">
										{{ $message }}
										</div>            
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nomor Handphone</b></label>
									<input name="hp" id="hp" type="text" class="form-control @error('hp') is-invalid @enderror" placeholder="0821xxxxxx73" autocomplete="off" required value="{{ $item->hp }}" disabled/>
									@error('hp')
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
									<label class="col-form-label"><b>Nama Wali</b></label>
									<input name="wali" id="wali" type="text" class="form-control @error('wali') is-invalid @enderror" placeholder="Masukkan Nama Wali" autocomplete="off" required value="{{ $item->wali }}" disabled/>
									@error('wali')
										{{-- untuk info yang salah yang mana --}}
										<div class="invalid-feedback">
										{{ $message }}
										</div>            
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nomor Handphone Wali</b></label>
									<input name="hp2" id="hp2" type="text" class="form-control @error('hp2') is-invalid @enderror" placeholder="0821xxxxxx73" autocomplete="off" required value="{{ $item->hp2 }}" disabled/>
									@error('hp2')
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
									<label class="col-form-label"><b>Password</b></label>
										<input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Min. 8" required value="{{ $item->password }}" autocomplete="off" disabled/>
										@error('password')
											{{-- untuk info yang salah yang mana --}}
											<div class="invalid-feedback">
											{{ $message }}
											</div>            
										@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Id Telegram</b></label>
									<input name="id_telegram" id="id_telegram" type="text" class="form-control @error('id_telegram') is-invalid @enderror" placeholder="Masukkan Id Telegram" autocomplete="off" required value="{{ $item->id_telegram }}" disabled/>
									@error('id_telegram')
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
									<label class="col-form-label"><b>Mac Address</b></label>
									<input name="mac_addr" id="mac_addr" type="text" class="form-control" placeholder="00-B0-xx-xx-xx-26" autocomplete="off" value="{{ $item->mac_addr }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Tipe Kamar</b></label>
									<input name="tipekamar" id="tipekamar" type="text" class="form-control" disabled required value="{{ $namaTipe->name }}"/>
								</div>
							</div>
						</div>	

						<div class="row">							
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nomor Kamar</b></label>
									<input name="nomor_kamar" id="nomor_kamar" type="text" class="form-control" value="{{ $kamar->kamar->nomor_kamar }} " disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Harga Kamar</b></label>
									<input name="hargakamar" id="hargakamar" type="text" class="form-control" disabled required value="{{ $kamar->kamar->harga }}"/>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>KTP</b></label>
										<div class="mt-2 justify-content-center">
											@if ($item->dokumen != null)
												<img src="{{ asset('storage/'. $item->dokumen) }}" class="img-fluid" id="preview-image">
											@else
												<img src="" class="img-fluid" id="preview-image">
											@endif
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
											<input type="checkbox" class="form-check-input select-all-checkbox" id="select-all" disabled> Pilih Semua
										</label></b>
									</div>
								</div>
						
								{{-- Membuat checkbox untuk setiap fasilitas --}}
								@foreach (['Listrik', 'Air', 'Wifi', 'Tempat Tidur', 'Kasur', 'Lemari', 'Meja Belajar', 'Kursi Belajar', 'Kipas Angin', 'Kloset Kamar Mandi', 'Keran', 'Shower'] as $fasilitas)
									<div class="col-md-6">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input" name="fasilitas[]" value="{{ $fasilitas }}" @if (in_array($fasilitas, explode(',', $item->fasilitas))) checked @else disabled @endif> {{ $fasilitas }}
											</label>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</form>
				</div>
            </div>
          </div>

    </div>
</div>
<!-- /.container-fluid -->

@endsection