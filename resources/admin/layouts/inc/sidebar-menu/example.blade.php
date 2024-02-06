<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column js-activeable" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ (request()->is('admin/users*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>Utilisateur</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link {{ (request()->is('admin/post*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-circle"></i>
                <p>Post</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-circle"></i>
                <p>Catégorie</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.tag.index') }}" class="nav-link {{ (request()->is('admin/tag*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-circle"></i>
                <p>Tag</p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
