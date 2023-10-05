@extends('layout.app')

@section('title', 'Головна')
@section('index-active', 'current-menu-item')

@section('content')

    <div class="hero" style="background-image: url('{{ url('storage/images/banner.png') }}');">
        <div class="container">
            <form class="find-location" id="find-location">
                <input type="text" id="find-location-input" placeholder="Населений пункт...">
                <input type="submit" id="find-location-btn" value="Пошук">
            </form>
            <div class="find-results">
                <ul class="menu">
{{--                    <li class="menu-item"><a href="#">Item</a></li>--}}
                </ul>
            </div>
        </div>
    </div>
    <div class="forecast-table">
        <div class="container">
            <div class="forecast-container">
                <div class="today forecast">
                    <div class="forecast-header">
                        <div class="day">--</div>
                        <div class="date">--</div>
                    </div> <!-- .forecast-header -->
                    <div class="forecast-content">
                        <div class="location">--</div>
                        <div class="degree">
                            <div class="num">--<sup>o</sup>C</div>
                            <div class="forecast-icon">
                                <img src="https://openweathermap.org/img/wn/02d.png" alt="Sun" width=70>
                            </div>
                        </div>
                        <span id="today-humidity" title="Вологість"><img src="storage/images/icon-umberella.png" alt="umbrella">--%</span>
                        <span id="today-wind-speed" title="Пориви вітру"><img src="storage/images/icon-wind.png" alt="wind">-- м/c</span>
                        <span id="today-wind-direct" title="Напрямок вітру"><img src="storage/images/icon-compass.png" alt="compass">--</span>
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
            </div>
        </div>
    </div>
    <main class="main-content">

    </main> <!-- .main-content -->

@endsection
