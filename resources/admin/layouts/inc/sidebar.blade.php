<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url(config('lte3.dashboard_slug')) }}" class="brand-link d-flex align-items-center">
        <div class="brand-image img-circle"><i class="fas fa-cubes"></i></div>
        <span class="brand-text">{!! config('lte3.logo') !!}</span>
    </a>

    <div class="sidebar">
        @include('admin.layouts.inc.sidebar-menu.example')
    </div>
</aside>
