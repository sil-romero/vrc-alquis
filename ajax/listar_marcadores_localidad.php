<?php

if(isset($_POST)){
include 'conexion.php';
$listar_lat_long="select latitud,longitud from direccion,barrio,localidad,tipo_calle,provincia where id_localidad=fk_localidad and id_privincia=fk_provincia and id_tipo_calle=fk_tipo_calle and id_barrio=fk_barrio and latitud_localidad='{$_POST['latitud']}' and longitud_localidad='{$_POST['longitud']}'";

$result = $pdo->query($listar_lat_long)->fetchAll();

$json_array = array();
/* JSON_ARRAY toma como entrada una o más expresiones SQL, convierte cada expresión en un valor
 JSON y devuelve una matriz JSON que contiene esos valores JSON */
foreach($result as $clave => $valor) {
	$json_array [] = array(
							'latitud' => $valor['latitud'],
							'longitud' => $valor['longitud']
	);
}

$listar_lat = json_encode($json_array);
/* json_encode Devuelve un string con la representación JSON de value. */
echo $listar_lat;

}

?>