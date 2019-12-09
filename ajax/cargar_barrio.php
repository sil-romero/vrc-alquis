<?php
//consulta que me trae de la base de datos los barrios cargados para mostrar en el formulario,filtros 
if(isset($_GET)){

include 'conexion.php';
$listar_barrio="SELECT * FROM barrio";

$result = $pdo->query($listar_barrio)->fetchAll();

$json_array [] = array('nombre_barrio' => 'Todo los barrios',
						'id_barrio' => '');

foreach($result as $clave => $valor) {
	$json_array [] = array(
							'nombre_barrio' => $valor['nombre_barrio'],
							'id_barrio' => $valor['id_barrio']
	);
}

$barrio = json_encode($json_array);
/* json_encode Devuelve un string con la representación JSON de value. */
echo $barrio;

}

?>