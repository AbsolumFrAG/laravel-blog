<!-- Navbar -->
<nav class="main-header navbar navbar-expand {{config('lte3.view.dark_mode') ? 'dark-mode' : 'navbar-white navbar-light'}}">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>

        @auth
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user mr-1" aria-hidden="true"></i>
                    <span class="d-none d-md-inline">{{ Lte3::user('name') }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="/admin/users/{{ Lte3::user('id') }}" class="dropdown-item">Profil</a>
                    <div class="dropdown-divider"></div>
                    <a href="/logout" class="dropdown-item js-click-submit"
                       data-confirm="Logout?">Se déconnecter</a>
                </ul>
            </li>
        @else
            <li class="nav-item">
                <a href="/logout" class="nav-link js-click-submit" data-confirm="Se déconnecter ?" role="button">
                    <i class="fa fa-sign-out-alt"></i>
                </a>
            </li>
        @endauth
    </ul>
</nav>
<!-- /.navbar -->
