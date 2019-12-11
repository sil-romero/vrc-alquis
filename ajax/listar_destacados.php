<?php
if (isset($_GET['val'])) {
	$val = $_GET['val'];

	if ($val == 1) {
	 
		if(isset($_POST)){

			include 'conexion.php';
			//parte de la paginacion
			$limit = isset($_POST["limit"]) && intval($_POST["limit"]) > 0 ? intval($_POST["limit"]): 10;
			$offset = isset($_POST["offset"]) && intval($_POST["offset"])>=0 ? intval($_POST["offset"])	: 0;
			$listar_destacados="SELECT * 
				from (select nombre_calle,altura_calle,departamento,nombre_barrio,imagen_1,precio,garage,nro_habitaciones,
				dimension,descripcion,fecha_hora, id_publicacion, acepta_mascota,nombre_localidad,nombre_subcategoria,
				nombre_categoria from inmueble,direccion,imagen,publicacion,localidad,provincia,barrio,tipo_calle,lista_inmueble,
				subcategoria,categoria where id_barrio=fk_barrio and id_localidad=fk_localidad and id_tipo_calle=fk_tipo_calle and
				id_imagen=fk_imagen and id_direccion=fk_domicilio and id_categoria=fk_categoria and id_subcategoria=fk_subcategoria 
				and id_lista_inmueble=fk_lista_inmueble and id_inmueble=fk_inmueble ) as elUltimo ORDER BY precio";
			
			$stmt = $pdo->prepare($listar_destacados." LIMIT :limit offset :offset");
			$stmt->bindParam(':limit',$limit,PDO::PARAM_INT);
			$stmt->bindParam(':offset',$offset,PDO::PARAM_INT);
			$stmt->execute();
			$result = $stmt->fetchAll();
			
			$sql_cantidad ="select count(*) as CANT from ($listar_destacados) as tbl";
			$stmt = $pdo->prepare($sql_cantidad);
			$stmt->execute();
			$cantidad = $stmt->fetch(PDO::FETCH_ASSOC);
			
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
											'descripcion' => $valor['descripcion'],
											'fecha_hora' => $valor['fecha_hora'],
											'id_publicacion' => $valor['id_publicacion'],
											'acepta_mascota' => $valor['acepta_mascota'],
											'nombre_localidad' => $valor['nombre_localidad'],
											'nombre_categoria' => $valor['nombre_categoria'],
											'nombre_subcategoria' => $valor['nombre_subcategoria'],
											'imagen' => base64_encode($valor['imagen_1'])
			
				);
			}
			
			$destacado = json_encode(array('cantidad'=> $cantidad['CANT'], 'listado' => $json_array), JSON_FORCE_OBJECT);
			
			echo $destacado;
			
			}

	} 

	header('location: blog.php');

} else {

if(isset($_POST)){

include 'conexion.php';
//parte de la paginacion
$limit = isset($_POST["limit"]) && intval($_POST["limit"]) > 0 ? intval($_POST["limit"]): 10;
$offset = isset($_POST["offset"]) && intval($_POST["offset"])>=0 ? intval($_POST["offset"])	: 0;
$listar_destacados="SELECT * 
	from (select nombre_calle,altura_calle,departamento,nombre_barrio,imagen_1,precio,garage,nro_habitaciones,
	dimension,descripcion,fecha_hora, id_publicacion, acepta_mascota,nombre_localidad,nombre_subcategoria,
	nombre_categoria from inmueble,direccion,imagen,publicacion,localidad,provincia,barrio,tipo_calle,lista_inmueble,
	subcategoria,categoria where id_barrio=fk_barrio and id_localidad=fk_localidad and id_tipo_calle=fk_tipo_calle and
	id_imagen=fk_imagen and id_direccion=fk_domicilio and id_categoria=fk_categoria and id_subcategoria=fk_subcategoria 
	and id_lista_inmueble=fk_lista_inmueble and id_inmueble=fk_inmueble ) as elUltimo ORDER BY id_publicacion DESC";

$stmt = $pdo->prepare($listar_destacados." LIMIT :limit offset :offset");
$stmt->bindParam(':limit',$limit,PDO::PARAM_INT);
$stmt->bindParam(':offset',$offset,PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll();

$sql_cantidad ="select count(*) as CANT from ($listar_destacados) as tbl";
$stmt = $pdo->prepare($sql_cantidad);
$stmt->execute();
$cantidad = $stmt->fetch(PDO::FETCH_ASSOC);

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
                                'descripcion' => $valor['descripcion'],
                                'fecha_hora' => $valor['fecha_hora'],
                                'id_publicacion' => $valor['id_publicacion'],
								'acepta_mascota' => $valor['acepta_mascota'],
								'nombre_localidad' => $valor['nombre_localidad'],
								'nombre_categoria' => $valor['nombre_categoria'],
								'nombre_subcategoria' => $valor['nombre_subcategoria'],
								'imagen' => base64_encode($valor['imagen_1'])

	);
}

$destacado = json_encode(array('cantidad'=> $cantidad['CANT'], 'listado' => $json_array), JSON_FORCE_OBJECT);

echo $destacado;

}

}

?>