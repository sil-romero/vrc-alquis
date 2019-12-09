<?php
//consulta que me trae de la base de datos las localidades cargadas para mostrar en el formulario,filtros
if(isset($_GET)){

include 'conexion.php';
$listar_localidad="SELECT id_localidad,nombre_localidad FROM localidad,provincia where id_privincia=fk_provincia and fk_provincia=1";

$result = $pdo->query($listar_localidad)->fetchAll();

$json_array [] = array('nombre_localidad' => 'Todas las localidades',
						'id_localidad' => '');

foreach($result as $clave => $valor) {
	$json_array [] = array(
							'nombre_localidad' => $valor['nombre_localidad'],
							'id_localidad' => $valor['id_localidad']
	);
}

$localidad = json_encode($json_array);

echo $localidad;

}

?>