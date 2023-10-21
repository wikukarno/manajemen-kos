@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row" style="margin-left: 1px; margin-right:1px">
	@if($item->fasilitas == null)
	<div class="alert alert-warning" role="alert">
		<h4 class="alert-heading">Selamat datang <b>{{ Auth::user()->name }}</b></h4>
		<hr>
		<p>Lengkapi data untuk kamar anda, isi fasilitas yang akan anda pakai selama di kos ini. <a href="{{ route('fasilitas-penghuni.index') }}" class="alert-link">Lengkapi di sini</a></p>
		<p class="mb-0"></p>
	</div>
  @endif
</div>

<div class="row">
	<div class="col-md-4 stretch-card grid-margin">
		<div class="card bg-gradient-danger card-img-holder text-white">
			<div class="card-body">
				<img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
				<h4 class="font-weight-normal mb-3">
				Jumlah Transaksi
				<i class="mdi mdi-chart-line mdi-24px float-right"></i>
				</h4>
				<h2 class="mb-5">Rp. {{ $jumlahTransaksi }}</h2>
			</div>
		</div>
	</div>

	<div class="col-md-4 stretch-card grid-margin">
		<div class="card bg-gradient-info card-img-holder text-white">
			<div class="card-body">
				<img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
				<h4 class="font-weight-normal mb-3">
				Total Transaksi
				<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
				</h4>
				<h2 class="mb-5">{{ $totalTransaksi }}</h2>
			</div>
		</div>
	</div>
</div>

@endsection