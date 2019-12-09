<?php 

      include 'ajax/conexion.php';
      /* TOMO EL VALOR DEPOSITADO EN LA VARIABLE ROL=TIPO DE USUARIO */
      
      $rol=$_GET['rol'];
      
      if (isset($_POST)) {
        /* file_get_contents TRANSFORMA EN STRING LA IMAGEN */
       
        
        $imagen=addslashes(file_get_contents($_FILES['rostro']['tmp_name']));
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $vertelefono=$_POST['vertelefono'];
        $email=$_POST['email'];
        $veremail=$_POST['veremail'];
        $contraseqa=$_POST['contraseqa'];
        $vercontraseqa=$_POST['vercontraseqa'];
        if (!empty($imagen) && !empty($nombre) && !empty($apellido)){
          /* PREGUNTO SI LAS VARIABLES NO ESTAN VACIAS, E INSERTO EN LA TABLA PERSONA */
          
          $insertPersona=$pdo->query("INSERT INTO persona(nombre_persona,apellido_persona,direccion_persona,telefono,ver_telefono,perfil_persona) values('{$nombre}','{$apellido}','{$direccion}','{$telefono}','{$vertelefono}','{$imagen}')");
          if ($insertPersona->rowCount()>0) {
            $lastInsertIdPersona=$pdo->lastInsertId(); /* capturo el id */
            if($lastInsertIdPersona>0 && !empty($email) && !empty($contraseqa) && !empty($vercontraseqa) && $contraseqa==$vercontraseqa){
              $insertUsuario=$pdo->query("INSERT INTO usuario(user_email,user_contraseqa,fk_persona,fk_tipo_usuario,ver_email) values('{$email}','{$contraseqa}',{$lastInsertIdPersona},{$_GET['rol']},'{$veremail}')");
            
              /* echo "INSERT INTO usuario(user_email,user_contraseqa,fk_persona,fk_tipo_usuario,ver_email) values('{$email}','{$contraseqa}',{$lastInsertIdPersona},{$_GET['rol']},'{$veremail}')"; */
              /* echo var_dump($inserUsuario); */
            }else{
              echo "<script>alert('Vuelve a registrarte, cometiste un error')
              window.location.href='register_locador.php?rol=$rol';</script>";
            }
            if ($insertUsuario->rowCount()>0) {
              $lastInsertIdUsuario=$pdo->lastInsertId();

              /* creo variables donde guardo nombre y apellido, y el fk persona que uso despues */
/* 
              $_SESSION['nombre']=$nombre." " .$apellido;
              $_SESSION['apellido']=$apellido;
              $_SESSION['correo']=$email;
              $_SESSION['rela']=$lastInsertIdPersona;
              $_SESSION['rol']=$rol;
              $_SESSION['usuario']=$lastInsertIdUsuario; */

              echo "<script>alert('Registrado Correctamente');
              window.location.href='index_iniciar.php';</script>";

            }

            }
          }
        }

   ?>