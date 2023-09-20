<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title> @yield('title') </title>

    <!-- Loading third party fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" integrity="sha512-PIAUVU8u1vAd0Sz1sS1bFE5F1YjGqm/scQJ+VIUJL9kNa8jtAWFUDMu5vynXPDprRRBqHrE8KKEsjA7z22J1FA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Loading main css file -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
</head>

<body>

<div class="site-content">

    @include('components.header')

    @yield('content')

    @include('components.footer')

</div>

<script src="{{ url('assets/js/min/jquery-1.11.1.min.js') }}"></script>
<script src="{{ url('assets/js/plugins.js') }}"></script>
<script src="{{ url('assets/js/app.js') }}"></script>

</body>

</html>
