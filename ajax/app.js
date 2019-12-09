$(document).ready(function () {
    console.log('jquery funcionando');

    /* ARMAMOS EL OBJETO PARA MANDARLO AL SERVIDOR EN PUBLICAR_INMUEBLE.PHP */
    $('#form-publicacion').submit(function (e) {
        e.preventDefault();
        /* Generar el objeto FormData a partir del formulario y agregarle los datos del formulario de publicacion */
        var formData = new FormData();
        /* formData permiten compilar un conjunto de pares clave/valor */
        /* GUARDAMOS TODOS LOS VALUES QUE VIENEN DEL INPUT EN EL OBJETO */
        var image = $('#image')[0].files[0];
        var image1 = $('#image1')[0].files[0];
        var image2 = $('#image2')[0].files[0];
        var image3 = $('#image3')[0].files[0];
        var image4 = $('#image4')[0].files[0];
        var subcategoria = $('#subcategoria').val();
        var mascota = ' ';
        if ($('#mascota').is(':checked')) { /* PREGUNTAMOS SI MASCOTA FUE CHEKEADO, DE SER ASI LO GUARDAMOS */
            mascota = $('#mascota').val();
        }
        var localidad = $('#localidad').val();
        var calle = $('#calle').val();
        var barrio = $('#barrio').val();
        var altura = $('#altura').val();
        var departamento = $('#nro_departamento').val();
        var latitud = $('#latitud').val();
        var longitud = $('#longitud').val()
        var descripcion = $('#descripcionInmueble').val();
        var precio = $('#precio').val();
        var dimension = $('#dimension').val();
        var habitaciones = $('#habitaciones').val();
        var garage = '';
        if ($('#garage').is(':checked')) { /* PREGUNTAMOS SI GARAGE FUE CHEKEADO, DE SER ASI LO GUARDAMOS */
            garage = $('#garage').val();
        }
        var colectivo = $('#colectivo').val();
        var insti = $('#insti').val();
        var salud = $('#salud').val();
        var comercio = $('#comercio').val();
        var tipo_calle = $('#tipo_calle').val();

        /* CON EL METODO APPEND AÑADIMOS CONTENIDO AL FINAL DE CADA ELEMENTO DEL OBJETO ("clave", "valor") */
        formData.append('file', image);
        formData.append('tipo_calle', tipo_calle);
        formData.append('file1', image1);
        formData.append('file2', image2);
        formData.append('file3', image3);
        formData.append('file4', image4);
        formData.append('mascota', mascota);
        formData.append('subcategoria', subcategoria);
        formData.append('localidad', localidad);
        formData.append('calle', calle);
        formData.append('barrio', barrio);
        formData.append('altura', altura);
        formData.append('departamento', departamento);
        formData.append('descripcion', descripcion);
        formData.append('precio', precio);
        formData.append('dimension', dimension);
        formData.append('habitaciones', habitaciones);
        formData.append('garage', garage);
        formData.append('colectivo', colectivo);
        formData.append('insti', insti);
        formData.append('salud', salud);
        formData.append('comercio', comercio);
        formData.append('latitud', latitud);
        formData.append('longitud', longitud);

        /* MANDAMOS EL OBJETO formData AL PHP CON EL METODO POST POR AJAX, PARA QUE ESTE (EL SERVIDOR) LO GUARDE EN LA BASE DE DATOS */
        $.ajax({
            url: 'ajax/publicar_inmueble.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) { //success devuelve llamada de exito en jquery
              /*   let res = JSON.parse(response);
              console.log(res); */
                alert('Se ha publicado exitosamente');
                /* se recetea el formulario una vez que se publico */
                $('#form-publicacion').trigger('reset');

            },

            error: function () {   /* IMPRIMIMOS UN MENSAJE DE ERROR POR SI ALGO SALE MAL */
                alert('Publicación no exitosa');
            }
        });

    })

    /* ajax para que carge subcategoria dependiendo de la categoria seleccionada en el formulario en el archivo blog-form.php */
    $('#categoria').on('change', function () {
        var categoria = $('#categoria').val();
        if (categoria != 0) { /* preguntamos primero si categoria viene distinto de cero entonces ejecutamos el ajax */
            $.ajax({
                url: 'ajax/cargar_subcategorias.php',
                type: 'post',
                data: {
                    categoria
                },
                success: function (response) {
                    let subcat = JSON.parse(response);
                    let template = '';
                    subcat.forEach(element => {
                        template += `<option value='${element.id_subcategoria}'>${element.nombre_subcategoria}</option>`
                    });

                    $("#subcategoria").html(template);
                },
                error: function () {
                    console.log('consulta fallida');
                }
            });
        }
    })

     /* ajax para cargar la longitud y latitud de un inmueble dependiendo de la localidad seleccionada */
    $('#localidad').on('change', function () {
        var localidad = $('#localidad').val();

        if (localidad != 0) { /* preguntamos primero si localidad viene distinto de cero entonces ejecutamos el ajax */
            $.ajax({
                url: 'ajax/listar_lat_long_loc.php',
                type: 'POST',
                data: {
                    'localidad':localidad
                },
                success: function (response) {
                    let loc = JSON.parse(response);
                    loc.forEach(element => {
                        console.log(element.latitud);
                        initMap(element.latitud, element.longitud); 
                        /* le pasamos a la funcion initmap los siguientes parametrps latitud y longitud de cada localidad*/

                    });
                },
                error: function () {
                    console.log('consulta fallida');
                }
            });

        }
    })
    
    /* funciones que se ejecutan al recargarce la página */
    listarCategorias();
    listarTipoCalle();
    listarLocalidad();
    listarBarrio();
    
});


