@if(auth()->guard('admin')->user()->can('view-dashboard'))
    <li class="menu-item py-2 @if (Request::is('admin/dashboard')) {{'active'}} @endif">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
@endif

@if(auth()->guard('admin')->user()->can('view-admin'))
    <li class="menu-item py-2 {{ (request()->segment(2) == 'admins') ? 'active' : '' }}">
        <a href="{{ route('admin.admins.index') }}" class="menu-link">
            <i class="menu-icon tf-icons fa-solid fa-user-tie"></i>
            <div data-i18n="Analytics">Admins</div>
        </a>
    </li>
@endif

@if(auth()->guard('admin')->user()->can('view-role'))
    <li class="menu-item py-2 {{ (request()->segment(2) == 'roles') ? 'active' : '' }}">
        <a href="{{ route('admin.roles.index') }}" class="menu-link">
            <i class="menu-icon tf-icons fa-solid fa-user-tie"></i>
            <div data-i18n="Analytics">Roles</div>
        </a>
    </li>
@endif

@if(auth()->guard('admin')->user()->can('view-instructor'))
    <li class="menu-item py-2 {{ (request()->segment(2) == 'instructors') ? 'active' : '' }}">
        <a href="{{ route('admin.instructors.index') }}" class="menu-link">
            <i class="menu-icon tf-icons fa-solid fa-user-graduate"></i>
            <div data-i18n="Analytics">Instructors</div>
        </a>
    </li>
@endif

@if(auth()->guard('admin')->user()->can('view-user'))
    <li class="menu-item py-2 {{ (request()->segment(2) == 'users') ? 'active' : '' }}">
        <a href="{{ route('admin.users.index') }}" class="menu-link">
            <i class="menu-icon tf-icons fa-solid fa-users"></i>
            <div data-i18n="Analytics">Users</div>
        </a>
    </li>
@endif

<li class="menu-header small text-uppercase">
    <span class="menu-header-text">Courses</span>
</li>

@if(auth()->guard('admin')->user()->can('view-course'))
    <li class="menu-item py-2 {{ (request()->segment(2) == 'courses') ? 'active' : '' }}">
        <a href="{{ route('admin.courses.index') }}" class="menu-link">
            <i class="menu-icon tf-icons fa-solid fa-book"></i>
            <div data-i18n="Analytics">Courses</div>
        </a>
    </li>
@endif

@if(auth()->guard('admin')->user()->can('view-category'))
    <li class="menu-item py-2 {{ (request()->segment(2) == 'categories') ? 'active' : '' }}">
        <a href="{{ route('admin.categories.index') }}" class="menu-link">
            <i class="menu-icon tf-icons fa-solid fa-shapes"></i>
            <div data-i18n="Analytics">Categories</div>
        </a>
    </li>
@endif