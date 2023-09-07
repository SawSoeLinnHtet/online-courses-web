<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="{{ request()->routeIs('site.home') ? 'active' : '' }}" href="{{ route('site.home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="{{ request()->routeIs('site.courses.*') ? 'active' : '' }}" href="{{ route('site.courses.index') }}">Courses</a>
    </li>
    <li class="nav-item">
        <a class="{{ request()->routeIs('site.instructors') ? 'active' : '' }}" href="{{ route('site.instructors') }}">Our Instructors</a>
    </li>
    <li class="nav-item">
        <a class="{{ request()->routeIs('site.contact') ? 'active' : '' }}" href="{{ route('site.contact') }}">Contact Us</a>
    </li>
        <li class="nav-item">
        <a href="shop.html">Your Account</a>
        <ul class="sub-menu">
            <li>
                <a href="shop.html">Profile</a>
            </li>
            <li>
                <form action="{{ route('site.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link text-white d-flex align-items-center text-bold text-decoration-none" style="font-weight: bold">
                        <i class="fa fa-sign-out mr-2" aria-hidden="true"></i>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </li>
</ul>