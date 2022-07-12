<header id="header" class="fixed-top d-flex align-items-center {{ request()->is('/') ? 'header-transparent' : '' }}">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1 class="text-light"><a href="{{ route('home') }}"><span>{{ config('app.name') }}</span></a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>

                <li><a href="#">Berita</a></li>
                <li><a href="#">Pengaduan</a></li>
                <li><a href="#">Administrasi Surat</a></li>
                <li><a href="#">Profil Gampong</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>
