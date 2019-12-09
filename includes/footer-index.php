<footer class="footer">
	<div class="footer_content">
		<div class="container">
			<div class="row">

				<!-- Footer Column  --- explicacion de vrc-alquileres -->
				<div class="col-xl-3 col-lg-6 footer_col">
					<div class="footer_about">
						<div class="footer_logo"><a href="index.php">VRC-<span>ALQUILERES</span></a></div>
						<div class="footer_text">
							<p>VRC-Alquileres es una plataforma que te brinda toda la información para que puedas
								encontrar el inmueble que buscas como también la posibilidad de publicarlos</p>
						</div>
						<div class="social">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<!-- PREGUNTAMOS SI EXISTE UNA SESSION ACTIVA ENTONCES MOSTRAMOS EL BOTON DE PUBLICAR QUE LO LLEVA A SU CUENTA -->
						<?php 
						if (isset($_SESSION['active'])) {
						if ($_SESSION['rol']==1 || $_SESSION['rol']==2) { ?>
						<div class="footer_submit"><a href="./blog-form.php">Publicar Inmueble</a></div>
						<?php }} else { ?>
						<!-- DE LO CONTRARIO APARECE EL BOTON PERO LO REDIRECCIONA A QUE SE REGISTRE -->
						<div class="footer_submit"><a href="./index_iniciar.php">Publicar Inmueble</a></div>
						<?php } ?>
					</div>
				</div>

				<!-- Footer Column ---- informacion -->
				<div class="col-xl-3 col-lg-6 footer_col">
					<div class="footer_column">
						<div class="footer_title">Información</div>
						<div class="footer_info">
							<ul>
								<!-- Phone -->
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div><img src="images/phone-call.svg" alt=""></div>
									<span>+543 705221 122</span>
								</li>
								<!-- Address -->
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div><img src="images/placeholder.svg" alt=""></div>
									<span>Maipú, 356, Formosa Capital</span>
								</li>
								<!-- Email -->
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div><img src="images/envelope.svg" alt=""></div>
									<span>vrcalquileresfsa@gmail.com</span>
								</li>
							</ul>
						</div>
						<div class="footer_links usefull_links">
							<div class="footer_title">Enlaces</div>
							<ul>
								<li><a href="index.php">Testimonios</a></li>
								<li><a href="listings.php">Publicaciones</a></li>
								<li><a href="blog.php">Destacados</a></li>
								<li><a href="contact.php">contacta la agencia</a></li>
								<li><a href="about.php">nosotros</a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Footer Column --- aqui van los enlaces de filtro de los tipo de inmuebles -->
				<div class="col-xl-3 col-lg-6 footer_col">
					<div class="footer_links">
						<div class="footer_title">Tipos de inmuebles</div>
						<ul>
							<li><a href="listings.php">Departamentos</a></li>
							<li><a href="listings.php">Locales</a></li>
							<li><a href="listings.php">Casas</a></li>
							<li><a href="listings.php">Vacacionales</a></li>
							<li><a href="listings.php">Oficinas</a></li>
							<li><a href="listings.php">Eventos</a></li>
							<li><a href="listings.php">Temporarios</a></li>


						</ul>
					</div>
				</div>

				<!-- Footer Column ----- aquí va la publiacon más reciente con ajax -->
				<div class="col-xl-3 col-lg-6 footer_col">

					<div class="footer_title">Publicación reciente </div>
					<div class="listing_small" id="footer_publicacion">


					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer_bar">
		<div class="container">
			<div class="row">
				<div class="col">
					<div
						class="footer_bar_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
						<div class="copyright order-md-1 order-2">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							VRC-ALQUILERES &copy;<script>
								document.write(new Date().getFullYear());
							</script> Todos los derechos reservados |
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</div>
						<nav class="footer_nav order-md-2 order-1 ml-md-auto">
							<ul
								class="d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
								<li><a href="index.php">Inicio</a></li>
								<li><a href="about.php">Nosotros</a></li>
								<li><a href="listings.php">Publicaciones</a></li>
								<li><a href="blog.php">Destacados</a></li>
								<li><a href="about.php">Contacto</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHpypaMnDl_DTgY_5mb5AzDxrnReEDMDo"></script>
<script src="js/custom.js"></script>
<script src="ajax/index.js"></script>
<script src="app.js"></script>
<script src="ajax/footer.js"></script>
</body>

</html>