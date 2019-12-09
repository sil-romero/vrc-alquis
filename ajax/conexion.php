<?php
	$user='root';
	$pass='';

	try {
				$pdo = new PDO("mysql:dbname=vrc_alquileres_fsa;host=localhost",$user,$pass,array(PDO::ATTR_PERSISTENT => true,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$msg='conexion_ok';  
				//echo "Base de datos conectada exitosamente";
	} catch (PDOException $e) {
				$msg='conexion_cancel: '.$e->getMessage();
				//echo "Error al conectar a la base de datos. ".$e->getMessage();	
	}
?>
