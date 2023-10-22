@extends('layouts.app')

@section('title', 'Detail Data User')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
		<div class="card-header">
			<h3 class="m-0 font-weight-bold mt-3">Detail Data User
				<a href="{{ url('pemilik/data-user') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
			</h3>
		</div>

        <div class="col-12">
            <div class="card">
				<div class="card-body">
					@if(Session::has('success'))
					<p class="text-success">{{ session('success') }}</p>
					@endif
					<h4 class="card-title mb-5">Data User <b class="text-primary">{{ $item->name }}</b></h4>
					<form class="form-sample" action="{{ url('pemilik/data-user') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label"><b>Nama Lengkap</b></label>
									<div class="col-sm-9 mt-3">
										{{--  <input name="name" id="name" type="text" class="form-control" placeholder="Masukkan Nama"/>  --}}
										<td> {{ $item->name }} </td>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label"><b>Email Address</b></label>
									<div class="col-sm-9 mt-3">
										{{--  <input name="email" id="email" type="email" class="form-control" placeholder="Masukkan Email"/>  --}}
										<td> {{ $item->email }} </td>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label"><b>Role</b></label>
									<div class="col-sm-9 mt-3">
										{{--  <select class="form-control" name="role" id="role">
											<option value="">Pilih</option>
											<option value="Pemilik">Pemilik</option>
											<option value="Pendaftar">Pendaftar</option>
											<option value="Penghuni">Penghuni</option>
										</select>  --}}
										<td> {{ $item->role }} </td>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label"><b>Status Akun</b></label>
									<div class="col-sm-9 mt-3">
										{{--  <select class="form-control" name="status_akun" id="status_akun">
											<option value="">Pilih</option>
											<option value="Terverifikasi">Terverifikasi</option>
											<option value="Belum Verifikasi">Tidak Terverifikasi</option>
											<option value="Diblokir">Ditolak</option>
										</select>  --}}
										<td> {{ $item->status_akun }} </td>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label"><b>Nomor Handphone</b></label>
									<div class="col-sm-9 mt-3">
										{{--  <input name="hp" id="hp" type="text" class="form-control" placeholder="0821xxxxxx73"/>  --}}
										<td> {{ $item->hp }} </td>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-sm-3 col-form-label"><b>Alasan Penolakan</b></label>
									<div class="col-sm-9 mt-3">
										{{--  <input type="text-area" class="form-control" placeholder="Masukkan Alasan Penolakan"/>  --}}
										{{--  <td><textarea name="alasan_penolakan" id="alasan_penolakan" class="form-control" placeholder="Masukkan Alasan Penolakan"></textarea></td>  --}}
										<td> {{ $item->alasan_penolakan }} </td>
									</div>
								</div>
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