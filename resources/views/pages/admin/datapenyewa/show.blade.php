@extends('layouts.app')

@section('title', 'Detail Data Penghuni')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
		<div class="card-header">
			<h3 class="m-0 font-weight-bold mt-3">Detail Data Penghuni
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
					<form class="form-sample" action="{{ url('pemilik/data-penyewa') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nama Lengkap</b></label>
										<input name="name" id="name" type="text" class="form-control" placeholder="Masukkan Nama" autocomplete="off" required value="{{ $penghuni->user->name }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Tipe Kamar</b></label>
									<input name="tipekamar" id="tipekamar" type="text" class="form-control" disabled required value="{{ $penghuni->kamar->type->name }}" />
								</div>
							</div>							
						</div>
						<div class="row">							
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nomor Kamar</b></label>
									<input name="nomor_kamar" id="nomor_kamar" type="text" class="form-control" value="{{ $penghuni->kamar->nomor_kamar }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Harga Kamar</b></label>
									<input name="harga_kamar" id="harga_kamar" type="text" class="form-control" disabled value="{{ $penghuni->kamar->harga }}"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Email Address</b></label>
									<input name="email" id="email" type="email" class="form-control" placeholder="Masukkan Email" autocomplete="off" required value="{{ $penghuni->user->email }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Tempat Lahir</b></label>
										<input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" placeholder="Masukkan Tempat Lahir" autocomplete="off" required value="{{ $penghuni->user->tempat_lahir }}" disabled/>
								</div>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Tanggal Lahir</b></label>
										<input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control" autocomplete="off" required value="{{ $penghuni->user->tanggal_lahir }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label" ><b>Role</b></label>
									<input name="role" id="role" type="text" class="form-control" autocomplete="off" required value="{{ $penghuni->user->role }}" disabled/>
								</div>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Status Akun</b></label>
									<input name="status_akun" id="status_akun" type="text" class="form-control" autocomplete="off" required value="{{ $penghuni->user->status_akun }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Alamat</b></label>
									<textarea name="alamat" id="alamat" type="text" class="form-control" placeholder="Jl. xxxxx No.xx RT/RW xx/xx" autocomplete="off" required disabled>{{ $penghuni->user->alamat }}</textarea>
								</div>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nomor Handphone</b></label>
									<input name="hp" id="hp" type="text" class="form-control" placeholder="0821xxxxxx73" autocomplete="off" required value="{{ $penghuni->user->hp }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nama Wali</b></label>
									<input name="wali" id="wali" type="text" class="form-control" placeholder="Masukkan Nama Wali" autocomplete="off" required value="{{ $penghuni->user->wali }}" disabled/>
								</div>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Nomor Handphone Wali</b></label>
									<input name="hp2" id="hp2" type="text" class="form-control" placeholder="0821xxxxxx73" autocomplete="off" required value="{{ $penghuni->user->hp2 }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Password</b></label>
										<input name="password" id="password" type="password" class="form-control" placeholder="Password Min. 8" required value="{{ $penghuni->user->password }}" autocomplete="off" disabled/>
								</div>
							</div>							
						</div>
						<div class="row">		
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Id Telegram</b></label>
									<input name="id_telegram" id="id_telegram" type="text" class="form-control" placeholder="Masukkan Id Telegram" autocomplete="off" required value="{{ $penghuni->user->id_telegram }}" disabled/>
								</div>
							</div>					
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Mac Address</b></label>
									<input name="mac_addr" id="mac_addr" type="text" class="form-control" placeholder="00-B0-xx-xx-xx-26" autocomplete="off" value="{{ $penghuni->user->mac_addr }}" disabled/>
								</div>
							</div>							
						</div>	
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>KTP</b></label>
										<div class="mt-2 justify-content-center">
											@if ($penghuni->user->dokumen != null)
												<img src="{{ asset('storage/'. $penghuni->user->dokumen) }}" class="img-fluid" id="preview-image" width="350px">
											@else
												{{--  <img src="" class="img-fluid" id="preview-image">  --}}
												<p><b>Tidak ada file KTP</b></p>
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
												<input type="checkbox" class="form-check-input" name="fasilitas[]" value="{{ $fasilitas }}" @if (in_array($fasilitas, explode(',', $penghuni->user->fasilitas))) checked @endif disabled> {{ $fasilitas }}
												{{--  @else disabled  --}}
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