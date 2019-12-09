<?php

if(isset($_GET)){

include 'conexion.php';
$listar_categoria="SELECT * FROM categoria";

$result = $pdo->query($listar_categoria)->fetchAll();

$json_array = array();
/* JSON_ARRAY toma como entrada una o más expresiones SQL, convierte cada expresión en un valor
 JSON y devuelve una matriz JSON que contiene esos valores JSON */
foreach($result as $clave => $valor) {
	$json_array [] = array(
							'nombre_categoria' => $valor['nombre_categoria'],
							'id_categoria' => $valor['id_categoria']
	);
}

$categorias = json_encode($json_array);
/* json_encode Devuelve un string con la representación JSON de value. */
echo $categorias;

}

?>