@extends('layout.app')

@section('title', 'Home')
@section('index-active', 'current-menu-item')

@section('content')

    <div class="hero" style="background-image: url('{{ url('storage/images/banner.png') }}');">
        <div class="container">
            <form class="find-location" id="find-location">
                <input type="text" id="find-location-input" placeholder="Find your location...">
                <input type="submit" id="find-location-btn" value="Find">
            </form>
            <div class="find-results">
                <ul class="menu">
                    <li class="menu-item current-menu-item"><a href="http://weather.docker.localhost:8000">Home</a></li>
                    <li class="menu-item "><a href="http://weather.docker.localhost:8000/contact">Contact</a></li>
                    <li class="menu-item "><a href="http://weather.docker.localhost:8000/contact">Contact</a></li>
                    <li class="menu-item "><a href="http://weather.docker.localhost:8000/contact">Contact</a></li>
                    <li class="menu-item "><a href="http://weather.docker.localhost:8000/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="forecast-table">
        <div class="container">
            <div class="forecast-container">
                <div class="today forecast">
                    <div class="forecast-header">
                        <div class="day">Monday</div>
                        <div class="date">6 Oct</div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="location">New York</div>
                        <div class="degree">
                            <div class="num">23<sup>o</sup>C</div>
                            <div class="forecast-icon">
                                <img src="storage/images/icons/icon-1.svg" alt="" width=90>
                            </div>
                        </div>
                        <span><img src="storage/images/icon-umberella.png" alt="">20%</span>
                        <span><img src="storage/images/icon-wind.png" alt="">18km/h</span>
                        <span><img src="storage/images/icon-compass.png" alt="">East</span>
                    </div>
                </div>
                <div class="forecast">
                    <div class="forecast-header">
                        <div class="day">Tuesday</div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="forecast-icon">
                            <img src="storage/images/icons/icon-3.svg" alt="" width=48>
                        </div>
                        <div class="degree">23<sup>o</sup>C</div>
                        <small>18<sup>o</sup></small>
                    </div>
                </div>
                <div class="forecast">
                    <div class="forecast-header">
                        <div class="day">Wednesday</div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="forecast-icon">
                            <img src="storage/images/icons/icon-5.svg" alt="" width=48>
                        </div>
                        <div class="degree">23<sup>o</sup>C</div>
                        <small>18<sup>o</sup></small>
                    </div>
                </div>
                <div class="forecast">
                    <div class="forecast-header">
                        <div class="day">Thursday</div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="forecast-icon">
                            <img src="storage/images/icons/icon-7.svg" alt="" width=48>
                        </div>
                        <div class="degree">23<sup>o</sup>C</div>
                        <small>18<sup>o</sup></small>
                    </div>
                </div>
                <div class="forecast">
                    <div class="forecast-header">
                        <div class="day">Friday</div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="forecast-icon">
                            <img src="storage/images/icons/icon-12.svg" alt="" width=48>
                        </div>
                        <div class="degree">23<sup>o</sup>C</div>
                        <small>18<sup>o</sup></small>
                    </div>
                </div>
                <div class="forecast">
                    <div class="forecast-header">
                        <div class="day">Saturday</div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="forecast-icon">
                            <img src="storage/images/icons/icon-13.svg" alt="" width=48>
                        </div>
                        <div class="degree">23<sup>o</sup>C</div>
                        <small>18<sup>o</sup></small>
                    </div>
                </div>
                <div class="forecast">
                    <div class="forecast-header">
                        <div class="day">Sunday</div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="forecast-icon">
                            <img src="storage/images/icons/icon-14.svg" alt="" width=48>
                        </div>
                        <div class="degree">23<sup>o</sup>C</div>
                        <small>18<sup>o</sup></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="main-content">

    </main> <!-- .main-content -->

@endsection
