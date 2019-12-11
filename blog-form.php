<?php
session_start();
/* crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST */
include 'includes/header-blog-form.php';

if (!isset($_SESSION['active'])) {
	/* PREGUNTO SI NO HAY UNA SESION ACTIVA, CARGO EL INDEX */
	header('location: index.php');
}
?>

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/blog.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title">
							<!-- TRAIGO LA IMAGEN QUE CARGO EL USUARIO COMO FOTO DE PERFIL Y LA VARIABLE GLOBAL NOMBRE= nombre y apellido -->
						<div><img src="data:image/jpg;base64,<?php echo $imagen; ?>" alt="" width="100" height="100"></div>
						<h2><span><a href=""  style="text-decoration: none;color: white;"><?php echo $_SESSION['nombre']; ?></a></span></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>

	<!-- Blog -->


<div class="blog" style="background-color: #D8BFD8;">

<!-- <div class="footer_submit mx-auto"><a href="form-page.php">Ver mis publicaciones</a></div> -->

<br>
		<div class="container">
	
		  <div class="card mx-auto mt-5 col-md-10 mb-5">
			<div class="card-header text-center text-white" style="background-color: #55407d;">FORMULARIO DE PUBLICACION</div>
			<div class="card-body">
			  <form id="form-publicacion">
				<div class="form-group">
				  <ul class="nav nav-tabs" id="myTab" role="tablist">
				  <!-- role="tablist" lista de elementos de tabulación -->
					<li class="nav-item">
					  <a class="nav-link active" id="fotos-tab" data-toggle="tab" href="#fotos" role="tab"
						aria-controls="fotos" aria-selected="true">Fotos</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" id="categorias-tab" data-toggle="tab" href="#categorias" role="tab"
						aria-controls="categorias" aria-selected="false">Categorias</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" id="ubicacion-tab" data-toggle="tab" href="#ubicacion" role="tab"
						aria-controls="ubicacion" aria-selected="false">Ubicación</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" id="descripciones-tab" data-toggle="tab" href="#descripciones" role="tab"
						aria-controls="descripciones" aria-selected="false">Descripciones</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" id="masinfo-tab" data-toggle="tab" href="#masinfo" role="tab"
						aria-controls="masinfo" aria-selected="false">Más información</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" id="confir-tab" data-toggle="tab" href="#confir" role="tab" aria-controls="confir"
						aria-selected="false">Confirmación</a>
					</li>
				  </ul>
				  <div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="fotos" role="tabpanel" aria-labelledby="fotos-tab">
					  <div class="form-row">
						<div class="col-md-4">
						  <!-- presentar el contenido -->
						  <div class="card" style="width: 18rem;">
							<div class="card-body">
							  <h5 class="card-title">Selecciona las fotos</h5>
							  <p class="card-text">Haz click en examinar y selecciona la imagen que deseas destacar
								en la publicación. luego pulsa
								subir, para cargar la imagen en el formulario.
							  </p>
							  <br>
							  <p class="card-text"><small class="text-muted">realiza el mismo proceso si deseas otra
								  imagen</small></p>
							</div>
						  </div>
						</div>
						<!-- OPCION PARA QUE EL USUARIO PUEDA CARGAR 5 FOTOS, CADA UNA SE CAPTURA CON DISTINTO ID -->
						<div class="col-md-4">
						  <div class="card" style="width: 18rem;">
							<img src="images/icono-1.png" width="100" height="200" class="card-img" alt="...">
							<div class="card-body">
							  <div class="form-group">
								<input type="file" class="form-control-file" name="image1" id="image" required="required">
							  </div>
							  <input type="button" id="subir" class="btn btn-info upload" value="Subir">
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 18rem;">
							<img src="images/icono-1.png" width="100" height="200" class="card-img" alt="...">
							<div class="card-body">
							  <div class="form-group">
								<input type="file" class="form-control-file" name="image2" id="image1">
							  </div>
							  <input type="button" id="subir1" class="btn btn-info upload" value="Subir">
							</div>
						  </div>
						</div>
					  </div>
					  <div class="form-row">
						<div class="col-md-4">
						  <div class="card" style="width: 18rem;">
							<img src="images/icono-1.png" width="100" height="200" class="card-img" alt="...">
							<div class="card-body">
							  <div class="form-group">
								<input type="file" class="form-control-file" name="image3" id="image2">
							  </div>
							  <input type="button" id="subir2" class="btn btn-info upload" value="Subir">
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 18rem;">
							<img src="images/icono-1.png" width="100" height="200" class="card-img" alt="...">
							<div class="card-body">
							  <div class="form-group">
								<input type="file" class="form-control-file" name="image4" id="image3">
							  </div>
							  <input type="button" id="subir3" class="btn btn-info upload" value="Subir">
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 18rem;">
							<img src="images/icono-1.png" width="100" height="200" class="card-img" alt="...">
							<div class="card-body">
							  <div class="form-group">
								<input type="file" class="form-control-file" name="image5" id="image4">
							  </div>
							  <input type="button" id="subir4" class="btn btn-info upload" value="Subir">
							</div>
						  </div>
						</div>
					  </div>
					</div> <!-- aca termina un tabs -->
					
					<div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
					  <div class="form-group"><br><br>
						<p>
						  <h5>Selecciona la categoria y subcategoria </h5>
						</p><br><br>
						<div class="form-row">
						  <div class="col-md-6">
							<select id="categoria" class="btn btn-info dropdown-toggle btn-block">
								<option selected value="">Categoria</option>
							</select>
						  </div>
						  <div class="col-md-6">
							<select id="subcategoria" name="subcategoria" class="btn btn-info dropdown-toggle btn-block">
							  <option selected value="">Subcategoria</option>
							</select>
						  </div>
						</div><br><br>
					  </div>
					  <hr> <!-- aca termina el 2do tabs -->
	  
					</div>
					<div class="tab-pane fade" id="ubicacion" role="tabpanel" aria-labelledby="ubicacion-tab">
					  <div class="form-group">
						<p>
						  <h5> Ubicación </h5>
						</p>
						<div class="form-row">
						  <div class="col-md-6">
							<label for="localidad">Localidad</label>
							<select id="localidad" name="localidad_lugar" class="btn btn-info dropdown-toggle btn-block">
							  <option value="" disabled selected hidden>Localidad</option>
							</select>
						  </div>
						  <div class="col-md-6">
							<label for="barrio">Barrio</label>
							<select id="barrio" name="barrio_lugar" class="btn btn-info dropdown-toggle btn-block">
							  <option value="" disabled selected hidden>Barrio</option>  
							</select>
						  </div>
						</div><br>
						<div class="form-row">
						  <div class="col-md-6">
						  	<div class="form-group">
							  <label for="latitud">Latitud</label>
							  <input type="text" id="latitud" class="form-control" placeholder="N°Latitud">
							</div>
						  </div>
						  <div class="col-md-6">
						  	<div class="form-group">
							  <label for="latitud">Longitud</label>
							  <input type="text" id="longitud" class="form-control" placeholder="N°Longitud">
							</div>
						  </div>
						</div><br>
						<div class="form-row">
						  <div class="col-md-4">
							<div class="form-group">
							  <label for="calle">Dirección</label>
							  <input type="text" id="calle" class="form-control" placeholder="Calle" required="required">
							</div>
						  </div>
						  <div class="col-md-4">
							<div class="form-group">
							  <label for="altura">Altura</label>
							  <input type="text" id="altura" class="form-control" placeholder="000" required="required">
							</div>
						  </div>
						  <div class="col-md-4">
							<div class="form-group">
							  <label for="nro-departamento">N° de departamento</label>
							  <input type="text" id="nro_departamento" class="form-control" placeholder="N°">
							</div>
						  </div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
							  <label for="">Esta ubicado sobre calle de: </label>
							  <select id="tipo_calle" class="btn btn-info dropdown-toggle btn-block">
							  </select>
							</div>
						  </div>
					  </div>
					  <div class="row" style="width: 500px; height: 300px;">
					  	<div id="map">
					  		
					  	</div>
					  </div>
					  <hr>
	  
					</div> <!-- aca termina el tercer tabs -->

					<div class="tab-pane fade" id="descripciones" role="tabpanel" aria-labelledby="descripciones-tab">
					  <div class="form-group">
						<p>
						  <h5> Descripciones del inmueble </h5>
						</p>
						<div class="form-row mb-2">
						  <label for="descripcionInmueble">Agrega una descripción</label>
						  <textarea id="descripcionInmueble" id="descripcion" cols="20" rows="5" class="form-control"
							placeholder="Descripcion del inmueble" required="required"></textarea>
						</div>
						<div class="form-row">
						  <div class="col-md-4">
							<div class="form-group">
							  <label for="precio">Precio</label>
							  <input type="text" id="precio" class="form-control" placeholder="$000" required="required">
							</div>
						  </div>
						  <div class="col-md-4">
							<div class="form-group">
							  <label for="dimension">Dimensión</label>
							  <input type="text" id="dimension" class="form-control" placeholder="En metros cuadrados" required="required">
							</div>
						  </div>
						  <div class="col-md-4">
							<label for="">N° de Habitaciones</label>
							<input type="text" id="habitaciones" class="form-control" placeholder="1" required="required">
						  </div>
						</div>
					   <div class="form-row">
						  <div class="col-md-6">
							  <div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="garage" id="garage" value="si">
								  <label class="form-check-label" for="garage">Con garage</label>
							  </div>
						  </div>
						  <div class="col-md-6">
							  <div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="garage" value="no">
								  <label class="form-check-label" for="inlineRadio2">Sin garage</label>
							  </div>
						  </div>
						</div><br>
					  </div>
					  <hr>
					</div> <!-- aca termina el 4to tabs -->

					<div class="tab-pane fade" id="masinfo" role="tabpanel" aria-labelledby="masinfo-tab">
	  
					  <div class="form-group">
						<p>
						  <h5>Más información</h5>
						</p>
						<div class="form-row">
						  <div class="col-md-6">
							<label for="comercio"> Locales comerciales cercanos </label>
							<textarea id="comercio" cols="20" rows="5" class="form-control" placeholder=""></textarea>
						  </div>
						  <div class="col-md-6">
							<label for="salud"> Centros de salud cercanos </label>
							<textarea id="salud" cols="20" rows="5" class="form-control" placeholder=""></textarea>
						  </div>
						</div>
						<div class="form-row">
						  <div class="col-md-6">
							<label for="insti"> Instituciones educativas cercanas</label>
							<textarea id="insti" cols="20" rows="5" class="form-control" placeholder=""></textarea>
						  </div>
						  <div class="col-md-6">
							<label for="colectivo"> Lineas de colectivos cercanos </label>
							<textarea id="colectivo" cols="20" rows="5" class="form-control"
							  placeholder="Especificar las lineas que transitan a un radio máximo de 5 cuadras"></textarea>
						  </div>
						</div><br>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="mascota" id="mascota" value="si">
									<label class="form-check-label" for="mascota">Acepto mascotas</label>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="mascota" value="no">
									<label class="form-check-label" for="inlineRadio2">No acepto mascotas</label>
								</div>
							</div>
						  </div>
					  </div>
					  <hr>
					</div> <!-- aca termina el 5to tabs -->
					<!-- aca termina el 6to tabs -->
					<div class="tab-pane fade" id="confir" role="tabpanel" aria-labelledby="confir-tab">
						<div class="form-group">
						
							<div class="card-body text-center">
							   Si ha completedo todos los campos exitosamente, ya puede publicarlo.
							</div>
						
					  <button type="submit" id="publicar" class="contact_button btn-responsive"> Publicar </button>
					
					</div>
					</div> <!-- aca termina el ultimo tabs -->
	  
				  </div>
				</div>					
				</div>
			  </form>
			</div>
		  </div>
		</div>
	</div>

<?php
include 'includes/footer-blog-form.php';
?>
</body>
</html>