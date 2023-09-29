@extends('layout.app')

@section('title', 'Зв\'язок')
@section('contact-active', 'current-menu-item')

@section('content')

    <main class="main-content">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('index') }}">Home</a>
                <span>Contact</span>
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
                                <p>Company Name INC. <br>
                                    2803 Avenue Street, Los Angeles</p>
                            </address>

                            <a href="#"><img src="storage/images/icon-phone.png" alt="">+1 800 314 235</a>
                            <a href="#"><img src="storage/images/icon-envelope.png" alt="">contact@companyname.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <h2 class="section-title">Contact us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi consectetur inventore ducimus, facilis, numquam id soluta omnis eius recusandae nesciunt vero repellat harum cum. Nisi facilis odit hic, ipsum sed!</p>
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-md-6"><input type="text" placeholder="Your name..."></div>
                            <div class="col-md-6"><input type="text" placeholder="Email Addresss..."></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><input type="text" placeholder="Company name..."></div>
                            <div class="col-md-6"><input type="text" placeholder="Website..."></div>
                        </div>
                        <textarea name="" placeholder="Message..."></textarea>
                        <div class="text-right">
                            <input type="submit" placeholder="Send message">
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </main> <!-- .main-content -->

@endsection
