<?php
session_start();
/* crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST */
include 'includes/header-blog.php';
?>


<!-- Home -->

<div class="home">
	<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/blog.jpg"
		data-speed="0.8"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="home_content text-center">
					<div class="home_title">PUBLICACIONES DESTACADAS</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Blog -->

<div class="blog">
	<div class="container">

		<div class="row">

			<!-- Blog Posts -->
			<div class="col-lg-9">

				<div class="blog_posts" id="publicacionDestacada">
					<!-- Blog Post -->




				</div>

				<!-- aqui empieza la paginación -->

				<div class="page_nav">
					<ul class="d-flex flex-row align-items-start justify-content-start" id="paginador">
						<!-- <li class="page-item disabled">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li class="active page-link"><a href="#">01.</a></li>
						<li><a class="page-link" href="#">02.</a></li>
						<li><a class="page-link" href="#">03.</a></li>
						<li>
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li> -->
					</ul>
				</div>

				<!-- finish paginacion -->

			</div>

			<!-- Sidebar /barra lateral/ -->
			<div class="col-lg-3">
				<div class="sidebar">

					<!-- Search -->
					<div class="sidebar_search">
						<form action="#" class="sidebar_search_form">
							<input type="text" class="sidebar_search_input" required="required">
							<button class="sidebar_search_button"><img src="images/search.png" alt=""></button>
						</form>
					</div>

					<!-- Categories -->
					<!-- <div class="categories">
						<div class="sidebar_title">
							<h3>Categories</h3>
						</div>
						<div class="sidebar_list">
						</div>
					</div> -->

					<!-- Archive -->
					<div class="archive">
						<div class="sidebar_title">
							<h3>BUSCAR</h3>
						</div>
						<div class="sidebar_list">
							<ul>
								<li><a href="#">Econónimos</a></li>
								<li><a href="#">Dimensiones grandes</a></li>
								
							</ul>
						</div>
					</div>

					<!-- Tags -->
					<div class="sidebar_tags">
						<div class="sidebar_title">
							<h3>OTROS</h3>
						</div>
						<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
							<li><a href="#">con garage</a></li>
							<li><a href="#">Acepta mascota</a></li>
							<li><a href="#">Mensuales</a></li>
							<li><a href="#">Temposrales</a></li>
						</ul>
					</div><hr>

					<!-- Extra -->
					<div class="sidebar_tags">
						<div class="sidebar_title">
							<h3>PUBLICIDADES</h3>
						</div>
					</div>
					<div class="extra d-flex flex-column align-items-start justify-content-start">
						<div class="background_image" style="background-image:url(images/extra.jpg)"></div>
						<div class="extra_button"><a href="listings.html">Salón de evento?</a></div>
						<div class="extra_phone_container mt-auto">
							<div>Maria Smith</div>
							<div>3705-677892</div>
						</div>
					</div>
					<div class="extra d-flex flex-column align-items-start justify-content-start">
						<div class="background_image" style="background-image:url(images/realtor_2.jpg)"></div>
						<div class="extra_button"><a href="listings.html">Salón de evento?</a></div>
						<div class="extra_phone_container mt-auto">
							<div>Estela Bosh</div>
							<div>3705-956677</div>
						</div>
					</div>

					<!-- Listing -->
					<!-- <div class="sidebar_listing">
						<div class="listing_small">
							<div class="listing_small_image">
								<div>
									<img src="images/listing_6.jpg" alt="">
								</div>
								<div
									class="listing_small_tags d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="listing_small_tag tag_house"><a href="listings.html">house</a></div>
									<div class="listing_small_tag tag_sale"><a href="listings.html">for sale</a></div>
								</div>
								<div class="listing_small_price">$ 562 346</div>
							</div>
							<div class="listing_small_content">
								<div
									class="listing_small_location d-flex flex-row align-items-start justify-content-start">
									<img src="images/icon_1.png" alt="">
									<a href="single.html">280 Doe Meadow Drive Landover, MD 20785</a>
								</div>
								<div class="listing_small_info">
									<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
										<li class="d-flex flex-row align-items-center justify-content-start">
											<img src="images/icon_3.png" alt="">
											<span>2</span>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<img src="images/icon_4.png" alt="">
											<span>5</span>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<img src="images/icon_5.png" alt="">
											<span>2</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div> -->

				</div>
			</div>

		</div>
	</div>
</div>

<!-- Footer -->
<?php
include 'includes/footer-blog.php';
?>