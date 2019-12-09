<?php
//consulta que me trae de la base de datos las subcategorias cargadas para mostrar en el formulario y filtros 
if(isset($_GET)){

include 'conexion.php';
$listar_subcategoria="SELECT * FROM subcategoria";

$result = $pdo->query($listar_subcategoria)->fetchAll();
/* $json_array guarda un conjunto de valores */
$json_array []= array('nombre_subcategoria' => 'Todas las subcategorias',
					  'id_subcategoria' => '');

foreach($result as $clave => $valor) {
	$json_array [] = array(
							'nombre_subcategoria' => $valor['nombre_subcategoria'],
							'id_subcategoria' => $valor['id_subcategoria']
	);
}

$subcategorias = json_encode($json_array);

echo $subcategorias;

}

?>