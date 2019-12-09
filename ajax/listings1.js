$(document).ready(function () {
    
listarLocalidad();
listarBarrio();
listarSubcategoria();
listarPublicaciones();



});


/* se pide por ajax los barrios y que los muestre en el formulario, al cargar la pagina. */
function listarBarrio() {
    $.ajax({
        url: "ajax/cargar_barrio.php",
        type: "GET",
        success: function (response) {
            let barrio = JSON.parse(response);
            console.log(barrio);
            let template = '';
            let template2 = '';

            barrio.forEach(element => {
                /* para nombre_barrio distinto de todos armamos los option y lo mostramos en el formulario */
                if (element.id_barrio != '') {
                    template += `<option value='${element.id_barrio}'>${element.nombre_barrio}</option>`
                } 
                /* incluimos el option todos y lo mostramos en el formulario de filtros */
                template2 += `<option value='${element.id_barrio}'>${element.nombre_barrio}</option>`  
            });
            
            /* tambien se los muestra en el filtro de listings */
            $("#barrio_seleccionado").html(template2);
        }
    });
};


function listarLocalidad() {
    $.ajax({
        url: "ajax/cargar_localidad.php",
        type: "GET",
        //data: "data",
        success: function (response) {
            let localidad = JSON.parse(response);
            console.log(localidad);
            let template = '';
            let template2 = '';
            localidad.forEach(element => {
                if (element.id_localidad != '') {
                    template += `<option value='${element.id_localidad}'>${element.nombre_localidad}</option>`
                }
                template2 += `<option value='${element.id_localidad}'>${element.nombre_localidad}</option>`
            });
            /* tambien se lo muestra en el filtro de listings */
            $("#localidad_seleccionada").html(template2);
        }
    });
}

/* se pide por ajax las subcategorias y que los muestren en el filtro de listings, al cargar la pagina. */
function listarSubcategoria() {
    $.ajax({
        url: "ajax/car_subcategoria.php",
        type: "GET",
        //data: "data",
        success: function (response) {
            let subcategoria = JSON.parse(response);
            console.log(subcategoria)
            let template = '';

            subcategoria.forEach(element => {
                template += `<option value='${element.id_subcategoria}'>${element.nombre_subcategoria}</option>`

            });
            $("#subcategoria_seleccionado").html(template);
        }
    });

};


/* en el boton buscar, a travez del evento click ejecutamos la funcion listarPublicaciones */
$('#btnBuscar').on('click', function () {
    listarPublicaciones();
});
/* se arma la funcion listarPublicaciones */
function listarPublicaciones() {
    /* capturamos los valorees de los filtros y lo gusrdamos en variables */
    let idLocalidad = $('#localidad_seleccionada').val();
    let idBarrio = $('#barrio_seleccionado').val();
    let idSubcategoria = $('#subcategoria_seleccionado').val();
    let min = $('#minimo').val();
    let max = $('#maximo').val();
    let cantHabitaciones = $('#nroHabitaciones').val();

    /* armamos el objeto */
    let datosPOST = {
        localidad : idLocalidad,
        barrio : idBarrio,
        subcategoria : idSubcategoria,
        minimo : min,
        maximo : max,
        habitaciones : cantHabitaciones
    }
    /* enviamos el objeto por ajax con el metodo POST a listar_publicaciones_inmueble.php*/
    $.ajax({
        url: "ajax/listar_publicaciones_inmuebles.php",
        type: "POST",
        data: datosPOST,
        success: function (response) {
            let publicacion = JSON.parse(response);
            console.log(publicacion);
            let template = '';

            publicacion.forEach(element => {
                template += `
                <!-- Listing -->
                <div class="listing_box house sale">
                        <div class="listing" idPublicacion="${element.id_publicacion}">
                            <div class="listing_image">
                                <div class="listing_image_container";>
                                        <img src="data:image/jpg;base64,${element.imagen}" width=400 height=300 alt="">
                                </div>
                                <div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
                                        <div class="tag tag_house"><a href="listings.html">${element.nombre_categoria}</a></div>
                                        <div class="tag tag_sale"><a href="listings.html">${element.nombre_subcategoria}</a></div>
                                </div>
                                <div class="tag_price listing_price">$ ${element.precio}</div>
                            </div>
                            <div class="listing_content">
                                <div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
                                    <img src="images/icon_1.png" alt="">
                                    <a href="#" class="unica_publicacion"> ${element.nombre_localidad} <br> Barrio: ${element.nombre_barrio} <br>
                                    
                                    ${element.nombre_calle} ${element.altura_calle}</a>
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
                                                <span>Publicado el: ${element.fecha_hora}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>`

            });

            $("#listarPub").html(template);
        }
    });
}


