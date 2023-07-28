<li class="menu-item py-2 @if (Request::is('admin/dashboard')) {{'active'}} @endif">
    <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
    </a>
</li>

<li class="menu-item py-2 {{ (request()->segment(2) == 'admins') ? 'active' : '' }}">
    <a href="{{ route('admin.admins.index') }}" class="menu-link">
        <i class="menu-icon tf-icons fa-solid fa-user-tie"></i>
        <div data-i18n="Analytics">Admins</div>
    </a>
</li>

<li class="menu-item py-2 {{ (request()->segment(2) == 'instructors') ? 'active' : '' }}">
    <a href="{{ route('admin.instructors.index') }}" class="menu-link">
        <i class="menu-icon tf-icons fa-solid fa-user-graduate"></i>
        <div data-i18n="Analytics">Instructors</div>
    </a>
</li>

<li class="menu-item py-2 {{ (request()->segment(2) == 'users') ? 'active' : '' }}">
    <a href="{{ route('admin.users.index') }}" class="menu-link">
        <i class="menu-icon tf-icons fa-solid fa-users"></i>
        <div data-i18n="Analytics">Users</div>
    </a>
</li>

<li class="menu-header small text-uppercase">
    <span class="menu-header-text">Courses</span>
</li>

<li class="menu-item py-2 {{ (request()->segment(2) == 'categories') ? 'active' : '' }}">
    <a href="{{ route('admin.categories.index') }}" class="menu-link">
        <i class="menu-icon tf-icons fa-solid fa-shapes"></i>
        <div data-i18n="Analytics">Categories</div>
    </a>
</li>

{{-- <li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Layouts</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item">
            <a href="layouts-without-menu.html" class="menu-link">
                <div data-i18n="Without menu">Without menu</div>
            </a>
        </li>
    </ul>
</li> --}}