<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title> @yield('title') - Погода у Волинській області</title>
    <link type="image/png" sizes="32x32" rel="icon" href="{{ asset('favicon.png') }}">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">

    <!-- Loading third party fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" integrity="sha512-PIAUVU8u1vAd0Sz1sS1bFE5F1YjGqm/scQJ+VIUJL9kNa8jtAWFUDMu5vynXPDprRRBqHrE8KKEsjA7z22J1FA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Loading main css file -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<div class="site-content">

    @include('components.header')

    @yield('content')

    @include('components.footer')

</div>

<script src="https://www.google.com/recaptcha/api.js?render=6LdUsI4oAAAAAAF_6hrZsQPPKOribJZifRUCB9yf"></script>
<script src="{{ asset('assets/js/min/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('assets/js/min/notify.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