$(document).on('click', '.unica_publicacion', function () {
    
    let elemento = $(this)[0].parentElement.parentElement.parentElement;

    let idPublicacion = $(elemento).attr('idPublicacion');

    
    $.post('ajax/detalle_publicacion.php', {idPublicacion}, function (response) {
        let detallePublicacion = JSON.parse(response);
            console.log(detallePublicacion);
        /* let template = '';

        detallePublicacion.forEach(element => {
            template += `
            <!-- este es el pedazo de codigo de single.php para mostrar detalladamente una publicacion -->
            <div class="col">

            <!-- Image -->
            <div class="listing_image"><img src="images/listing.jpg" alt=""></div>

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
                            <div class="tag_price listing_price">$ 562 346</div>
                            <div class="listing_name"><h1>Villa for sale</h1></div>
                            <div class="listing_location d-flex flex-row align-items-start justify-content-start">
                                <img src="images/icon_1.png" alt="">
                                <span>280 Doe Meadow Drive Landover, MD 20785</span>
                            </div>
                            <div class="listing_list">
                                <ul>
                                    <li>Property ID: 643682</li>
                                    <li>Posted on: September 22, 2018</li>
                                    <li>Off plan</li>
                                </ul>
                            </div>
                            <div class="prop_agent d-flex flex-row align-items-center justify-content-start">
                                <div class="prop_agent_image"><img src="images/agent_1.jpg" alt=""></div>
                                <div class="prop_agent_name"><a href="#">Maria Smith,</a> Agent</div>
                            </div>
                            <div class="prop_info">
                                <ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <img src="images/icon_2_large.png" alt="">
                                        <div>
                                            <div>1234</div>
                                            <div>sq ft</div>
                                        </div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <img src="images/icon_3_large.png" alt="">
                                        <div>
                                            <div>2</div>
                                            <div>baths</div>
                                        </div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <img src="images/icon_4_large.png" alt="">
                                        <div>
                                            <div>5</div>
                                            <div>beds</div>
                                        </div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <img src="images/icon_5_large.png" alt="">
                                        <div>
                                            <div>2</div>
                                            <div>garages</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- segunda división - estan las descripciones - -->
                    <div class="col-lg-6">
                        <div class="about_text">
                            <p>Nulla aliquet bibendum sem, non placerat risus venenatis at. Prae sent vulputate bibendum dictum. Cras at vehicula urna. Suspendisse fringilla lobortis justo, ut tempor leo cursus in. Nullam fermentum egestas quam nec malesuada. Donec non ligula non risus luctus mattis non non diam. Integer placerat velit at vestibulum vulputate. Donec lacinia vitae libero sed ultricies. Donec egestas dictum dolor ac sagittis. Nunc facilisis iaculis est, ut aliquet lorem. Nam imperdiet convallis imperdiet. Nam libero arcu, porttitor sed sapien nec, commodo accumsan nulla. Praesent pretium neque nec dictum venenatis. Mauris nec metus vitae massa maximus malesuada. Quisque cursus leo nec nulla dignissim, ut pulvinar diam porttitor.</p>
                        </div>
                    </div>
                    <!-- tercera división - mas descripciones - -->
                    <div class="col-lg-6">
                        <div class="listing_features">
                            <div class="listing_title"><h3>Features</h3></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul>
                                        <li>2 car garages</li>
                                        <li>3 bedrooms</li>
                                        <li>heated floors</li>
                                        <li>contemporary architecture</li>
                                        <li>swimming pool</li>
                                        <li>exercise room</li>
                                        <li>formal entry</li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul>
                                        <li>patio</li>
                                        <li>close to stores</li>
                                        <li>ocean view</li>
                                        <li>spa</li>
                                        <li>sprinklers</li>
                                        <li>garden</li>
                                        <li>alley</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- segunda división - estan las descripciones - -->
                    <div class="col-lg-6">
                        <div class="about_text">
                            <p>Nulla aliquet bibendum sem, non placerat risus venenatis at. Prae sent vulputate bibendum dictum. Cras at vehicula urna. Suspendisse fringilla lobortis justo, ut tempor leo cursus in. Nullam fermentum egestas quam nec malesuada. Donec non ligula non risus luctus mattis non non diam. Integer placerat velit at vestibulum vulputate. Donec lacinia vitae libero sed ultricies. Donec egestas dictum dolor ac sagittis. Nunc facilisis iaculis est, ut aliquet lorem. Nam imperdiet convallis imperdiet. Nam libero arcu, porttitor sed sapien nec, commodo accumsan nulla. Praesent pretium neque nec dictum venenatis. Mauris nec metus vitae massa maximus malesuada. Quisque cursus leo nec nulla dignissim, ut pulvinar diam porttitor.</p>
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
        window.location.href='single.php'; */
    })

})
