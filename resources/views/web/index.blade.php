@include('layouts.app')

<body>

		<!-- Header Web Web -->
		<header class="header-section">
			<div class="container-fluid">
				<div class="inner-header">
					<div class="logo">
						<a href="{{route('home')}}"><img src="{{ asset('storage/images/logos/Logo_Hostal_minitautra.png')}}" alt=""></a>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-xl-12">
								<nav class="main-menu mobile-menu">
									<br>
									<br>
									<ul>
										<li><a href="{{route('home')}}">Home</a></li>
										<li><a href="#OurService">Nosotros</a></li>
										<li><a href="#roomsHostal">Habitaciones</a></li>
										{{-- <li><a href="#">Facilities</a>
											<ul class="drop-menu">
												<li><a href="#">Junior Suit</a></li>
												<li><a href="#">Double Room</a></li>
												<li><a href="#">Senior Suit</a></li>
												<li><a href="#">Single Room</a></li>
											</ul>
										</li> --}}
										<li><a href="#contactNow">Contactó</a></li>
									</ul>
								</nav>
								<div class="top-info">
									<img src="{{ asset('storage/img/placeholder.png')}}" alt="Guadalajara hostal">
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
		
		<!-- Hero Slider Begin -->
		<div style="background-image: url({{ asset('storage/images/web/gradient_1.png')}})" >
			<div class="hero-slider">
				<div class="slider-item">
					<div class="single-slider-item set-bg">

						{{-- Only desck --}}
						<div class="mi_desapit about-para">
							<div class="row">
								<div class="col-lg-10 offset-lg-1">
									<h2>Nosotros brindamos el servicio de alojamiento con precios accesibles, 
										excelentes instalaciones y ambiente agradable, ideal para estudiantes o profesionistas en 
										nuestros hostales. <br> Tenemos diversos hostales en la Zona Metropolitana de Guadalajara,
										Jalisco, México.
									</h2>
								</div>
								<br>
								<div class="col-lg-10 offset-lg-1">
									<h2>Ubicación conveniente en el corazón de la ciudad.
										Habitaciones limpias y cómodas para una
										estancia agradable</h2>
								</div>
							</div>
						</div>

							{{-- mobile --}}
							<div class="showtrue single-slider-item set-bg" >
								<img src="{{ asset('storage/images/logos/Logo_Hostal.png')}}" alt="">
								<h3>
									En nuestro hostal, cada huésped es especial. Nos esforzamos por ofrecer una atención personalizada, ayudándote con información local,
									recomendaciones y cualquier cosa que necesites para que tu estancia sea inolvidable.
								</h3>
								<div class="container">
									<div class="row">
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="slider-nav">
												<a href="#OurService" class="single-slider-nav">
													<img src="#" alt="">
													<div class="nav-text active">
														<p>Nosotros<i class="lnr lnr-arrow-right"></i></p>
													</div>
												</a>
												<a href="#roomsHostal" class="single-slider-nav">
													<div class="nav-text">
														<p>Habitaciones<i class="lnr lnr-arrow-right"></i></p>
													</div>
												</a>
												<a href="#contactNow" class="single-slider-nav last">
													<img src="{{ asset('storage/img/room-slider/nav-3.jpg')}}" alt="">
													<div class="nav-text">
														<p>Contactó<i class="lnr lnr-arrow-right"></i></p>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							{{-- mobile end--}}
					</div>
				</div>
			</div>
		</div>
		<!-- Hero Slider End -->

		

		<!-- Publicidad -->
		@if(!empty($banners))
					<div class="carrousel body_carrusel">			
						<input type="radio" name="slides" id="radio-1" checked>
						<input type="radio" name="slides" id="radio-2">
						<input type="radio" name="slides" id="radio-3">
						<input type="radio" name="slides" id="radio-4">
						<ul class="slides">
							@foreach ($banners as $key_item  => $item_banner)
								<li class="slide">
									<img src="{{ asset('storage/' . $item_banner->img)}}" alt="" style="height: 20%; margin: auto; width: 49%; padding: 0px; border: 1px solid #2980b9;">
									<p>
										<q>{{$item_banner->title}}</q> 
											<span class="author">
												{{$item_banner->description}}
											</span>
									</p>		
								</li>
							@endforeach
						</ul>
							<div class="slidesNavigation">
								<label for="radio-1" id="dotForRadio-1"></label>
								<label for="radio-2" id="dotForRadio-2"></label>
								<label for="radio-3" id="dotForRadio-3"></label>
								<label for="radio-4" id="dotForRadio-4"></label>
							</div>
							<br>
					</div> 
		@endif  
		<!-- End Publicidad -->


		<!-- start -->
		<section class="room-availability spad">
			<div class="container">
				<div class="about-room">
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							<h2>Donde la comodidad se encuentra con la Hospitalidad</h2>
						</div>
					</div>
					<div class="about-para" id="OurService">
						<div class="row">
							<div class="col-lg-6">
								<p>Nosotros brindamos el servicios de alojamiento con precios accesible
									excelentes instalacciones y ambiente agradable, ideal para estudiantes o profesionistas en nuestros hostales.
									Contáctanos tenemos diversos hostales Zona metropolitana Guadajalara, Jalisco, Mexico.</p>
							</div>
							<div class="col-lg-6">
								<p>Ubicación conveniente en el corazón de la ciudad.
									Habitaciones limpias y cómodas para una
									estancia agradable</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End start -->

		<div class="about-room">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<h2>Hostal Pino Zuares</h2>
					<br>
					<h2>Áreas compartidas</h2>
				</div>
			</div>
			<div class="about-para">
				<div class="row">
					<div class="col-lg-6">
						<p><b>Ubicación:</b> Calle Pino Suárez, Centro Barranquitas, Guadalajara, Jalisco, Mexico.</p>
					</div>
					<br>
					<div class="col-lg-6">
						<p>Ubicación conveniente personal de hospitacil civil, y estudiantes del cucs.</p>
					</div>
				</div>
			</div>
		</div>

		<!-- star banner firts hostal Pino-->
		<div class="carrousel body_carrusel">			
			<input type="radio" name="slides" id="radio-1-car-pino" checked>
			<input type="radio" name="slides" id="radio-2-car-pino">
			<input type="radio" name="slides" id="radio-3-car-pino">
			<input type="radio" name="slides" id="radio-4-car-pino">
			<ul class="slides">
					<li class="slide">
						<img src="{{ asset('storage/images/web/pino/zone_friendly-two.jpeg')}}" alt="" style="height: 20%; margin: auto; width: 49%; padding: 0px; border: 1px solid #2980b9;">
						<p>
							<q>Area de alimentos</q> 
								<span class="author">
									Espacio principal donde se preparan las comidas, se cocinan ingredientes 
								</span>
						</p>		
					</li>
					<li class="slide">
						<img src="{{ asset('storage/images/web/pino/zone_friendly-one.jpeg')}}" alt="" style="height: 20%; margin: auto; width: 49%; padding: 0px; border: 1px solid #2980b9;">
						<p>
							<q>Refrigerador</q> 
							<span class="author"> Espeacio donde se ubican los alimentos de cada inquilino</span>
						</p>		
					</li>
					<li class="slide">
						<img src="{{ asset('storage/images/web/pino/zone_friendly-four.jpeg')}}" alt="" style="height: 20%; margin: auto; width: 49%; padding: 0px; border: 1px solid #2980b9;">
						<p>
							<q>Baño compartido hombres</q> 
							<span class="author">
								Las instalaciones necesarias para cubrir las necesidades básicas de higiene personal
							</span>
						</p>		
					</li>
					<li class="slide">
						<img src="{{ asset('storage/images/web/pino/zone_friendly-three.jpeg')}}" alt="" style="height: 20%; margin: auto; width: 49%; padding: 0px; border: 1px solid #2980b9;">
						<p>
							<q>Baño compartido mujeres</q> 
							<span class="author">
								Las instalaciones necesarias para cubrir las necesidades básicas de higiene personal
							</span>
						</p>		
					</li>
			</ul>
				<div class="slidesNavigation">
					<label for="radio-1-car-pino" id="dotForRadio-1-car-pino"></label>
					<label for="radio-2-car-pino" id="dotForRadio-2-car-pino"></label>
					<label for="radio-3-car-pino" id="dotForRadio-3-car-pino"></label>
					<label for="radio-4-car-pino" id="dotForRadio-4-car-pino"></label>
				</div>
				<br>
		</div> 
		<!-- end banner firts hostal -->

		<!-- Room -->
		<div class="facilities-section spad" id="roomsHostal">
			<div class="container">
				<div class="facilities-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h1>Habitaciones</h1>
							</div>
						</div>
						@foreach ($data_pino['bedroom'] as $key_pino_room => $item_data_pino)
						
							@if ($item_data_pino->show_page)
								<div class="col-lg-10 offset-lg-1 section-title">
									<h1>{{$item_data_pino->name}}</h1>
								</div>
									@foreach ($item_data_pino->img as $item_img)
										<div class="col-lg-3 p-0">
											<div class="facilities-img set-bg">
												<img src="{{ asset('storage/' . $item_img )}}" alt="{{$item_data_pino->name}}">
											</div>
										</div>
									@endforeach
								<div class="col-lg-12 p-0 ">
									<div class="facilities-text-warp">
										<div class="facilities-text">
											<h1><b>{{$item_data_pino->name}}</b></h1>
											<p>
												{!! $item_data_pino->web_phrase !!}
											</p>
											<br>
											<b>Precio: </b> $ {{$item_data_pino->pay}}
											<br>
											<a href="#contactNow" class="primary-btn fac-btn">Contactanos<i class="lnr lnr-arrow-right"></i></a>
										</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<!-- End  Room-->




		<!-- Form Contact -->
		<section class="room-availability spad">
			<div class="container">
				<div class="room-check">
					<div class="row">
						<div class="col-lg-12">
							<div class="about-room">
								<div class="row">
									<div class="col-lg-10 offset-lg-1">
										<h2>Contactanos</h2>
									</div>
								</div>
							</div>
							<div class="check-form" id="contactNow">
								<h2>¿ Precupado por encontrar un lugar seguro y economico en la ciudad GDL?</h2>
								<form action="{{route('contac-home')}}"  method="POST">
									@csrf
									<div class="datepicker">
										<div class="date-select">
											<h4>Nombre</h4>
											<input type="text" placeholder="Nombre"  id="name" name="name" style="resize: none; width: 100%;" value="{{ old('name') }}">
											<br>
											@error('name')
												<div class="alert alert-danger @error('name') is-invalid @enderror">{{ $message }}</div>
											@enderror
										</div>
										<div class="date-select">
											<h4>Email</h4>
											<input type="email" placeholder="Email" style="resize: none; width: 100%;" value="{{ old('email') }}" id="email" name="email">
											<br>
											@error('email')
												<div class="alert alert-danger @error('email') is-invalid @enderror">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="datepicker">
										<div class="date-select">
											<h4>Telefono</h4>
											<input type="text" id="phone" name="phone" placeholder="Telefonó" style="resize: none; width: 100%;" value="{{ old('phone') }}">
											<br>
											@error('phone')
												<div class="alert alert-danger @error('phone') is-invalid @enderror">{{ $message }}</div>
											@enderror
										</div>
										<div class="date-select">
											<h4>Fecha de disponibilidad</h4>
											<input type="date" class="datepicker-2" placeholder="dd / mm / yyyy" id="date" name="date" value="{{ old('date') }}">
											<br>
											@error('date')
												<div class="alert alert-danger @error('date') is-invalid @enderror">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="room-quantity">
										<div class="date-select @error('description') is-invalid @enderror">
											<h4>Descripción</h4>
											<textarea type="text" placeholder="Descripción" rows="4" style="resize: none; width: 100%;" id="description" name="description">{{ old('description') }} </textarea>
											<br>
											@error('description')
												<div class="alert alert-danger @error('description') is-invalid @enderror ">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<button type="submit">Enviar<i class="lnr lnr-arrow-right"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Form Contact -->

		
		<!-- Testimoanal Section Begin -->
		<div class="testimonial-section spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h1>Reseñas</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="testimonial-item">
							<div class="tab-content">
								@foreach ($all_comment as $item)
									<div class="tab-pane fade-in active" id="testimonial-1" role="tabpanel">
										<div class="single-testimonial-item">
											<span class="test-date">{{$item->created_at}}</span>
											<div class="test-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<h4>{{$item->title}}</h4>
											<p>"{{$item->description}}" <br> <b>Autor<h3>{{$item->name}}</h3></b></p>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Testimoanal Section End Begin -->


		<!-- Footer Room Pic Section Begin -->
		{{-- <div class="footer-room-pic">
			<div class="container-fluid">
				<div class="row">
					<img src="{{ asset('storage/images/logos/Logo_Hostal.png')}}" alt="">
					<img src="{{ asset('storage/images/logos/Logo_Hostal.png')}}" alt="">
					<img src="{{ asset('storage/images/logos/Logo_Hostal.png')}}" alt="">
					<img src="{{ asset('storage/images/logos/Logo_Hostal.png')}}" alt="">
				</div>
			</div>
		</div> --}}
		<!-- Footer Room Pic Section End -->
		@include('layouts.footer')

</body>