//crea un mapa dentro de un div, en el formulario de publicacion, esta funcion se ejecuta cuando le damos los parametros en el ajax de localidad.
function initMap(latitud, longitud) { 
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: parseFloat(latitud),
            lng: parseFloat(longitud)
        },
        zoom: 17,
    });
    var marker1 = google.maps.event.addListener(map, 'click', function (event) {
        marker = new google.maps.Marker({
            position: event.latLng,
            map: map
        });
        $('#latitud').val(event.latLng.lat());
        $('#longitud').val(event.latLng.lng());
    });
}

/* se pide por ajax las categorias y que las muestre en el formulario, al cargar la pagina. */
function listarCategorias() { 
    $.ajax({
        url: "ajax/cargar_categoria.php",
        type: "GET",
        //data: "data",
        success: function (response) {
            let categoria = JSON.parse(response);
            console.log(categoria);
            let template = '';

            categoria.forEach(element => {
                template += `<option value='${element.id_categoria}'>${element.nombre_categoria}</option>`

            });
            $("#categoria").html(template);
        }
    });
}

/* se pide por ajax los tipo de calle y que los muestre en el formulario, al cargar la pagina. */
function listarTipoCalle() {
    $.ajax({
        url: "ajax/cargar_tipo_calle.php",
        type: "GET",
        //data: "data",
        success: function (response) {
            let categoria = JSON.parse(response);
            console.log(categoria);
            let template = '';

            categoria.forEach(element => {
                template += `<option value='${element.id_tipo_calle}'>${element.des_calle}</option>`

            });
            $("#tipo_calle").html(template);
        }
    });
}

/* se pide por ajax los barrios y que los muestre en el formulario, al cargar la pagina. */
function listarBarrio() {
    $.ajax({
        url: "ajax/cargar_barrio.php",
        type: "GET",
        success: function (response) {
            let barrio = JSON.parse(response);
            console.log(barrio);
            let template = '';

            barrio.forEach(element => {
                /* para nombre_barrio distinto de todos armamos los option y lo mostramos en el formulario */
                if (element.id_barrio != '') {
                    template += `<option value='${element.id_barrio}'>${element.nombre_barrio}</option>`
                } 
            });
            
            $("#barrio").html(template);
        }
    });
};

/* se pide por ajax las localidades y que los muestre en el formulario, al cargar la pagina. */
function listarLocalidad() {
    $.ajax({
        url: "ajax/cargar_localidad.php",
        type: "GET",
        //data: "data",
        success: function (response) {
            let localidad = JSON.parse(response);
            console.log(localidad);
            let template = '';
            localidad.forEach(element => {
                if (element.id_localidad != '') {
                    template += `<option value='${element.id_localidad}'>${element.nombre_localidad}</option>`
                }
            });
            $("#localidad").html(template);
          
        }
    });
}
