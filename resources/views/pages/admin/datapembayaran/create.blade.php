@extends('layouts.app')

@section('title', 'Tambah Data Pembayaran')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow">
		<div class="card-header">
			<h3 class="m-0 font-weight-bold mt-3">Tambah Data Pembayaran
				<a href="{{ url('pemilik/data-pembayaran') }}" class="float-end btn btn-outline-success btn-sm mb-2" >View All</a>
			</h3>
		</div>

		<div class="col-12">
			<div class="card">
				<div class="card-body">
					@if(Session::has('success'))
					<p class="text-success">{{ session('success') }}</p>
					@endif
					<h4 class="card-title mb-5">Data Pembayaran</h4>
					<form class="form-sample" action="{{ url('pemilik/data-pembayaran') }}" method="POST">
						@csrf
						<div class="card">

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label"><b>Nama Penghuni</b></label>
										<select class="form-control @error('name') is-invalid @enderror" name="rt_name" id="name" style="height: 45px" required value="{{ old('name') }}">
											<option value="">Pilih Nama Penghuni</option>
											@foreach ($user as $u)
												<option value="{{ $u->id_user }}">{{ $u->name }}</option>
											@endforeach
										</select>
											@error('name')
											<div class="invalid-feedback">
												{{ $message }}
											</div>            
											@enderror
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label"><b>Id Tipe</b></label>
							  			<select class="form-control @error('id_tipe') is-invalid @enderror" name="id_tipe" id="id_tipe" style="height: 45px" required value="{{ old('id_tipe') }}" disabled>
											<option value="">Pilih Id Tipe</option>
											@foreach ($tipekamar as $k)
												<option value="{{ $k->id_kamar }}">{{ $k->name }}</option>
											@endforeach
										</select>
											@error('id_tipe')
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
										<label class="col-form-label"><b>Harga</b></label>
										<input name="harga_bayar" id="harga_bayar" type="text" class="form-control @error('harga_bayar') is-invalid @enderror" placeholder="Masukkan Harga" autocomplete="off" required value="{{ old('harga_bayar') }}" disabled/>
											@error('harga_bayar')
											<div class="invalid-feedback">
												{{ $message }}
											</div>            
											@enderror
											
									</div>
								</div>						

							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label"><b>Bulan</b></label>
									<select class="form-control @error('bulan') is-invalid @enderror" name="bulan" id="bulan" style="height: 45px" required value="{{ old('bulan') }}">
										<option value="">Pilih Bulan Bayar</option>
										@foreach ($bulanNames as $index => $bulan )
											<option name="bulan" value="{{ $index + 1 }}">{{ $bulan }}</option>
										@endforeach
									</select>
										@error('bulan')
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
								<label class="col-form-label"><b>Tahun</b></label>
								<input name="tahun" id="tahun" type="text" class="form-control" placeholder="Masukkan Tahun Bayar" autocomplete="off" required value="{{ $tahun }}" disabled/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Tanggal Bayar</b></label>
								<input name="tanggal" id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Masukkan Tanggal Bayar" autocomplete="off" required value="{{ old('tanggal') }}"/>
									@error('id_tipe')
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
								<label class="col-form-label"><b>Bukti</b></label>
								<input name="bukti_bayar" id="bukti_bayar" type="file" class="form-control @error('bukti_bayar') is-invalid @enderror" placeholder="Masukkan Bukti Bayar" autocomplete="off" value="{{ old('bukti_bayar') }}"/>
									@error('bukti_bayar')
									{{-- untuk info yang salah yang mana --}}
									<div class="invalid-feedback">
										{{ $message }}
									</div>            
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Tanggal Validasi</b></label>
								<input name="tanggal_validasi" id="tanggal_validasi" type="date" class="form-control @error('tanggal_validasi') is-invalid @enderror" placeholder="Masukkan tanggal_validasi Bayar" autocomplete="off" required value="{{ old('tanggal_validasi') }}"/>
									@error('id_tipe')
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
								<label class="col-form-label"><b>Status</b></label>
								<select class="form-control @error('status') is-invalid @enderror" name="status" id="status" style="height: 45px" required value="{{ old('status') }}">
									<option value="">Pilih Status</option>
									<option value="unggah_bukti_bayar">Unggah Bukti Bayar</option>
									<option value="menunggu_Validasi">Menunggu Validasi</option>
									<option value="belum_lunas">Belum Lunas</option>
									<option value="lunas">Lunas</option>
								</select>
									@error('status')
									{{-- untuk info yang salah yang mana --}}
									<div class="invalid-feedback">
										{{ $message }}
									</div>            
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="col-form-label"><b>Keterangan</b></label>
								<td><textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan Keterangan" autocomplete="off" value="{{ old('keterangan') }}"></textarea><p style="font-size: 10px"><b>Catatan : </b> Max:255 karakter. Diisi jika ada pesan yang ingin di konfirmasi ke penghuni</p></td>
									@error('keterangan')
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

@push('after-script')

@endpush