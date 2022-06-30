    <div class="site-header">
        <div class="container">
            <a href="{{ route('index') }}" class="branding">
                <img src="storage/images/logo.png" alt="" class="logo">
                <div class="logo-type">
                    <h1 class="site-title">Weather</h1>
                    <small class="site-description">Don't give up</small>
                </div>
            </a>

            <!-- Default snippet for navigation -->
            <div class="main-navigation">
                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item @yield('index-active')"><a href="{{ route('index') }}">Home</a></li>
                    <li class="menu-item @yield('news-active')"><a href="{{ route('news') }}">News</a></li>
                    <li class="menu-item @yield('photos-active')"><a href="{{ route('photos') }}">Photos</a></li>
                    <li class="menu-item @yield('contact-active')"><a href="{{ route('contact') }}">Contact</a></li>
                </ul> <!-- .menu -->
            </div> <!-- .main-navigation -->

            <div class="mobile-navigation"></div>

        </div>
    </div> <!-- .site-header -->
