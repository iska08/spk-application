<div class="navbar navbar-light bg-transparent navbar-static">
	<div class="navbar-brand flex-fill wmin-0">
		<a href="/dashboard" class="d-inline-block">
			<img src="images/logo.png" class="sidebar-resize-show" alt="">
		</a>
	</div>
	<ul class="navbar-nav align-self-center ml-auto sidebar-resize-hide">
		<li class="nav-item dropdown">
			<button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
				<i class="icon-transmission"></i>
			</button>
			<button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-mobile-main-toggle d-lg-none">
				<i class="icon-cross2"></i>
			</button>
		</li>
	</ul>
</div>

<div class="sidebar-content">
	<div class="sidebar-section sidebar-section-body user-menu-vertical text-center">
		<div class="card-img-actions d-inline-block">
			<img class="img-fluid rounded-circle" src="/images/logo.png" width="80" height="80" alt="">
			<h6 class="font-weight-semibold mb-0">{{ auth()->user()->name }}</h6>
			<span class="d-block text-muted">{{ auth()->user()->email }}</span>
		</div>
	</div>
	<div class="sidebar-section">
		<ul class="nav nav-sidebar" data-nav-type="accordion">
			<li class="nav-item">
				<a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
					<i class="icon-home4"></i>
					<span>
						Dashboard
					</span>
				</a>
			</li>
			<li class="nav-item nav-item-submenu">
				<a class="nav-link"><i class="icon-copy"></i> <span>USER</span></a>
				<ul class="nav nav-group-sub" data-submenu-title="Layouts">
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/profile') ? 'active' : '' }}" href="/dashboard/profile">Profil Saya</a></li>
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/criteria-comparisons*') ? 'active' : '' }}" href="/dashboard/criteria-comparisons">Perbandingan Kriteria</a></li>
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/final-ranking*') ? 'active' : '' }}" href="/dashboard/final-ranking">Final Rank</a></li>
				</ul>
			</li>
			@can('admin')
			<li class="nav-item nav-item-submenu">
				<a class="nav-link"><i class="icon-copy"></i> <span>ADMINISTRATOR</span></a>
				<ul class="nav nav-group-sub" data-submenu-title="Layouts">
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/tourism-objects*') ? 'active' : '' }}" href="/dashboard/tourism-objects">Nama Alternatif</a></li>
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/criterias*') ? 'active' : '' }}" href="/dashboard/criterias">Kriteria</a></li>
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/alternatives*') ? 'active' : '' }}" href="/dashboard/alternatives">Bobot Alternatif</a></li>
					@can('viewAny', App\Models\User::class)
					<li class="nav-item"><a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">Manajemen User</a></li>
					@endcan
				</ul>
			</li>
			@endcan
		</ul>
	</div>
	<div class="d-grid gap-2">
		<ul class="nav-item">
			<form id="logout-form" action="{{ url ('/signout')}}" method="GET">
				<button class="nav-link" type="submit">
					{{ __('Logout') }}
				</button>
			</form>
		</ul>
	</div>
</div>