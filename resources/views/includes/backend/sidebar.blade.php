<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item nav-profile">
			<a href="#" class="nav-link">
				<div class="nav-profile-image">
					@if (Auth::user()->profil == null)
						<img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image" />
						@else
						<img src="{{ Storage::url($item->profil) }}" alt="image" />
						<span class="login-status online"></span>
					@endif
				</div>
				<div class="nav-profile-text d-flex flex-column">
					<span class="font-weight-bold mb-2">{{ Auth::user()->name ?? '' }}</span>
					<span class="text-secondary text-small">{{ Auth::user()->role ?? '' }} | {{ Auth::user()->status_akun ?? '' }}</span>
				</div>
				{{--  <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>  --}}
			</a>
		</li>


		@if (Auth::user()->role == 'Pemilik')
		<li class="nav-item {{ (request()->is('pemilik/dashboard') ? 'active' : '') }}">
			<a class="nav-link"
				href="/pemilik/dashboard">
				<span class="menu-title">Dashboard</span>
				<i class="mdi mdi-home menu-icon"></i>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link"
				{{--  href="{{ route('admin.dashboard') }}">  --}}
				<span class="menu-title">Data Kamar</span>
				<i class="mdi mdi-hotel menu-icon"></i>
			</a>
		</li>
		{{--  akses link  --}}
		<li class="nav-item {{ (request()->is('pemilik/data-user*') ? 'active' : '') }} ">
			<a class="nav-link"
				href="/pemilik/data-user">
				<span class="menu-title">Data User</span>
				<i class="mdi mdi-book menu-icon"></i>
			</a>
		</li>
		<li class="nav-item {{ (request()->is('pemilik/data-penyewa*') ? 'active' : '') }}">
			<a class="nav-link"
				href="/pemilik/data-penyewa">
				<span class="menu-title">Data Penyewa</span>
				<i class="mdi mdi-book menu-icon"></i>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link"
				{{--  href="{{ route('admin.dashboard') }}">  --}}
				<span class="menu-title">Pembayaran</span>
				<i class="mdi mdi-cash-multiple menu-icon"></i>
			</a>
		</li>
		<li class="nav-item sidebar-actions">
			<span class="nav-link d-grid">
				<form action="{{ route('logout') }}" method="POST">
					@csrf
					<button type="submit" class="btn btn-block col btn-lg btn-gradient-primary mt-4">
						Keluar
					</button>
				</form>
			</span>
		</li>
		@endif

		@if (Auth::user()->role == 'Pendaftar')
			<li class="nav-item {{ (request()->is('user/dashboard') ? 'active' : '') }}">
			<a class="nav-link"
				href="{{ route('user.dashboard') }}">
				<span class="menu-title">Dashboard</span>
				<i class="mdi mdi-home menu-icon"></i>
			</a>
			</li>
			<li class="nav-item {{ (request()->is('user/dashboard') ? 'active' : '') }}">
			<a class="nav-link"
				href="{{ route('user.dashboard') }}">
				<span class="menu-title">Tipe Kamar</span>
				<i class="mdi mdi-table menu-icon"></i>
			</a>
			</li>
			<li class="nav-item {{ (request()->is('user/dashboard') ? 'active' : '') }}">
			<a class="nav-link"
				href="{{ route('user.dashboard') }}">
				<span class="menu-title">Nomor Kamar</span>
				<i class="mdi mdi-format-list-bulleted menu-icon"></i>
			</a>
			</li>
			<li class="nav-item sidebar-actions">
			<span class="nav-link d-grid">
				<form action="{{ route('logout') }}" method="POST">
				@csrf
				<button type="submit" class="btn btn-block col btn-lg btn-gradient-primary mt-4">
					Keluar
				</button>
				</form>
			</span>
			</li>
		@endif

		@if (Auth::user()->role == 'Penghuni')
			<li class="nav-item {{ (request()->is('penghuni/dashboard') ? 'active' : '') }}">
			<a class="nav-link"
				href="{{ route('penghuni.dashboard') }}">
				<span class="menu-title">Dashboard</span>
				<i class="mdi mdi-home menu-icon"></i>
			</a>
			</li>
			<li class="nav-item {{ (request()->is('penghuni/form-penghuni*') ? 'active' : '') }}">
			<a class="nav-link"
				href="{{ route('form-penghuni.index') }}">
				<span class="menu-title">Form</span>
				<i class="mdi mdi-file-document-box menu-icon"></i>
			</a>
			</li>
			@if(Auth::user()->status_akun == 'Belum Verifikasi')
			<li class="nav-item {{ (request()->is('penghuni/form-permintaan-penghuni*') ? 'active' : '') }}">
			<a class="nav-link"
				href="{{ route('form-permintaan-penghuni.index') }}">
				<span class="menu-title">Fasilitas Kamar</span>
				<i class="mdi mdi-book menu-icon"></i>
			</a>
			</li>
			@endif
			<li class="nav-item {{ (request()->is('penghuni/form-pembayaran-penghuni') ? 'active' : '') }}">
			<a class="nav-link"
				href="{{ route('form-pembayaran-penghuni.index') }}">
				<span class="menu-title">Pembayaran</span>
				<i class="mdi mdi-cash-multiple menu-icon"></i>
			</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
					href="/">
					<span class="menu-title">Halaman Utama</span>
					<i class="mdi mdi-format-list-bulleted menu-icon"></i>
				</a>
				</li>
			<li class="nav-item sidebar-actions">
			<span class="nav-link d-grid">
				<form action="{{ route('logout') }}" method="POST">
				@csrf
				<button type="submit" class="btn btn-block col btn-lg btn-gradient-dark mt-4">
					Keluar
				</button>
				</form>
			</span>
			</li>
		@endif


	</ul>
</nav>