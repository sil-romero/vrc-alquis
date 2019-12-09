<?php 

if (empty($_POST)) {
	header("location: ../index.php");
}else{

	/* capturamos los valores que mandamos con ajax en app.js */
	$localidad=$_POST['localidad'];
	$mascota=$_POST['mascota'];
	$tipo_calle=$_POST['tipo_calle'];
	$calle=$_POST['calle'];
	$latitud=$_POST['latitud'];
	$longitud=$_POST['longitud'];
	$barrio=$_POST['barrio'];
	$altura=$_POST['altura']; 
	$departamento=$_POST['departamento']; 
	$descripcion=$_POST['descripcion'];
	$precio=$_POST['precio'];
	$dimension=$_POST['dimension'];
	$habitacion=$_POST['habitaciones'];
	$garage=$_POST['garage'];
	$colectivo=$_POST['colectivo'];
	$insti=$_POST['insti'];
	$salud=$_POST['salud'];
	$comercio=$_POST['comercio'];
	$subcategoria=$_POST['subcategoria'];
	/* se convierte la imagen en codigo binario */
	$imag_1=addslashes(file_get_contents($_FILES['file']['tmp_name']));
	$imag_2=addslashes(file_get_contents($_FILES['file1']['tmp_name']));
	$imag_3=addslashes(file_get_contents($_FILES['file2']['tmp_name']));
	$imag_4=addslashes(file_get_contents($_FILES['file3']['tmp_name']));
	$imag_5=addslashes(file_get_contents($_FILES['file4']['tmp_name'])); 

	/* se introduce una validacion para cargar en la base de datos */

	if (!empty($localidad) && !empty($calle) && !empty($departamento) && !empty($barrio) && !empty($altura)) {


		include 'conexion.php';
		session_start();
		$insert = "INSERT INTO direccion( departamento, latitud, longitud, nombre_calle, altura_calle, fk_tipo_calle, fk_barrio, fk_localidad) VALUES ('$departamento','$latitud','$longitud','$calle','{$altura}',$tipo_calle,$barrio,$localidad)";
		$resultado = $pdo->query($insert);
		if ($resultado->rowCount()>0) {
			$lastInsertDomicilio=$pdo->lastInsertId();
			$queryInsertImagenes=$pdo->query("INSERT INTO imagen(imagen_1,imagen_2,imagen_3,imagen_4,imagen_5) values('{$imag_1}','{$imag_2}','{$imag_3}','{$imag_4}','{$imag_5}')");
			echo "<script>alert('Cargado correctamente')</script>";
			if ($queryInsertImagenes->rowCount()>0) {
				$lastInsertIdImagenes=$pdo->lastInsertId();
				$queryInsertListaInmuebles=$pdo->query("INSERT INTO lista_inmueble(locales_comerciales,centros_salud,inst_educativas,lineas_colectivo) values('{$comercio}','{$salud}','{$insti}','{$colectivo}')");
				echo "<script>alert('Cargado correctamente')</script>";
				if ($queryInsertListaInmuebles->rowCount()>0) {
					$lastInsertIdListaIn=$pdo->lastInsertId();

					if  ($garage == 'si') {
						$lastInsertIdListaInmuebles=$pdo->query("INSERT INTO inmueble(descripcion,dimension,precio,nro_habitaciones,garage,fk_subcategoria,fk_lista_inmueble,fk_domicilio,fk_imagen) values('{$descripcion}','{$dimension}',{$precio},'{$habitacion}','si',{$subcategoria},{$lastInsertIdListaIn},{$lastInsertDomicilio},{$lastInsertIdImagenes})");
					echo "<script>alert('Cargado correctamente')</script>";

					} else {
						$lastInsertIdListaInmuebles=$pdo->query("INSERT INTO inmueble(descripcion,dimension,precio,nro_habitaciones,garage,fk_subcategoria,fk_lista_inmueble,fk_domicilio,fk_imagen) values('{$descripcion}','{$dimension}',{$precio},'{$habitacion}','no',{$subcategoria},{$lastInsertIdListaIn},{$lastInsertDomicilio},{$lastInsertIdImagenes})");
					echo "<script>alert('Cargado correctamente')</script>";
					}

					
					if ($lastInsertIdListaInmuebles->rowCount()>0) {
						$lastInsertIdInmuebles=$pdo->lastInsertId();

						if ($mascota == 'si') {
								
							$queryInsertPublicar=$pdo->query("INSERT INTO publicacion(fecha_hora,fk_usuario,fk_inmueble,acepta_mascota) values(NOW(),{$_SESSION['usuario']},$lastInsertIdInmuebles,'si')");
						if ($queryInsertPublicar->rowCount()>0) {
							echo "<script>alert('Cargado correctamente')</script>";
						}

						} else {
							$queryInsertPublicar=$pdo->query("INSERT INTO publicacion(fecha_hora,fk_usuario,fk_inmueble,acepta_mascota) values(NOW(),{$_SESSION['usuario']},$lastInsertIdInmuebles,'no')");
						if ($queryInsertPublicar->rowCount()>0) {
							echo "<script>alert('Cargado correctamente')</script>";
						}

						}

											
					}

				}
			}
		} 
		if (!$resultado) {
			die('La consulta ha fallado');
		} else {
			echo ('insertado');
		}
		
	}

}

 ?>