@include('layouts.app')

<body>

		<header class="header-section">
			<div class="container-fluid">
				<div class="inner-header">
					<div class="container">
						<div class="row">
							<div class="col-xl-12">
								<nav class="main-menu mobile-menu">
									<br>
									<br>
									<ul>
										<li><a href="{{route('home')}}">Home</a></li>
										<li><a href="#contactNow">Contactó</a></li>
									</ul>
								</nav>
								<div class="top-info">
									<span>Adrian Alfredo Aguilar Hernandez</span>
								</div>
							</div>
						</div>
					</div>
					<div id="mobile-menu-wrap"></div>
				</div>
			</div>
		</header>
		
		<div style="background: #233d4d" >
			<div class="hero-slider">
				<div class="slider-item">
					<div class="single-slider-item set-bg">

							{{-- mobile --}}
							<div class="showtrue single-slider-item set-bg" >
								<div class="container">
									<div class="row">
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="slider-nav">
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
		
		<!-- Publicidad -->
		@if(isset($banners))
					<div class="carrousel body_carrusel">			
						<input type="radio" name="slides" id="radio-1" checked>
						<input type="radio" name="slides" id="radio-2">
						<input type="radio" name="slides" id="radio-3">
						<input type="radio" name="slides" id="radio-4">
						<ul class="slides">
							@foreach ($banners as $key_item  => $item_banner)
								<li class="slide">
									<img src="{{ asset('storage/' . $item_banner->img)}}" alt="" style="height: 20%; margin: auto; width: 49%; padding: 0px; border: 1px solid #2980b9;">
									<br>
									<p>
										{{ $item_banner->title }}
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


		<div class="about-room">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<h2>Productos</h2>
					<br>
				</div>
			</div>
			<div class="about-para">
				<div class="row">
					<div class="col-lg-12">
						Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.
					</div>
				</div>
			</div>
		</div>

		<!-- Productos -->
		<div class="facilities-section spad" id="roomsHostal">
			<div class="container">
				<div class="facilities-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h1>Productos</h1>
							</div>
						</div>
						@foreach ($get_products as $key_product => $item_data_products)
						
							@if ($item_data_products->show_page)
								<div class="col-lg-10 offset-lg-1 section-title">
									<h1>{{$item_data_products->name}}</h1>
								</div>
									@foreach ($item_data_products->img as $item_img)
										<div class="col-lg-3 p-0">
											<div class="facilities-img set-bg">
												<img src="{{ asset('storage/' . $item_img )}}" alt="{{$item_img}}">
											</div>
										</div>
									@endforeach
								<div class="col-lg-12 p-0 ">
									{{$item_data_products->body}}
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<!-- End  Product-->

		<!-- Form Contact -->
		<section class="room-availability spad">
			<div class="container">
				<div class="room-check">
					<div class="row">
						<div class="col-lg-12">
							<div class="about-room">
								<div class="row">
									<div class="col-lg-10 offset-lg-1">
										<h2>Contáctanos</h2>
									</div>
								</div>
							</div>
							<div class="check-form" id="contactNow">
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

		@include('layouts.footer')

</body>