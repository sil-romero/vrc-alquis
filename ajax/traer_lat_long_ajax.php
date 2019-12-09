<?php

if(isset($_POST)){

include 'conexion.php';
$listar_lat_lon="SELECT nombre_localidad,latitud_localidad,longitud_localidad FROM localidad,provincia where id_privincia=fk_provincia and fk_provincia=1";

$result = $pdo->query($listar_lat_lon)->fetchAll();

$json_array = array();

foreach($result as $clave => $valor) {
	$json_array [] = array(
							'longitud' => $valor['longitud_localidad'],
							'latitud' => $valor['latitud_localidad'],
							'localidad'=>$valor['nombre_localidad']
	);
}

$lon_lat = json_encode($json_array);

echo $lon_lat;

}

?>