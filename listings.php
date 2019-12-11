<?php
session_start();
include 'includes/header-listings.php';
?>

<!-- Home -->

<div class="home">
	<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/listings.jpg"
		data-speed="0.8"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="home_content text-center">
					<div class="home_title">LISTA DE PUBLICACIONES</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Search -->


<div class="search">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="search_container">
					<div class="search_form_container">

						<form action="#" class="search_form" id="search_form">
							<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">

								<select class="search_input" id="localidad_seleccionada" style="margin-left: 0px;">
									<option disabled selected value>Localidad</option>
								</select>


								<select class="search_input" id="barrio_seleccionado">
									<option disabled selected value>Barrio</option>
								</select>

								<select class="search_input" id="subcategoria_seleccionado">
									<option disabled selected value>Subcategoría</option>
								</select>

							</div><br>

							<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">

								<input type="number" class="search_input" id="minimo" placeholder="Precio Min" min="0"
									max="9000000" style="margin-left: 0px;">

								<input type="number" class="search_input" id="maximo" placeholder="Precio Max" min="0"
									max="9000000">

								<select class="search_input" id="nroHabitaciones">
									<option disabled selected value>Cantidad habitaciones</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>

							</div><br>

							<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
								<button class="search_button mx-auto" id="btnBuscar">Buscar</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Listings -->

<div class="listing">
	<div class="container">
		<div class="row">
			<!-- <div class="col"> -->
			<div class="blog_posts">


				<!-- Sorting -->
				<div class="sorting d-flex flex-md-row flex-column align-items-start justify-content-start">

				<!-- Tags -->
				<div class="listing_tags">
						<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
						    <li><a href="#">Mensual<span>x</span></a></li>
						    <li><a href="#">Temporal<span>x</span></a></li>
							<li><a href="#">Con Garage<span>x</span></a></li>
							<li><a href="#">Sin Garage<span>x</span></a></li>
							<li><a href="#">Con Mascota<span>x</span></a></li>
							<li><a href="#">Sin Mascota<span>x</span></a></li>
							
							
						</ul>
					</div>

				<!-- Sort -->
				<div class="sorting_container">
						<div class="sort">
							<span>Ordenar Por:</span>
							<ul>
								<li class="sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Defecto
								</li>
								<li class="sorting_button" data-isotope-option='{ "sortBy": "price" }'>Pricio</li>
								<li class="sorting_button" data-isotope-option='{ "sortBy": "area" }'>Area</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Listings Container AQUÍ SE MUESTRAN LAS PUBLICACIONNES -->

				<div class="listings_container  justify-content-between align-items-start">
				<div class="row" id="listarPub">

				</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- Footer -->


<?php
include 'includes/footer-listings.php';
?>