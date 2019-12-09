<?php

if(isset($_GET)){

include 'conexion.php';
$listar_tipocalle="SELECT id_tipo_calle,des_calle FROM tipo_calle";

$result = $pdo->query($listar_tipocalle)->fetchAll();

$json_array = array();

foreach($result as $clave => $valor) {
	$json_array [] = array(
							'des_calle' => $valor['des_calle'],
							'id_tipo_calle' => $valor['id_tipo_calle']
	);
}

$tipocalle = json_encode($json_array);

echo $tipocalle;

}

?>