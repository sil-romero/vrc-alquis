<?php
session_start();
include 'includes/header-index.php';
?>

	<!-- Home -->
	<div class="home">
		
		<!-- Home Slider -->
		<div class="home_slider_container">
			 <div class="owl-carousel owl-theme home_slider">
			 	
			 	<!-- Slide -->
			 	<div class="slide">
			 		<div class="background_image" style="background-image:url(images/sala1.jpg)"></div>
			 		<div class="home_container">
			 			<div class="container">
			 				<div class="row">
			 					<div class="col">
			 						
			 					</div>
			 				</div>
			 			</div>
			 		</div>
			 	</div>

			 	<!-- Slide -->
			 	<div class="slide">
			 		<div class="background_image" style="background-image:url(images/quinta1.jpg)"></div>
			 		<div class="home_container">
			 			<div class="container">
			 				<div class="row">
			 					<div class="col">
			 						
			 					</div>
			 				</div>
			 			</div>
			 		</div>
			 	</div>

			 	<!-- Slide -->
			 	<div class="slide">
			 		<div class="background_image" style="background-image:url(images/dor3.jpg)"></div>
			 		<div class="home_container">
			 			<div class="container">
			 				<div class="row">
			 					<div class="col">
			 						
			 					</div>
			 				</div>
			 			</div>
			 		</div>
			 	</div>

			 </div>

			 <!-- Home Slider Navigation -->
			 <div class="home_slider_nav"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
			 
		</div>
	</div>

	<!-- Search -->

	<div class="search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_container">
						<div class="search_title">Estamos para optimizar</div>
						<div class="search_form_container" >
							<form action="#" class="search_form" id="search_form">
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
									<div class="search_inputs d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
										<!-- <h3><p><strong>tu tiempo de difusión y búsqueda de inmuebles...</strong></p></h3> -->
										<div style="font-size:18px" class="text-white"><strong>tu tiempo de difusión y búsqueda de inmuebles...</strong></div>
									</div>
									
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Featured -->

	<div class="featured">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">Realiza la busqueda en 'Publicaciones'</div>
						<div class="section_title"><h1>Encuentra aquí el inmueble que buscas</h1></div>
					</div>
				</div>
			</div>
			<div class="row featured_row" id="listaAzar">
				

				

			</div>
		</div>
	</div>

	<!-- Map Section -->
	<div class="map_section container_reset">
		<div class="container">

		<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle"> ubicaciones de inmuebles en alquiler </div>
						<div class="section_title"><h1>¡Publicación del día!</h1></div>
					</div>
				</div>
			</div>

			<div class="row row-xl-eq-height">

				<!-- Map -->
				<div class="col-xl-7 order-xl-1 order-2">
					<div class="map">
						<div id="google_map" class="google_map">
							<div class="map_container">
								<div id="map"></div>
							</div>
						</div>
					</div>
				</div>

				<!-- Content -->
				<div class="col-xl-5 order-xl-2 order-1">
					<div class="map_section_content">
						<div class="map_overlay">
							<svg fill="#55407d" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
								<path d="M100,0 a-200,150 0 0 0 -100,100 h100 v-100 z" />
							</svg>
						</div>
						<div class="section_title_container">
							<div class="section_subtitle">Selecciona una localidad</div>
							<div class="section_title"><h1>Localidades</h1></div>
						</div>
						<div class="locations_list d-flex flex-column align-items-start justify-content-start" id="listt">
						<!-- se listan las localidades manualmente -->
							<label class="location_contaner" data-lat="-26.2453" data-lng="-58.6292">
								<input type="radio" name="location_radio">
								<span></span>
								Laishi
							</label>
							<label class="location_contaner" data-lat="-26.1833" data-lng="-58.1833">
								<input type="radio" name="location_radio">
								<span></span>
								Formosa
							</label> <!-- se debe terminar de agregar las latitudes y longitudes de las localidades -->
							<label class="location_contaner" data-lat="-25.5667" data-lng="-59.3411">
								<input type="radio" name="location_radio">
								<span></span>
								Palo Santo
							</label>
							<label class="location_contaner" data-lat="-25.291388888889" data-lng="-57.718333333333">
								<input type="radio" name="location_radio">
								<span></span>
								Clorinda
							</label>
							<label class="location_contaner" data-lat="-25.716666666667" data-lng="-59.1">
								<input type="radio" name="location_radio">
								<span></span>
								Pirané
							</label>
							<label class="location_contaner" data-lat="-25.333333333333" data-lng="-59.683333333333">
								<input type="radio" name="location_radio">
								<span></span>
								Fontana
							</label>
							<label class="location_contaner" data-lat="-24.96666667" data-lng="-58.56666667">
								<input type="radio" name="location_radio">
								<span></span>
								El Espinillo
							</label>
							
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Hot -->

	<div class="hot">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">Las mejores ofertas</div>
						<div class="section_title"><h1>¡Publicación del día!</h1></div>
					</div>
				</div>
			</div>
			<div class="row hot_row row-eq-height" id="listaDelDia">
				
				


			</div>
		</div>
	</div>

	<!-- Testimonials -->

	<div class="testimonials container_reset">
		<div class="container">
			<div class="row row-eq-height">
				
				<!-- Testimonials Image -->
				<div class="col-xl-6">
					<div class="testimonials_image">
						<div class="background_image" style="background-image:url(images/familia.jpg)"></div>
						<div class="testimonials_image_overlay"></div>
					</div>
				</div>

				<!-- Testimonials Content -->
				<div class="col-xl-6">
					<div class="testimonials_content">
						<div class="section_title_container">
							
							<div class="section_title"><h1>Testimonios de clientes</h1></div>
						</div>

						<!-- Testimonials Slider -->
						<div class="testimonials_slider_container">
							<div class="owl-carousel owl-theme test_slider">
								
								<!-- Slide -->
								<div class="test_slide">
									<div class="test_quote">"Nos ayudaron a encontrar lo que buscabamos"</div>
									<div class="test_text">
										<p>He visitado los sitios en internet de varias inmobiliarias y aún no he encontrado ninguno que se pueda comparar al de ustedes. Está muy bien organizado, es muy informativo y muy fácil de usar. Los inmuebles están presentados de forma muy atractiva y sobre todo con muy buenas descripciones. Me complace mucho se usuario de éste sitio web.</p>
									</div>
									<div class="test_author"><a href="#">Pintos Maria</a>, Cliente</div>
								</div>

								<!-- Slide -->
								<div class="test_slide">
									<div class="test_quote">"Nos ayudaron a difundir de manera más rápida y segura el inmueble"</div>
									<div class="test_text">
										<p>Como dueño del Complejo Las Americas,solo manifestar que el servicio y las herramientas que brinda VRC-Alquileres-Fsa es de primer nivel. Verdaderamente la posibilidad de “manejar” nosotros gran parte de nuestra página web nos generó una gran libertad a la hora de realizar modificaciones, o agregar o quitar alguna información.
											Sinceramente muy satisfechos con el servicio. Felicitaciones!!!</p>
									</div>
									<div class="test_author"><a href="#">Cristian Mendez</a>, Cliente</div>
								</div>
								<div class="test_slide">
									<div class="test_quote">"Nos ayudaron a difundir de manera más rápida y segura el inmueble"</div>
									<div class="test_text">
										<p>Como dueño del Complejo Las Americas,solo manifestar que el servicio y las herramientas que brinda VRC-Alquileres-Fsa es de primer nivel. Verdaderamente la posibilidad de “manejar” nosotros gran parte de nuestra página web nos generó una gran libertad a la hora de realizar modificaciones, o agregar o quitar alguna información.
											Sinceramente muy satisfechos con el servicio. Felicitaciones!!!</p>
									</div>
									<div class="test_author"><a href="#">Cristian Mendez</a>, Cliente</div>
								</div>


							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	
	
<?php
include 'includes/footer-index.php';
?>