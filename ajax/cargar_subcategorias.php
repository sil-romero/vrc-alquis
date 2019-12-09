<?php 
if (!isset($_POST['categoria'])) {
	header('location: ../index.php');
}
/* si existe una peticion POST guardamos el valor de categoria en una variable $categoria, 
para luego consultar las subcategorias dependiendo del id_categoria. */
$categoria=$_POST['categoria'];
include 'conexion.php';
 $sql = "SELECT id_subcategoria,nombre_subcategoria from subcategoria,categoria 
 where id_categoria=fk_categoria and fk_categoria='$categoria'";
$result = $pdo->query($sql)->fetchAll();

$json_array = array();

foreach($result as $clave => $valor) {
	$json_array [] = array(
							'nombre_subcategoria' => $valor['nombre_subcategoria'],
							'id_subcategoria' => $valor['id_subcategoria']
	);
}

$subcategorias = json_encode($json_array);

echo $subcategorias;


?>