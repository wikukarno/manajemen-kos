<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
		<a class="navbar-brand brand-logo" href="/">
			<img src="#" style="max-height: 50px !important" alt="logo" />
		</a>
		<a class="navbar-brand brand-logo-mini" href="/">
			<img src="#"
				style="max-height: 50px" alt="logo" />
		</a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-stretch">
		<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
			<span class="mdi mdi-menu"></span>
		</button>
		<div class="search-field d-none d-md-block">
		</div>
		<ul class="navbar-nav navbar-nav-right">
			<li class="nav-item nav-profile dropdown">
				<a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
					aria-expanded="false">
					<div class="nav-profile-img">
						@if($item->profil != null)
							<img src="{{ Storage::url($item->profil) }}" alt="image"/>
						@else
							<img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image" />
						@endif
						{{-- @if (Auth::user()->foto_profile == null)
							<img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="image" />
						@else
							<img src="{{ Storage::url(Auth::user()->foto_profile) }}" alt="image" />
						@endif --}}
						<span class="availability-status online"></span>
					</div>
					<div class="nav-profile-text">
						<p class="mb-1 text-black">{{ Auth::user()->name ?? '' }}</p>
					</div>
				</a>
				<div class="dropdown-menu navbar-dropdown dropdown-menu-lg-end" aria-labelledby="profileDropdown">
					@if (Auth::user()->role == 'Penghuni')
					<a class="dropdown-item" href="{{ route('akun-penghuni.index') }}">
						<i class="fas fa-user me-2 text-success"></i> Akun
					</a>
					@elseif(Auth::user()->role == 'Pendaftar')
					<a class="dropdown-item" href="{{ route('akun.user') }}">
						<i class="fas fa-user me-2 text-success"></i> Akun
					</a>
					@else(Auth::user()->role == 'Pemilik')
					<a class="dropdown-item" href="{{ route('akun.admin') }}">
						<i class="fas fa-user me-2 text-success"></i> Akun
					</a>
					@endif
					<a class="dropdown-item" href="#">
						<form action="{{route('logout')}}" method="post">
							@csrf
							<button class="btn btn-primary" type="submit"><i class="mdi mdi-logout me-2 text-white"></i>
								Keluar</button>
						</form>
					</a>
				</div>
			</li>
		</ul>
		<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
			data-toggle="offcanvas">
			<span class="mdi mdi-menu"></span>
		</button>
	</div>
</nav>