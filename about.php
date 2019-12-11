<?php
session_start();
include 'includes/header-about.php';

?>

	<!-- Menu -->

	<div class="menu text-right">
		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="menu_log_reg">
			<div class="log_reg d-flex flex-row align-items-center justify-content-end">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="#">Login</a></li>
					<li><a href="#">Register</a></li>
				</ul>
			</div>
			<nav class="menu_nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About us</a></li>
					<li><a href="listings.php">Listings</a></li>
					<li><a href="blog.php">News</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/about.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title">NOSOTROS</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Intro -->

	<div class="intro">
		<div class="container">
			<div class="row row-eq-height">
				
				<!-- Intro Content -->
				<div class="col-lg-6">
					<div class="intro_content">
						<div class="section_title_container">
							
							<div class="section_title"  ><h1 style="color:#7049BE">¿Quiénes somos?</h1></div>
						</div>
						<div class="intro_text">
							<p style="color:black">Somos un equipo que nos estamos insertando en el desarrollo de software, nos abocamos en el desarrollo de un sitio web destinado a la búsqueda y difusión de alquileres, ofreciendo ética profesional, honestidad y excelente confianza a nuestros clientes. Eso nos convierte en un grupo dinámico, con sólida y eficiente metodología de trabajo.</p>
						</div>
						
					</div>
				</div>

				<!-- Intro Image -->
				<div class="col-lg-6 intro_col">
					<div class="intro_image">
						<div class="background_image" style="background-image:url(images/nos.jpg)"></div>
						<img src="images/intro.jpg" alt="">
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Services -->

	<div class="services">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle"></div>
						<div class="section_title"><h1>TE BRINDAMOS...</h1></div>
					</div>
				</div>
			</div>
			<div class="row services_row">
				
				<!-- Service -->
				<!-- <div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_1.png" alt="">
							</div>
							<div class="service_title"><h3>Comunicación en tiempo real</h3></div>
						</div>
						<div class="service_text">
							<p>Tenés a disposición una sala de chat, para que puedas realizar las consultas que desees, en el momento que desees...</p>
						</div>
					</div>
				</div> -->

				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_2.png" alt="">
							</div>
							<div class="service_title"><h3>Módulo de Publicación</h3></div>
						</div>
						<div class="service_text">
							<p>Aquí podras llevar a acabo la difusión de los inmuebles, agregando toda la información relevante que hacen que dicho inmueble sea valioso...</p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_3.png" alt="">
							</div>
							<div class="service_title"><h3>Módulo de Consultas</h3></div>
						</div>
						<div class="service_text">
							<p>En ésta sección podras llevar a cabo la búsqueda del inmueble que desees, insertando filtros que se ajusten a tus gustos... </p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_4.png" alt="">
							</div>
							<div class="service_title"><h3>Descripciones del contexto del inmueble</h3></div>
						</div>
						<div class="service_text">
							<p>En cada publicación, tendrás a disposición descripciones acerca del contexto del inmueble, como ser centros de salud cercanos, establecimientos educativos, líneas de colectivo...
								
							</p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_5.png" alt="">
							</div>
							<div class="service_title"><h3>Publicaciones recientes</h3></div>
						</div>
						<div class="service_text">
							<p>Aquí tendrás a disposición las publicaciones de inmuebles del día, es decir aquellas más recientes.</p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_6.png" alt="">
							</div>
							<div class="service_title"><h3>Accesibilidad de Precios</h3></div>
						</div>
						<div class="service_text">
							<p>Podrás realizar la búsqueda de inmuebles acordes a tu ingreso, podrás ordenarlos de acuerdo al valor que estás dispuesto a pagar.</p>
						</div>
					</div>
				</div>

					<!-- Service -->
					<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_1.png" alt="">
							</div>
							<div class="service_title"><h3>Ubicación en tiempo real</h3></div>
						</div>
						<div class="service_text">
							<p>Tenés a disposición un mapa que muestra todos los marcadores con las respectivas direcciones de los inmuebles en alquiler...</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Milestones -->

	<div class="milestones">
		<div class="container">
			<div class="row">
				
				<h1 class="text-white">¡Te ayudamos a tomar la mejor decisión!</h1>

			</div>
		</div>
	</div>

	<!-- Agents -->

	<div class="agents">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						
						<div class="section_title"><h1>Generadoras del Sitio</h1></div>
					</div>
				</div>
			</div>
			<div class="row agents_row">
				
				<!-- Agent -->
				<div class="col-lg-4 agent_col">
					<div class="agent">
						<div class="agent_image"><img src="images/karen1.png" width="690"  height="500" alt=""></div>
						<div class="agent_content">
							<div class="agent_name"><a href="#">Chavez, Karen</a></div>
							<div class="agent_title">Formosa</div>
							<div class="agent_list">
								<ul>
									<li>karen@gmail.com</li>
									
								</ul>
							</div>
							<div class="social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Agent -->
				<div class="col-lg-4 agent_col">
					<div class="agent">
						<div class="agent_image"><img src="images/sil.jpg"  width="690"  height="500" alt=""></div>
						<div class="agent_content">
							<div class="agent_name"><a href="#">Romero, Silvana</a></div>
							<div class="agent_title">Pirané, Formosa</div>
							<div class="agent_list">
								<ul>
									<li>sil@gmail.com</li>
									
								</ul>
							</div>
							<div class="social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Agent -->
				<div class="col-lg-4 agent_col">
					<div class="agent">
						<div class="agent_image"><img src="images/vero1.jpg" width="690"  height="500" alt=""></div>
						<div class="agent_content">
							<div class="agent_name"><a href="#">Vera, Verónica</a></div>
							<div class="agent_title">Palo Santo, Formosa</div>
							<div class="agent_list">
								<ul>
									<li>veravero@gmail.com</li>
									
								</ul>
							</div>
							<div class="social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>
			
			<!-- CONTACTO -->

	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						
						<div class="section_title"><h1>Estamos en contacto</h1></div>
					</div>
				</div>
			</div>
			<div class="row contact_row">

				

				<!-- Contact - About -->
				<div class="col-lg-4 contact_col">
					<div class="logo"><a href="#" style="color:#7049BE">VRC-<span style="color:#7049BE">Alquileres</span></a></div>
					<div class="contact_text">
						<p style="color:black">Te brindamos éste espacio para que puedas realizar tus consultas, las cuáles serán atendidas a la brevedad...
							Además tienes a disposición los diferentes medios con que puedes comunicarte con nosotros. </p>
					</div>
				</div>

				<!-- Contact - Info -->
				<div class="col-lg-4 contact_col">
					<div class="contact_info">
						<ul>
							<li class="d-flex flex-row align-items-center justify-content-start">
								<div class="d-flex flex-column align-items-center justify-content-center">
									<div><img src="images/placeholder_2.svg" alt=""></div>
								</div>
								<span>Maipú, 356, Formosa Capita</span>
							</li>
							<li class="d-flex flex-row align-items-center justify-content-start">
								<div class="d-flex flex-column align-items-center justify-content-center">
									<div><img src="images/phone-call-2.svg" alt=""></div>
								</div>
								<span>+543 705221 122</span>
							</li>
							<li class="d-flex flex-row align-items-center justify-content-start">
								<div class="d-flex flex-column align-items-center justify-content-center">
									<div><img src="images/envelope-2.svg" alt=""></div>
								</div>
								<span>vrcalquileresfsa@gmail.com</span>
							</li>
						</ul>
					</div>
				</div>

				<!-- Contact - Image -->
				<div class="col-lg-4 contact_col">
					<div class="contact_image d-flex flex-column align-items-center justify-content-center">
						<img src="images/alqui.jpg" alt="">
					</div>
				</div>

			</div>
			<div class="row contact_form_row">
				<div class="col">
					<div class="contact_form_container">
						<form action="#" class="contact_form text-center" id="contact_form">
							<div class="row">
								<div class="col-lg-4">
									<input type="text" class="contact_input" placeholder="Ingresa tu Nombre" required="required">
								</div>
								<div class="col-lg-4">
									<input type="email" class="contact_input" placeholder="Ingresa tu dirección de Email" required="required">
								</div>
								<div class="col-lg-4">
									<input type="text" class="contact_input" placeholder="Consulta" required="required">
								</div>
							</div>
							<textarea class="contact_textarea contact_input" placeholder="Mensaje" required="required"></textarea>
							<button class="contact_button">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Google Map -->

	<!-- <div class="contact_map_container">
		<div class="map">
			<div id="google_map" class="google_map">
				<div class="map_container">
					<div id="map"></div>
				</div>
			</div>
		</div>
	</div> -->
		</div>
	</div>

	<!-- Footer -->
<?php
include 'includes/footer.php';
?>