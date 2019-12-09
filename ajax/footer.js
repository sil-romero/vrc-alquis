$(document).ready(function () {
    
    footerPublicacion();
});

function footerPublicacion() {
    $.ajax({
        url: "ajax/footer_publicacion.php",
        type: "GET",
        //data: "data",
        success: function (response) {

            let ftrPub = JSON.parse(response);
            console.log(ftrPub);
            let template = '';

            ftrPub.forEach(element => {
                template += `
               
                        <div class="listing_small_image">
                            <div>
                                <img src="data:image/jpg;base64,${element.imagen}" alt="">
                            </div>
                            <div class="listing_small_tags d-flex flex-row align-items-start justify-content-start flex-wrap">
                                <div class="listing_small_tag tag_house"><a href="listings.html">${element.nombre_categoria}</a></div>
                                <div class="listing_small_tag tag_sale"><a href="listings.html">${element.nombre_subcategoria}</a></div>
                            </div>
                            <div class="listing_small_price">$${element.precio}</div>
                        </div>
                        <div class="listing_small_content">
                            <div class="listing_small_location d-flex flex-row align-items-start justify-content-start">
                                <img src="images/icon_1.png" alt="">
                                <a href="single.html">${element.nombre_calle} ${element.altura_calle}</a>
                            </div>
                            <div class="listing_small_info">
                                <ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
                                    <li class="d-flex flex-row align-items-center justify-content-start">
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
                                    <span>Publicado: ${element.fecha_hora}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       
                    `
            });
            $("#footer_publicacion").html(template);
        }
    });
}