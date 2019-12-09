<?php

if(isset($_POST)){

include 'conexion.php';
$listar_lat_long="select latitud_localidad,longitud_localidad,nombre_localidad from localidad,provincia where id_privincia=fk_provincia and id_localidad={$_POST['localidad']} ";

$result = $pdo->query($listar_lat_long)->fetchAll();

$json_array = array();

foreach($result as $clave => $valor) {
	$json_array [] = array(
							'latitud' => $valor['latitud_localidad'],
							'longitud' => $valor['longitud_localidad'],
							'localidad'=>$valor['nombre_localidad']
	);
}

$listar_lat = json_encode($json_array);

echo $listar_lat;

}

?>