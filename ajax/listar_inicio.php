<?php

if(isset($_GET)){

include 'conexion.php';
$listar_inicioo="SELECT * FROM ( select nombre_calle,altura_calle,departamento,nombre_barrio,imagen_1,precio,garage,nro_habitaciones, dimension,fecha_hora, acepta_mascota,nombre_localidad,nombre_subcategoria,nombre_categoria from inmueble,direccion,imagen,publicacion,localidad,provincia,barrio,tipo_calle,lista_inmueble,subcategoria,categoria where id_barrio=fk_barrio and id_localidad=fk_localidad and id_tipo_calle=fk_tipo_calle and id_imagen=fk_imagen and id_direccion=fk_domicilio and id_categoria=fk_categoria and id_subcategoria=fk_subcategoria and id_lista_inmueble=fk_lista_inmueble and id_inmueble=fk_inmueble )as azar ORDER BY RAND() LIMIT 0,3";
// select nombre_calle,altura_calle,departamento,nombre_barrio,imagen_1,precio,garage,nro_habitaciones,fecha_hora,nombre_localidad,nombre_subcategoria,nombre_categoria from inmueble,direccion,imagen,publicacion,localidad,provincia,barrio,tipo_calle,lista_inmueble,subcategoria,categoria where id_barrio=fk_barrio and id_localidad=fk_localidad and id_tipo_calle=fk_tipo_calle and id_imagen=fk_imagen and id_direccion=fk_domicilio and id_categoria=fk_categoria and id_subcategoria=fk_subcategoria and id_lista_inmueble=fk_lista_inmueble LIMIT 0,3
$result = $pdo->query($listar_inicioo)->fetchAll();

$json_array = array();

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
								'acepta_mascota' => $valor['acepta_mascota'],
								'nombre_localidad' => $valor['nombre_localidad'],
								'nombre_categoria' => $valor['nombre_categoria'],
								'nombre_subcategoria' => $valor['nombre_subcategoria'],
								'imagen' => base64_encode($valor['imagen_1'])

	);
}

$listarInicio = json_encode($json_array);

echo $listarInicio;

}

?>