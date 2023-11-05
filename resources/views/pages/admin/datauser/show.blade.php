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
					<h4 class="card-title mb-5">User <b class="text-primary">{{ $item->name }}</b></h4>
					<form class="form-sample" action="{{ url('pemilik/data-user') }}" method="POST">
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
									<label class="col-form-label" ><b>Role</b></label>
									<input name="role" id="role" type="role" class="form-control @error('role') is-invalid @enderror" autocomplete="off" required value="{{ $item->role }}" disabled/>
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
									<input name="status_akun" id="status_akun" type="status_akun" class="form-control @error('status_akun') is-invalid @enderror" autocomplete="off" required value="{{ $item->status_akun }}" disabled/>
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
									<label class="col-form-label"><b>Nomor Handphone</b></label>
									<input name="hp" id="hp" type="text" class="form-control @error('hp') is-invalid @enderror" placeholder="0821xxxxxx73" autocomplete="off" required value="{{ $item->hp }}" disabled/>
								</div>
							</div>
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
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Alasan Penolakan</b></label>
									{{--  <input type="text-area" class="form-control" placeholder="Masukkan Alasan Penolakan"/>  --}}
									<td><textarea name="alasan_penolakan" id="alasan_penolakan" class="form-control" placeholder="Masukkan Alasan Penolakan" autocomplete="off" disabled>{{ $item->alasan_penolakan }}</textarea><p style="font-size: 10px"><b>Catatan : </b> Max:255 karakter. Diisi jika status akun di tolak</p></td>
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