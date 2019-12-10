<?php

if(isset($_GET)){

include 'conexion.php';
$filtro = "1 = 1";
if (isset($_POST)){
	
//filtros---- intval convierte binario a decimal----
	$localidad = (isset($_POST['localidad']))?intval($_POST['localidad']):0;
	$barrio = (isset($_POST['barrio']))?intval($_POST['barrio']):0;
	$subcategoria = (isset($_POST['subcategoria']))?intval($_POST['subcategoria']):0;
	$minimo =(isset($_POST['minimo']))?intval($_POST['minimo']):0;
	$maximo =(isset($_POST['maximo']))?intval($_POST['maximo']):0;
	$habitaciones =(isset($_POST['habitaciones']))?intval($_POST['habitaciones']):0;

	if ($localidad > 0){
		$filtro .= " And id_localidad = $localidad";
	}
	if ($barrio > 0){
		$filtro .= " And id_barrio = $barrio";
	}
	if ($subcategoria > 0){
		$filtro .= " And id_subcategoria = $subcategoria";
	}
	if ($minimo > 0){
		$filtro .= " And precio >= $minimo";
	}
	if ($maximo > 0){
		$filtro .= " And precio <= $maximo";
	}
	if ($habitaciones > 0){
		$filtro .= " And nro_habitaciones = $habitaciones";
	}
}

$listar_publicaciones="SELECT nombre_calle,altura_calle,departamento,nombre_barrio,imagen_1,precio,garage,
nro_habitaciones, dimension,fecha_hora, id_publicacion, acepta_mascota,nombre_localidad,nombre_subcategoria,nombre_categoria 
from inmueble,direccion,imagen,publicacion,localidad,provincia,barrio,tipo_calle,lista_inmueble,subcategoria,categoria 
where id_barrio=fk_barrio and id_localidad=fk_localidad and id_tipo_calle=fk_tipo_calle and id_imagen=fk_imagen and 
id_direccion=fk_domicilio and id_categoria=fk_categoria and id_subcategoria=fk_subcategoria and 
id_lista_inmueble=fk_lista_inmueble and id_inmueble=fk_inmueble And $filtro ORDER BY id_publicacion DESC LIMIT 0,3";

$result = $pdo->query($listar_publicaciones)->fetchAll();
/* fetchAll() devuelve un array que contiene todas las filas restantes del conjunto de resultados */

$json_array = array();

/* JSON_ARRAY toma como entrada una o más expresiones SQL, convierte cada expresión en un valor
 JSON y devuelve una matriz JSON que contiene esos valores JSON */

foreach($result as $clave => $valor) {
	$json_array [] = array(
							    'nombre_calle' => $valor['nombre_calle'],
								'altura_calle' => $valor['altura_calle'],
								'departamento' => $valor['departamento'],
								'nombre_barrio' => $valor['nombre_barrio'],
								'precio' => $valor['precio'],
								'garage' => $valor['garage'],
								'nro_habitaciones' => $valor['nro_habitaciones'],
								'dimension' => $valor['dimension'],
								'fecha_hora' => $valor['fecha_hora'],
								'id_publicacion' => $valor['id_publicacion'],
								'acepta_mascota' => $valor['acepta_mascota'],
								'nombre_localidad' => $valor['nombre_localidad'],
								'nombre_categoria' => $valor['nombre_categoria'],
								'nombre_subcategoria' => $valor['nombre_subcategoria'],
								'imagen' => base64_encode($valor['imagen_1'])

	);
}
/* json_encode Devuelve un string con la representación JSON de value. */
$categorias = json_encode($json_array);

echo $categorias;

}

?>