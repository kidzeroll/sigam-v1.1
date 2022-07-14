<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">
                <img alt="image" src="{{ asset('storage/' . $gampong->logo) }}" class="header-logo" />
                <span class="logo-name">{{ config('app.name') }}</span>
            </a>
        </div>

        <ul class="sidebar-menu">

            <li class="menu-header">Main</li>

            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!--penduduk-->
            <li class="{{ request()->is('penduduk') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('penduduk.index') }}">
                    <i class="fas fa-address-book"></i>
                    <span>Penduduk</span>
                </a>
            </li>


            <!--kelahiran-->
            <li class="{{ request()->is('kelahiran') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kelahiran.index') }}">
                    <i class="fas fa-child"></i>
                    <span>Data Kelahiran</span>
                </a>
            </li>

            <!--pendatang-->
            <li class="{{ request()->is('pendatang') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pendatang.index') }}">
                    <i class="fas fa-diagnoses"></i>
                    <span>Data Pendatang</span>
                </a>
            </li>

            <!--pindah-->
            <li class="{{ request()->is('pindah') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pindah.index') }}">
                    <i class="fas fa-route"></i>
                    <span>Data Perpindahan</span>
                </a>
            </li>

            <!-- untuk admin -->
            @can('isAdmin')
                <li class="menu-header">Admin</li>

                <!--profil gampong-->
                <li class="{{ request()->is('admin/profil-gampong') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('profil-gampong.index') }}">
                        <i class="fab fa-magento"></i>
                        <span>Profil Gampong</span>
                    </a>
                </li>

                <!--user-->
                <li class="{{ request()->is('admin/user') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="fas fa-user"></i>
                        <span>Kelola User</span>
                    </a>
                </li>

                <!--agama-->
                <li class="{{ request()->is('admin/agama') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('agama.index') }}">
                        <i class="fas fa-moon"></i>
                        <span>Kelola Agama</span>
                    </a>
                </li>

                <!--pendidikan-->
                <li class="{{ request()->is('admin/pendidikan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pendidikan.index') }}">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Kelola Pendidikan</span>
                    </a>
                </li>

                <!--pekerjaan-->
                <li class="{{ request()->is('admin/pekerjaan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pekerjaan.index') }}">
                        <i class="fab fa-google-play"></i>
                        <span>Kelola Pekerjaan</span>
                    </a>
                </li>

                <!--dusun-->
                <li class="{{ request()->is('admin/dusun') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dusun.index') }}">
                        <i class="fas fa-road"></i>
                        <span>Kelola Dusun</span>
                    </a>
                </li>
            @endcan

        </ul>
    </aside>
</div>
