<?php

if (isset($_POST)) {
    $idPublicacion = $_POST['idPublicacion'];
    
    include 'conexion.php';

    $consultaGeneral = "SELECT * from inmueble,direccion,imagen,publicacion,localidad,provincia, barrio,tipo_calle,
    lista_inmueble,subcategoria,categoria, persona, usuario where id_barrio=fk_barrio and id_localidad=fk_localidad 
    and id_tipo_calle=fk_tipo_calle and id_imagen=fk_imagen and id_direccion=fk_domicilio and id_categoria=fk_categoria 
    and id_subcategoria=fk_subcategoria and id_lista_inmueble=fk_lista_inmueble and id_inmueble=fk_inmueble 
    and fk_usuario=id_usuario and fk_persona=id_persona and id_publicacion = $idPublicacion";
    $resultado = $pdo->query($consultaGeneral)->fetchAll();

    $json_array = array();
    foreach($resultado as $clave => $valor) {
	$json_array [] = array(
							'descripcion' => $valor['descripcion'],
                            'dimension' => $valor['dimension'],
                            'precio' => $valor['precio'],
                            'nro_habitaciones' => $valor['nro_habitaciones'],
                            'garage' => $valor['garage'],
                            'departamento' => $valor['departamento'],
                            'nombre_calle' => $valor['nombre_calle'],
                            'altura_calle' => $valor['altura_calle'],
                            'imagen_1' => base64_encode($valor['imagen_1']),
                          /*   'imagen_2' => $valor['imagen_2'],
                            'imagen_3' => $valor['imagen_3'],
                            'imagen_4' => $valor['imagen_4'],
                            'imagen_5' => $valor['imagen_5'], */
                            'id_publicacion' => $valor['id_publicacion'],
                            'fecha_hora' => $valor['fecha_hora'],
                            'acepta_mascota' => $valor['acepta_mascota'],
                            'nombre_localidad' => $valor['nombre_localidad'],
                            'codigo_postal' => $valor['codigo_postal'],
                            'latitud_localidad' => $valor['latitud_localidad'],
                            'longitud_localidad' => $valor['longitud_localidad'],
                            'nombre_provincia' => $valor['nombre_provincia'],
                            'nombre_barrio' => $valor['nombre_barrio'],
                            'des_calle' => $valor['des_calle'],
                            'locales_comerciales' => $valor['locales_comerciales'],
                            'inst_educativas' => $valor['inst_educativas'],
                            'centros_salud' => $valor['centros_salud'],
                            'lineas_colectivo' => $valor['lineas_colectivo'],
                            'nombre_subcategoria' => $valor['nombre_subcategoria'],
                            'nombre_categoria' => $valor['nombre_categoria'],
                            'nombre_persona' => $valor['nombre_persona'],
                            'apellido_persona' => $valor['apellido_persona'],
                            'direccion_persona' => $valor['direccion_persona'],
                            'telefono' => $valor['telefono'],
                            'ver_telefono' => $valor['ver_telefono'],
                            'perfil_persona' => base64_encode($valor['perfil_persona']),
                            'user_email' => $valor['user_email'],
                            'ver_email' => $valor['ver_email']
                            

	);
    }

$UltimaPublicacion = json_encode($json_array);

echo $UltimaPublicacion;



}



?>