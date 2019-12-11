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
                                    <a href="single.php?id=${element.id_publicacion}" target="_blank" class="unica_publicacion"> ${element.nombre_localidad} <br> Barrio: ${element.nombre_barrio} <br>
                                    
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


/* $(document).on('click', '.unica_publicacion', function () {
    
    let elemento = $(this)[0].parentElement.parentElement.parentElement;

    let idPublicacion = $(elemento).attr('idPublicacion');

    window.location.href='single.php?id='+idPublicacion;

}) */
