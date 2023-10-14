    <div class="site-header">
        <div class="container">
            <a href="{{ route('index') }}" class="branding">
                <img src="{{ url('storage/images/logo.png') }}" alt="logo" class="logo">
                <div class="logo-type">
                    <h1 class="site-title">Погода у Волинській області</h1>
                    <small class="site-description">Нехай проблеми та незгоди не роблять вам в житті погоди.</small>
                </div>
            </a>

            <!-- Default snippet for navigation -->
            <div class="main-navigation">
                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item @yield('index-active')"><a href="{{ route('index') }}">Головна</a></li>
                    <li class="menu-item @yield('contact-active')"><a href="{{ route('contact') }}">Зв'язок</a></li>
                </ul> <!-- .menu -->
            </div> <!-- .main-navigation -->

            <div class="mobile-navigation"></div>

        </div>
    </div> <!-- .site-header -->
