<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">

        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                    <i data-feather="align-justify"></i>
                </a>
            </li>

            <li>
                <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a>
            </li>
        </ul>

    </div>

    <ul class="navbar-nav navbar-right">

        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (auth()->user()->gender == 'P')
                    <img alt="image" src="{{ asset('avatar/female-avatar.png') }}"
                        class="user-img-radious-style rounded-circle">
                @else
                    <img alt="image" src="{{ asset('avatar/male-avatar.png') }}"
                        class="user-img-radious-style rounded-circle">
                @endif
                <span class="d-sm-none d-lg-inline-block"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right pullDown">

                <div class="dropdown-title">{{ auth()->user()->name }}</div>

                <a href="{{ route('change-password') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i>
                    Ganti Password
                </a>

                <div class="dropdown-divider"></div>

                <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>

            </div>
        </li>
    </ul>
</nav>
