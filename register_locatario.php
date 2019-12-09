<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Register locatario particular</title>

  <!-- Custom fonts for this template-->
 <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <!-- <link href="css/sb-admin.css" rel="stylesheet"> -->

  <!-- relacionar con el estilo de css a los botones de tipo input-->
  <link rel="stylesheet" href="style.css">

  <script src="https://kit.fontawesome.com/2533522b31.js"></script>

</head>

<body style="background-color: #55407d;">

  <div class="container">
    <div class="card card-register mx-auto mt-5 mb-5 col-md-8">
      <div class="card-header"  style="background-color: #adc867;">Regístrate</div>
      <div class="card-body">

      <?php if (!empty($message)): ?>
      <p> <?= $message ?></p>
      <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data"  class="form-a">

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                <label for="perfil" >Seleccione foto de perfil</label>
                <div class="card" style="width: 18rem;">
							<img src="images/perfilicon.png" width="50" height="80" class="card-img" alt="...">
							<div class="card-body">
							  <div class="form-group">
								<input type="file" class="form-control-file" required="required" name="rostro" id="perfil">
							  </div>
							  <input type="button" id="subir" class="btn btn-info upload" value="Subir">
							</div>
						  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                <label for="nombre">Nombre/s</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre/s" required="required">
                  <label for="apellido">Apellido/s</label>
                  <input type="text" name="apellido" class="form-control" placeholder="Ingrese Apellido/s" required="required">
                  <label for="email">Email</label>
              <input type="email" name="email"  class="form-control" placeholder="Ingrese dirección de Email" required="required">
                </div>
              </div>
            </div>
          </div>
    
         

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="contraseqa">Contraseña</label>
                  <input type="password" name="contraseqa" class="form-control" placeholder="Ingrese contraseña" required="required" autofocus="autofocus">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="confircontraseqa">Confirmar contraseña</label>
                  <input type="password" name="confircontraseqa" class="form-control" placeholder="Vuelva a ingresar contraseña" required="required">
                </div>
              </div>
            </div>
          </div>
          

          <input type="submit"  style="background-color: #adc867;" class="btn btn-primary btn-block col-md-4 mx-auto" name="iniciar" value="Registrar"></input>
        </form>
        

<?php 
      include 'ajax/conexion.php';
      /* GUARDO EN LA VARIABLE ROL EL ID DEL TIPO DE USUSARIO SELECCIONADO */
      $rol=$_GET['rol'];
      if (isset($_POST['iniciar'])) {
        $imagen=addslashes(file_get_contents($_FILES['rostro']['tmp_name']));
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $email=$_POST['email'];
        $contraseqa=$_POST['contraseqa'];
        $vercontraseqa=$_POST['confircontraseqa'];
        /* PREGUNTO SI NO ESTAN VACIOS LOS CAMPOS Y LOS INSERTO EN LA TABLA PERSONA */
        if (!empty($imagen) && !empty($nombre) && !empty($apellido)){
          $insertPersona=$pdo->query("INSERT INTO persona(nombre_persona,apellido_persona,perfil_persona) values('{$nombre}','{$apellido}','{$imagen}')");
          if ($insertPersona->rowCount()>0) {
            $lastInsertIdPersona=$pdo->lastInsertId();
            if($lastInsertIdPersona>0 && !empty($email) && !empty($contraseqa) && !empty($vercontraseqa) && $contraseqa==$vercontraseqa){
              $insertUsuario=$pdo->query("INSERT INTO usuario(user_email,user_contraseqa,fk_persona,fk_tipo_usuario) values('{$email}','{$contraseqa}',{$lastInsertIdPersona},{$rol})");
              /* echo "INSERT INTO usuario(user_email,user_contraseqa,fk_persona,fk_tipo_usuario) values('{$email}','{$contraseqa}',{$lastInsertIdPersona},{$rol}";
              echo var_dump($insertUsuario); */
            }else{
              echo "<script>alert('Vuelve a registrarte, cometiste un error')
              window.location.href='register_locatario.php?rol=3';</script>";
            }
            if ($insertUsuario->rowCount()>0) {


              echo "<script>alert('Cargado Correctamente');
              window.location.href='index.php';</script>";

            }

            }
            
          }else{
            echo "<script>alert('Vuelve a registrarte, cometiste un error')
            window.location.href='register_locatario.php?rol=3';</script>";
          }
        }
   ?> 

        <div class="text-center">
          <a class="d-block small mt-3" href="index_iniciar.php">Iniciar sesión</a>
          <a class="d-block small" href="forgot-password.html">¿Olvidaste tu contraseña?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
 <!--  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

   <!-- Bootstrap SCRIPTS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 

</body>

</html>