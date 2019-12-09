$(document).ready(function () {
    
listarInicio();
publicacionInicio();

});

function listarInicio () { 

    $.ajax({
        url: "ajax/listar_inicio.php",
        type: "GET",
        //data: "data",
        success: function (response) {
            let listaInicio = JSON.parse(response);
            console.log(listaInicio);
            let template = '';

            listaInicio.forEach(element => {
                template += `
                
                    <!-- Featured Item -->
				<div class="col-lg-4">
					<div class="listing">
						<div class="listing_image">
							<div class="listing_image_container">
								<img src="data:image/jpg;base64,${element.imagen}" width=400 height=250 alt="" >
							</div>
							<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
								<div class="tag tag_house"><a href="listings.php">${element.nombre_categoria}</a></div>
								<div class="tag tag_sale"><a href="listings.php">${element.nombre_subcategoria}</a></div>
							</div>
							<div class="tag_price listing_price">$ ${element.precio}</div>
						</div>
						<div class="listing_content">
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								<img src="images/icon_1.png" alt="">
								<a href="#">${element.nombre_localidad}| ${element.nombre_calle} ${element.altura_calle}</a>
							</div>
							<div class="listing_info">
								<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
									<li class="property_area d-flex flex-row align-items-center justify-content-start">
										<img src="images/icon_2.png" alt="">
										<span>${element.dimension}</span>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<img src="images/cama.png" alt="" width="20" height="23">
										<span>${element.nro_habitaciones}</span>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
                                    <img src="images/gato.png" alt="" width="20" height="23">
										<span>${element.acepta_mascota}</span>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<img src="images/icon_5.png" alt="">
										<span>${element.garage}</span>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
										<span> publicado: ${element.fecha_hora}</span>
                                    </li>
								</ul>
							</div>
						</div>
					</div>
				</div>`

            });
            $("#listaAzar").html(template);
        }
    });

 }

 

 function publicacionInicio() {
     
    $.ajax({
        url: "ajax/footer_publicacion.php",
        type: "GET",
        //data: "data",
        success: function (response) {
            let listaInicio = JSON.parse(response);
            console.log(listaInicio);
            let template = '';

            listaInicio.forEach(element => {
                template += `

                <!-- Hot Deal Image -->
				<div class="col-lg-6">
					<div class="hot_image">
						<div class="background_image" style="background-image:url(data:image/jpg;base64,${element.imagen})"></div>
						<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
							<div class="tag tag_house"><a href="listings.php">${element.nombre_categoria}</a></div>
							<div class="tag tag_sale"><a href="listings.php">${element.nombre_subcategoria}</a></div>
						</div>
					</div>
				</div>

				<!-- Hot Deal Content -->
				<div class="col-lg-6">
					<div class="hot_content">
						<div class="hot_deal">
							<div class="tag_price">$${element.precio}</div>
							<div class="hot_title"><a href="#">${element.nombre_localidad} </a></div>
							<div class="prop_location d-flex flex-row align-items-start justify-content-start">
								<img src="images/icon_1.png" alt="">
								<span>Barrio: ${element.nombre_barrio}  -  ${element.nombre_calle} ${element.altura_calle}</span>
							</div>
							<div class="prop_text">
								<p>${element.descripcion}</p>
							</div>
							<div class="prop_agent d-flex flex-row align-items-center justify-content-start">
								<div class="prop_agent_image"><img src="data:image/jpg;base64,${element.perfil_persona}" alt=""></div>
								<div class="prop_agent_name"><a href="#">${element.nombre_persona} ${element.apellido_persona}</a></div>
							</div>
						</div>
						<div class="prop_info">
							<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
								<li class="d-flex flex-row align-items-center justify-content-start">
									<img src="images/icon_2_large.png" alt="">
									<div>
										<div>${element.dimension}</div>
										
									</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="images/cama.png" alt="" width="40" height="40">
									<div>
										<div>${element.nro_habitaciones}</div>
									
									</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
                                <img src="images/gato.png" alt="" width="40" height="40">
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
                                <li class="d-flex flex-row align-items-center justify-content-start">
									<div>
										<div>Publicado el:  ${element.fecha_hora}</div>
										
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
                
              `
            });
            $("#listaDelDia").html(template);
        }
    });

 }

 /* imprime los label, radios de las localidades con sus latitudes y longitudes en el inicio  - aun no funciona*/
/* function listarLatLon(){ 
    $.ajax({
        url: "ajax/traer_lat_long_ajax.php",
        type: "POST",
        //data: "data",
        success: function (response) {
            let categoria = JSON.parse(response);
            let template = '';
            categoria.forEach(element => {
                template += `<label class="location_contaner" data-lat="${parseFloat(element.latitud)}" data-lng="${parseFloat(element.longitud)}">
                                <input type="radio" name="location_radio">
                                <span></span>
                                ${element.localidad}
                            </label>`
            });
            console.log(template);
            $("#listt").html(template);
        }
    });
} */
