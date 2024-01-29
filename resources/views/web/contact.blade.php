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
                                <li><a href="{{ route('home') }}#locationTrue">Ubicación</a></li>
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


        <br>
        <br>
        <br>
        <div class="facilities-section spad">
        <div class="container">
            <!-- Header part contain Title page and descriptoion -->
            <div class="header">
                <h2>Comentarios</h2>
                <hr/>
                <p>
                    "¡Tu opinión es importante para nosotros! ¿Qué te pareció tu experiencia en nuestra página? Nos encantaría conocer tus comentarios."
                </p>
            </div>
            <!-- End of header Part -->
            <br>
            <br>
            <!-- Main part contain form and informatoion contactus -->
            <div class="main">
                <div class="contact">
                    <!-- Form start here -->
                    <div class="contact-form">
                        <div class="header">
                            <h1>Danos tu opinión</h1>
                        </div>
                        <form  method="POST"  action="{{route('comment-save')}}">
                            @csrf
                            <div class="contact-detail">
                                <h2>Titulo</h2>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" style="resize: none; width: 100%;" placeholder="Titulo" id="title" name="title"  value="{{ old('title') }}"/>
                                <br>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact-detail">
                                <h2>Nombre</h2>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" style="resize: none; width: 100%;" placeholder="Nombre" id="name"   name="name" value="{{ old('name') }}" />
                                <br>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact-detail">
                                <h2>Email</h2>
                                <input
                                type="email"
                                value="{{ old('email') }}"
                                class="form-control  @error('email') is-invalid @enderror"
                                placeholder="Email"
                                id="email"
                                name="email"
                                style="resize: none; width: 100%;"
                                />
                                <br>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="hide" for="description">Mensaje</label>
                            <textarea
                                class="form-control  @error('description') is-invalid @enderror"
                                rows="5"
                                id="description"
                                placeholder="Descripción"
                                style="resize: none; width: 100%;"
                                name="description"
                                value="{{ old('description') }}"
                            ></textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn">ENVIAR<i class="lnr lnr-arrow-right"></i></button>
                            <br>
                        </form>
                    </div>
                    <!-- Form finish here -->
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
                            <a href="{{ route('home') }}#locationTrue" class="single-slider-nav last">
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

    <script src="assets/js/toggleHamburger.js"></script>
    <!-- Footer Room Pic Section End -->
    @include('layouts.footer')

</body>