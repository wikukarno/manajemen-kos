@extends('layouts.app')

@section('title', 'Edit Tipe Kamar')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
		<div class="card-header">
			<h3 class="m-0 font-weight-bold mt-3">Edit Tipe Kamar
				<a href="{{ url('pemilik/tipe-kamar') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
			</h3>
		</div>

		<div class="col-12">
			<div class="card">
			<div class="card-body">
				@if(Session::has('success'))
				<p class="text-success">{{ session('success') }}</p>
				@endif
				<h4 class="card-title mb-5">Tipe Kamar <b class="text-primary">{{ $item->name }}</b></h4>
				<form class="form-sample" action="{{ route('tipe-kamar.update', $item->id) }}" method="POST">
					@csrf
					@method('put')
					<div class="card">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name"><b>Nama Tipe Kamar</b></label>
									<input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Tipe Kamar" autocomplete="off" required value="{{ $item->name }}"/>
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
									<label for="slug" class="form-label"><b>Slug</b></label>
									<input name="slug" id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Masukkan Slug" autocomplete="off" required value="{{ $item->slug }}" disabled/>
										@error('slug')
										{{-- untuk info yang salah yang mana --}}
										<div class="invalid-feedback">
											{{ $message }}
										</div>            
										@enderror
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="detail"><b>Detail</b></label>
							<input name="detail" id="detail" type="text" class="form-control @error('detail') is-invalid @enderror" placeholder="Masukkan Detail Kamar" autocomplete="off" required value="{{ $item->detail }}"/>
								@error('detail')
								{{-- untuk info yang salah yang mana --}}
								<div class="invalid-feedback">
								{{ $message }}
								</div>            
								@enderror
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="harga" class="form-label"><b>Harga</b></label>
									<input name="harga" id="harga" type="text" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga" autocomplete="off" required value="{{ $item->harga }}"/>
										@error('harga')
										{{-- untuk info yang salah yang mana --}}
										<div class="invalid-feedback">
											{{ $message }}
										</div>            
										@enderror
								</div>
							</div>
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