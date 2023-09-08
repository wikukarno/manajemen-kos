<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item nav-profile">
			<a href="#" class="nav-link">
				<div class="nav-profile-image">
					{{-- @if (Auth::user()->foto_profile == null)
						<img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image" />
						@else
						<img src="{{ Storage::url(Auth::user()->foto_profile) }}" alt="image" />
						<span class="login-status online"></span>
					@endif --}}
				</div>
				<div class="nav-profile-text d-flex flex-column">
					<span class="font-weight-bold mb-2">{{ Auth::user()->name ?? '' }}</span>
					<span class="text-secondary text-small">{{ Auth::user()->role ?? '' }}</span>
				</div>
				<i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
			</a>
		</li>


		@if (Auth::user()->role == 'Penghuni')
		<li class="nav-item">
			<a class="nav-link {{ (request()->is('penghuni/dashboard') ? 'active' : '') }}"
				href="{{ route('penghuni.dashboard') }}">
				<span class="menu-title">Dashboard</span>
				<i class="mdi mdi-home menu-icon"></i>
			</a>
			<a class="nav-link {{ (request()->is('penghuni/dashboard') ? 'active' : '') }}"
				href="{{ route('penghuni.dashboard') }}">
				<span class="menu-title">Form</span>
				<i class="mdi mdi-file-document-box menu-icon"></i>
			</a>
			<a class="nav-link {{ (request()->is('penghuni/dashboard') ? 'active' : '') }}"
				href="{{ route('penghuni.dashboard') }}">
				<span class="menu-title">Pembayaran</span>
				<i class="mdi mdi-book menu-icon"></i>
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


		@if (Auth::user()->role == 'Pemilik')
		<li class="nav-item">
			<a class="nav-link {{ (request()->is('admin/dashboard') ? 'active' : '') }}"
				href="{{ route('admin.dashboard') }}">
				<span class="menu-title">Dashboard</span>
				<i class="mdi mdi-home menu-icon"></i>
			</a>
			<a class="nav-link {{ (request()->is('admin/dashboard') ? 'active' : '') }}"
				href="{{ route('admin.dashboard') }}">
				<span class="menu-title">Form</span>
				<i class="mdi mdi-book menu-icon"></i>
			</a>
			<a class="nav-link {{ (request()->is('admin/dashboard') ? 'active' : '') }}"
				href="{{ route('admin.dashboard') }}">
				<span class="menu-title">Pembayaran</span>
				<i class="mdi mdi-book menu-icon"></i>
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
			
		<li class="nav-item">
			<a class="nav-link {{ (request()->is('user/dashboard') ? 'active' : '') }}"
				href="{{ route('user.dashboard') }}">
				<span class="menu-title">Dashboard</span>
				<i class="mdi mdi-home menu-icon"></i>
			</a>
			<a class="nav-link {{ (request()->is('user/dashboard') ? 'active' : '') }}"
				href="{{ route('user.dashboard') }}">
				<span class="menu-title">Tipe Kamar</span>
				<i class="mdi mdi-table menu-icon"></i>
			</a>
			<a class="nav-link {{ (request()->is('user/dashboard') ? 'active' : '') }}"
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

	</ul>
</nav>