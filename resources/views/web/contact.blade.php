@include('layouts.app')
<body>
    <header>
        <div class="header-container">
            <nav class="header-nav-bar">
                <div class="header-nav-logo">
                    <a href="index.html">
                        <img src="{{ asset('storage/images/logos/Logo_Hostal.png')}}" alt="star_hotels_logo">
                    </a>
                </div>
                <ul class="header-nav-lists">
                    <li class="header-nav-list">
                        <a class="header-nav-link" href="{{ route('home')}}">Home</a>
                    </li>
                    {{-- <li class="header-nav-list"><a class="header-nav-link" href="{{ route('bedroom')}}">Habitaciones</a></li> --}}
                    <li class="header-nav-list header-active"><a class="header-nav-link header-active" href="{{ route('comment')}}">Comentar</a></li>
                    <li class="header-nav-list"><a class="header-btn header-btn-custom" href="{{ route('home')}}">Contáctanos</a></li>
                </ul>
                <div class="header-hamburger-icon">
                    <div class="header-hamburger-line-1"></div>
                    <div class="header-hamburger-line-2"></div>
                    <div class="header-hamburger-line-3"></div>
                </div>
            </nav>
        </div>
    </header>
    
    <main>
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

            <!-- Main part contain form and informatoion contactus -->
            <div class="main">
                <div class="contact">
                    <!-- Form start here -->
                    <div class="contact-form">
                        <div class="header">
                            <h2>Danos tu opinión</h2>
                        </div>
                        <form  method="POST"  action="{{route('comment-save')}}">
                            @csrf
                            <div class="contact-detail">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" style="resize: none; width: 100%;" placeholder="Titulo" id="title" name="title"  value="{{ old('title') }}"/>
                                <br>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact-detail">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" style="resize: none; width: 100%;" placeholder="Name" id="name"   name="name" value="{{ old('name') }}" />
                                <br>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact-detail">

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
                                placeholder="Message"
                                style="resize: none; width: 100%;"
                                name="description"
                                value="{{ old('description') }}"
                            ></textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn">ENVIAR</button>
                            <br>
                        </form>
                    </div>
                    <!-- Form finish here -->

                    <!-- Contact Us start here -->
                    <div class="contact-us">
                        <h3>Contactanos</h3>

                        <span
                            ><i
                                style="font-size: 1.5rem;"
                                class="fa fa-map-marker"
                                aria-hidden="true"
                            ></i
                            >33 1425 2572</span
                        >
                        <span
                            ><i
                                style="font-size: 1.5rem;"
                                class="fa fa-phone"
                                aria-hidden="true"
                            ></i
                            >"¡Comenta ahora!"</span
                        >
                        {{-- <span>

                            <i
                                style="font-size: 1.5rem;"
                                class="fa fa-envelope-o"
                                aria-hidden="true"
                            >
                            </i
                            >administrador@hostal.com</span> --}}
                    </div>
                    <!-- Contact Us Finish here -->
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
		<div class="footer-container">
			<nav class="footer-nav">
				<div class="footer-description">
					<h3 class="footer-description-title">Hostal</h3>
					<p>Donde la comodidad se encuentra con la hospitalidad</p>
				</div>
				<div class="footer-contact-us">
					<h3 class="footer-description-title">Contáctanos</h3>
					<p class="footer-description-detail"> 
						<img src="{{ asset('storage/images/web/map-pin.svg')}}" class="footer-description-icon" alt="hostal_location">
						<span>C. Pino Suárez 558, Centro Barranquitas, 44280 Guadalajara, Jal.</span></p>
					<p class="footer-description-detail">
						<img src="{{ asset('storage/images/web/phone.svg')}}" class="footer-description-icon" alt="star hotels phone number"> 
						<span>33 1425 2572</span></p>
					<p class="footer-description-detail">
						<img src="{{ asset('storage/images/web/mail.svg')}}" class="footer-description-icon" alt="star hotels email">
						<span>administrador@hostal.com</span> </p>
				</div>
				<div class="footer-follow-us">
					<h3 class="footer-description-title">Redes sociales</h3>
					<ul class="footer-follow-us-lists">
						<li class="follow-us-list">
							<a href="">
								<img src="{{ asset('storage/images/web/facebook.svg')}}" alt="hostal_facebook_page">
							</a>
						</li>
						<li class="follow-us-list">
							<a href="">
								<img src="{{ asset('storage/images/web/twitter.svg')}}" alt="hostal_twitter_page">
							</a>
						</li>
						<li class="follow-us-list">
							<a href="">
								<img src="{{ asset('storage/images/web/instagram.svg')}}" alt="hostal_instagram_page">
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</footer>

    <script src="assets/js/toggleHamburger.js"></script>
</body>