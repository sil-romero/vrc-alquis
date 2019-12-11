<?php
/* crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST */
session_start();
include 'includes/header-single.php';
$idPublicacion = $_GET['id'];
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
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/listings.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title">PUBLICACIÓN</div>
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
							
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Listing -->

	<div class="listing_container">
		<div class="container">
			<div class="row" id="unica_Publicacion">








				
			</div>
		</div>
	</div>
<?php
	include 'includes/footer-single.php';
?>
	<script>

		$.post('ajax/detalle_publicacion.php', {idPublicacion:<?php echo $idPublicacion; ?>}, function (response) {
				let detallePublicacion = JSON.parse(response);
					console.log(response);
				template ='';

				detallePublicacion.forEach(element => {
					template += `
					


					<!-- este es el pedazo de codigo de single.php para mostrar detalladamente una publicacion -->
            <div class="col">

            <!-- Image -->
            <div class="listing_image"><img src="data:image/jpg;base64,${element.imagen_1}" width=1200 height=700 alt=""></div>

            <!-- Tabs -->
            <div class="listing_tabs d-flex flex-row align-items-start justify-content-between flex-wrap">

                <!-- Tab -->
                <div class="tab">
                    <input type="radio" id="tab_1" name="listing_tabs" checked>
                    <label for="tab_1"></label>
                    <div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
                        <div class="tab_icon"><img src="images/house.svg" class="svg" alt=""></div>
                        <span>Inmueble</span>
                    </div>
                </div>

                <!-- Tab -->
                <div class="tab">
                    <input type="radio" id="tab_2" name="listing_tabs">
                    <label for="tab_2"></label>
                    <div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
                        <div class="tab_icon"><img src="images/houses.svg" class="svg" alt=""></div>
                        <span>Descripciones</span>
                    </div>
                </div>

                <!-- Tab -->
                <div class="tab">
                    <input type="radio" id="tab_3" name="listing_tabs">
                    <label for="tab_3"></label>
                    <div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
                        <div class="tab_icon"><img src="images/house2.svg" class="svg" alt=""></div>
                        <span>Fotos</span>
                    </div>
                </div>

                <!-- Tab -->
                <div class="tab">
                    <input type="radio" id="tab_5" name="listing_tabs">
                    <label for="tab_5"></label>
                    <div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
                        <div class="tab_icon"><img src="images/directions.svg" class="svg" alt=""></div>
                        <span>Contexto</span>
                    </div>
                </div>

                <!-- Tab -->
                <div class="tab">
                    <input type="radio" id="tab_6" name="listing_tabs">
                    <label for="tab_6"></label>
                    <div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
                        <div class="tab_icon"><img src="images/location.svg" class="svg" alt=""></div>
                        <span>Ubicación</span>
                    </div>
                </div>

                <!-- Tab -->
                <div class="tab">
                    <input type="radio" id="tab_7" name="listing_tabs">
                    <label for="tab_7"></label>
                    <div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
                        <div class="tab_icon"><img src="images/contract.svg" class="svg" alt=""></div>
                        <span>Contacto</span>
                    </div>
                </div>

            </div>

            <!-- About -->
            <div class="about">
                <div class="row">
                    <!-- primera divicion -descripciones del usuario y direccion -->
                    <div class="col-lg-6">
                        <div class="property_info">
                            <div class="tag_price listing_price">$ ${element.precio}</div>
                            <div class="listing_name"><h1>${element.nombre_localidad}| ${element.nombre_barrio} </h1></div>
                            <div class="listing_location d-flex flex-row align-items-start justify-content-start">
                                <img src="images/icon_1.png" alt="">
                                <span>${element.nombre_calle} ${element.altura_calle}</span>
                            </div>
                            <div class="listing_list">
                                <ul>
                                    <li>Categoría: ${element.nombre_categoria}</li>
                                    <li>Subcategoría: ${element.nombre_subcategoria}</li>
                                    <li>Publicado el: ${element.fecha_hora}</li>
                                </ul>
                            </div>
                            <div class="prop_agent d-flex flex-row align-items-center justify-content-start">
                                <div class="prop_agent_image"><img src="data:image/jpg;base64,${element.perfil_persona}" alt=""></div>
                                <div class="prop_agent_name"><a href="#">${element.nombre_persona} </a> ${element.apellido_persona} </div>
                            </div>
                            <div class="prop_info">
                                <ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <img src="images/icon_2_large.png" alt="">
                                        <div>
                                            <div>${element.dimension} m^2 </div>
                                        </div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <img src="images/cama.png" alt="" width="40" height="45">
                                        <div>
                                            <div>${element.nro_habitaciones}</div>
                                        </div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <img src="images/gato.png" alt="" width="40" height="45">
                                        <div>
                                            <div>${element.acepta_mascota}</div>
                                        </div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <img src="images/icon_5_large.png" alt="">
                                        <div>
                                            <div>${element.garage}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- segunda división - estan las descripciones - -->
                    <div class="col-lg-6">
                        <div class="about_text">
                            <h3 style="color:grey">${element.descripcion}</h3>
                        </div>
                    </div>
                    <!-- tercera división - mas descripciones - -->
                    <div class="col-lg-6">
                        <div class="listing_features">
                            <div class="listing_title"><h3>CONTACTO</h3></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul>
										<li> Teléfono </li>
										${(element.ver_telefono == 'si')?`<li> ${element.telefono}</li>`:''}
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul>
                                        <li> Email </li>
                                        ${(element.ver_email == 'si')?`<li> ${element.user_email}</li>`:''}
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- segunda división - estan las descripciones - -->
                    <div class="col-lg-6">
						<div class="about_text">
						<ul>
							<li> <h4 style="color:grey">LOCALES COMERCIALES CERCANOS: </h4> <p>${element.locales_comerciales}</p></li>

							<li> <h4 style="color:grey">INSTITUCIONES EDUCATIVAS CERCANAS: </h4> <p>${element.inst_educativas}</p></li>

							<li> <h4 style="color:grey">CENTROS DE SALUD CERCANOS: </h4> <p>${element.centros_salud}</p></li>

							<li> <h4 style="color:grey">LINEAS DE COLECTIVOS CERCANOS: </h4> <p>${element.lineas_colectivo}</p></li>
							
                        </ul> 
                        </div>
                    </div>
                    <!-- cuarta división - video-  -->
                    <!-- <div class="col-lg-6">
                        <div class="listing_video">
                            <div class="listing_title"><h3>Video</h3></div>
                            <div class="video_container d-flex flex-column align-items-center justify-content-center">
                                <img src="images/video.jpg" alt="">
                                <div class="video_button"><a class="youtube" href="https://www.youtube.com/embed/IV3ueyrp5M4?autoplay=1"><i class="fa fa-play" aria-hidden="true"></i></a></div>
                            </div>
                        </div>
                    </div> -->
                </div>		
            </div>
            <div class="google_map_container">
                <div class="map">
                    <div id="google_map" class="google_map">
                        <div class="map_container">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


					`
					
				});

				$('#unica_Publicacion').html(template);
				
			})


	</script>

	<!-- Footer -->
