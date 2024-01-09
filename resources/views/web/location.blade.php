@include('layouts.app')

<body>
    <!-- Header Web Web -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="{{ route('home') }}"><img
                            src="{{ asset('storage/images/logos/Logo_Hostal_minitautra.png') }}" alt=""></a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="main-menu mobile-menu">
                                <br>
                                <br>
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('home') }}#OurService">Nosotros</a></li>
                                    <li><a href="{{ route('home') }}#roomsHostal">Habitaciones</a></li>
                                    <li><a href="{{ route('home') }}#contactNow">Contactó</a></li>
                                    <li><a href="{{ route('location') }}">Ubicación</a></li>
                                    <li><a href="{{ route('comment') }}">Reseña</a></li>
                                </ul>
                            </nav>
                            <div class="top-info">
                                <img src="{{ asset('storage/img/placeholder.png') }}" alt="Guadalajara hostal">
                                <span>Guadalajara Jalisco</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header Web End -->

    <div class="facilities-section spad" id="roomsHostal">
        <div class="container">
            <div class="facilities-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                        </div>
                    </div>
                    <div class="col-lg-10 offset-lg-1 section-title">
                        <h1>Ubicación</h1>
                    </div>
                    <div class="col-lg-12 p-0">
                        <div class="facilities-text-warp">
                            <div class="facilities-text">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d613.3724212258635!2d-103.3466868981529!3d20.68582550673423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjDCsDQxJzA5LjAiTiAxMDPCsDIwJzQ2LjUiVw!5e0!3m2!1ses!2smx!4v1704818324448!5m2!1ses!2smx"
                                    width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="container showtrue">
                        <div class="row">
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="slider-nav">
                                    <a href="{{ route('home') }}#OurService" class="single-slider-nav">
                                        <img src="#" alt="">
                                        <div class="nav-text active">
                                            <p>Nosotros<i class="lnr lnr-arrow-right"></i></p>
                                        </div>
                                    </a>
                                    <a href="{{ route('home') }}#roomsHostal" class="single-slider-nav">
                                        <div class="nav-text">
                                            <p>Habitaciones<i class="lnr lnr-arrow-right"></i></p>
                                        </div>
                                    </a>
                                    <a href="{{ route('home') }}#contactNow" class="single-slider-nav last">
                                        <img src="{{ asset('storage/img/room-slider/nav-3.jpg') }}" alt="">
                                        <div class="nav-text">
                                            <p>Contactó<i class="lnr lnr-arrow-right"></i></p>
                                        </div>
                                    </a>
                                    <a href="{{ route('location') }}" class="single-slider-nav last">
                                        <img src="{{ asset('storage/img/room-slider/nav-3.jpg') }}" alt="">
                                        <div class="nav-text">
                                            <p>ubicación<i class="lnr lnr-arrow-right"></i></p>
                                        </div>
                                    </a>
                                    <a href="{{ route('comment') }}" class="single-slider-nav last">
                                        <img src="{{ asset('storage/img/room-slider/nav-3.jpg')}}" alt="">
                                        <div class="nav-text">
                                            <p>Reseña<i class="lnr lnr-arrow-right"></i></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer Room Pic Section End -->
    @include('layouts.footer')

</body>
