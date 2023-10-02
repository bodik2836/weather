@extends('layout.app')

@section('title', 'Зв\'язок')
@section('contact-active', 'current-menu-item')

@section('content')

    <main class="main-content">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('index') }}">Головна</a>
                <span>Зв'язок</span>
            </div>
        </div>

        <div class="fullwidth-block">
            <div class="container">
                <div class="col-md-5">
                    <div class="contact-details">
                        <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40398.8812628698!2d25.29898554331745!3d50.73978570608766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472599eba185965d%3A0xd25274a2228db86c!2z0JvRg9GG0YzQuiwg0JLQvtC70LjQvdGB0YzQutCwINC-0LHQu9Cw0YHRgtGM!5e0!3m2!1suk!2sua!4v1654849151425!5m2!1suk!2sua" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                        <div class="contact-info">
                            <address>
                                <img src="storage/images/icon-marker.png" alt="">
                                <p>Луцьк, Україна </p>
                            </address>
                            <a href="mailto:weather@toptools.fun"><img src="storage/images/icon-envelope.png" alt="">weather@toptools.fun</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <h2 class="section-title">Зв'яжіться з нами</h2>
                    <p>Ця форма дозволяє відвідувачам сайту звертатися до сервісу, поділитися своїми спостереженнями або отримати інформацію. Після відправлення повідомлення користувач очікує на відповідь.</p>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6"><input type="text" placeholder="Ім'я Прізвище"></div>
                            <div class="col-md-6"><input type="text" placeholder="Електронна пошта"></div>
                        </div>
                        <textarea name="" rows="10" placeholder="Пропозиції, зауваження, повідомлення :)"></textarea>
                        <div class="text-right">
                            <input type="submit" placeholder="Send message">
                            <div>Функціонал в розробці. Форма зв'язку поки не працює.</div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </main> <!-- .main-content -->

@endsection
