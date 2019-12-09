
var paginador
   ,totalPaginas
   ,itemsPorPagina=2
   ,numerosPorPagina=4
   ,desde=0
   ,pagina=0;

$(document).ready(function () {
  console.log('jquery funcionando');
  /* ejecutamos la funcion de mostrar las publicaciones destacadas */
  //listarPublicacionesDestacadas();
  // se genera el paginador
  paginador = $("#paginador");
  // cantidad de items por pagina
  var items=2, numeros=4;	
  // inicia el paginador
  init_paginator(paginador,items,numeros);
  // se envia la peticion ajax que se realizara como callback
  set_callback(listarPublicacionesDestacadas);
  cargaPagina(0);
})

// funciones creadoras de la paginacion
function init_paginator(a,b,c){
  a=a,itemsPorPagina=b,numerosPorPagina=4}
  
function creaPaginador(a){paginador.html(""),
totalPaginas=Math.ceil(a/itemsPorPagina),
$('<li><a href="#" class="first_link"><</a></li>').appendTo(paginador),
$('<li><a href="#" class="prev_link">«</a></li>').appendTo(paginador);
for(var b=0;totalPaginas>b;)$('<li><a href="#" class="page-link">'+(b+1)+"</a></li>").appendTo(paginador),
b++;numerosPorPagina>1&&($(".page-link").hide(),
$(".page-link").slice(0,numerosPorPagina).show()),
$('<li><a href="#" class="next_link">»</a></li>').appendTo(paginador),
$('<li><a href="#" class="last_link">></a></li>').appendTo(paginador),
0==pagina&&(paginador.find(".page-link:first").addClass("active"),
paginador.find(".page-link:first").parents("li").addClass("active")),
paginador.find(".prev_link").hide(),
paginador.find("li .page-link").click(function(){var a=$(this).html().valueOf()-1;return cargaPagina(a),!1}),
paginador.find("li .first_link").click(function(){var a=0;return cargaPagina(a),!1}),
paginador.find("li .prev_link").click(function(){var a=parseInt(paginador.data("pag"))-1;return cargaPagina(a),!1}),
paginador.find("li .next_link").click(function(){var a=parseInt(paginador.data("pag"))+1;return cargaPagina(a),!1}),
paginador.find("li .last_link").click(function(){var a=totalPaginas-1;return cargaPagina(a),!1})}

function get_data(){cosole.log("nada")}

function set_callback(a){!function(b){b.get_data=function(){a()}}(window||{})}

function cargaPagina(a){
  pagina=a,desde=pagina*itemsPorPagina,get_data(),
  pagina>=1?paginador.find(".prev_link").show():paginador.find(".prev_link").hide(),
  totalPaginas-numerosPorPagina>pagina?paginador.find(".next_link").show():paginador.find(".next_link").hide(),
  paginador.data("pag",pagina),
  numerosPorPagina>1&&($(".page-link").hide(),
  totalPaginas-numerosPorPagina>pagina?$(".page-link").slice(pagina,numerosPorPagina+pagina).show():totalPaginas>numerosPorPagina?$(".page-link").slice(totalPaginas-numerosPorPagina).show():$(".page-link").slice(0).show()),
  paginador.children().removeClass("active"),
  paginador.children().eq(pagina+2).addClass("active")
}

/* armamos la funcion de mostrar las publicaciones detacadas */
function listarPublicacionesDestacadas() {

  $.ajax({
    url: "ajax/listar_destacados.php",
    type: "POST",
    data:{
      limit: itemsPorPagina,							
      offset: desde									
    },
    //dataType: "dataType",
    success: function (response) {

      console.log(response)
      data = JSON.parse(response)

      let destacado = data.listado;

      if(pagina==0){        
        creaPaginador(data.cantidad);
      }
      
      

      let template = '';

      $.each(destacado, function(ind, element) {
          template += `

          <div class="blog_post">
							<div class="blog_post_image">
								<img src="data:image/jpg;base64,${element.imagen}" width="700"  height="500" alt="foto destacada">
								<div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
									<div>VRC</div>
									<div></div>
								</div>
							</div>
              <div class="blog_post_content">
              <div class="blog_post_title"><a href="#"> ${element.nombre_subcategoria} </a></div>
								<div class="blog_post_title"><a href="#"> ${element.nombre_calle} ${element.altura_calle} </a></div>
								<div class="blog_post_info">
									<ul class="d-flex flex-row align-items-start justify-content-start flex-wrap">
										<li><a href="#">${element.fecha_hora}</a></li>
										<li>$ <a href="#">${element.precio}</a></li>
										<li>
											<ul class="d-flex flex-row align-items-start justify-content-start">
                        <li><a href="#">dimencion: ${element.dimension}</a></li>
                        <li><a href="#">habitaciones: ${element.nro_habitaciones}</a></li>
												<li><a href="#">garage: ${element.garage}</a></li>
												<li><a href="#">mascota: ${element.acepta_mascota}</a></li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="blog_post_text">
									<p> ${element.descripcion} </p>
								</div>
							</div>
						</div>

             `

      });
      $("#publicacionDestacada").html(template);

    },
    error: function () {
      console.log('consulta fallida');
    }

  });

}