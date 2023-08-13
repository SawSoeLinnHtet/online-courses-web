<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="active" href="index-2.html">Home</a>
        <ul class="sub-menu">
            <li><a class="active" href="index-2.html">Home 01</a></li>
            <li><a href="index-3.html">Home 02</a></li>
            <li><a href="index-4.html">Home 03</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="about.html">About us</a>
    </li>
    <li class="nav-item">
        <a href="courses.html">Courses</a>
        <ul class="sub-menu">
            <li><a href="courses.html">Courses</a></li>
            <li><a href="courses-singel.html">Course Singel</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="events.html">Events</a>
        <ul class="sub-menu">
            <li><a href="events.html">Events</a></li>
            <li><a href="events-singel.html">Event Singel</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="teachers.html">Our teachers</a>
        <ul class="sub-menu">
            <li><a href="teachers.html">teachers</a></li>
            <li><a href="teachers-singel.html">teacher Singel</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="blog.html">Blog</a>
        <ul class="sub-menu">
            <li><a href="blog.html">Blog</a></li>
            <li><a href="blog-singel.html">Blog Singel</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="contact.html">Contact</a>
        <ul class="sub-menu">
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="contact-2.html">Contact Us 2</a></li>
        </ul>
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