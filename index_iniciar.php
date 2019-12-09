<?php 
include 'ajax/conexion.php';
session_start();
/* PREGUNTO SI HAY UNA SESION ACTIVA Y ES VERDADERO CARGO EL INDEX*/ 
if (isset($_SESSION['active']) && $_SESSION['active']==true) {
  header('location: index.php');
}
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <!-- <link href="css/sb-admin.css" rel="stylesheet"> -->

  <!-- relacionar con el estilo de css a los botones de tipo input-->



  <script src="https://kit.fontawesome.com/2533522b31.js"></script>

</head>

<body style="background-color: #55407d;">

  <div class="container">
    <div class="card card-login mx-auto mt-5 col-md-6">
      <div class="card-header"  style="background-color: #adc867;">Iniciar sesión</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
            <div class="form-label-group">
              <label for="email">Email</label>
              <input type="email" id="email" class="form-control" placeholder="Ingrese dirección de Email" required="required" name="email" autofocus="autofocus">
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <label for="contaseqa">Contraseña</label>
              <input type="password" name="contraseqa" id="contraseqa" class="form-control" placeholder="Ingrese contraseña" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Recordar contraseña
              </label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block col-md-4 mx-auto"  style="background-color: #adc867;" name="iniciar" value="Iniciar sesión">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="tipo_usuario.php">Regístrate</a>
          <a class="d-block small" href="forgot-password.html">¿Olvidaste tu contraseña?</a>
        </div>
      </div>
    </div>
  </div>
<?php
    /* SI SE INICIA SESION, SELECCIONO ID,NOMBRE APELLIDO Y TIPO DE USUSARIO DE LAS TABLAS PERSONA Y USUARIO*/
    if (isset($_POST['iniciar'])) {
      $consulta="SELECT id_usuario,nombre_persona,apellido_persona,user_email,fk_persona,fk_tipo_usuario FROM usuario,persona,tipo_usuario WHERE user_email='{$_POST['email']}' and user_contraseqa='{$_POST['contraseqa']}' and id_persona=fk_persona and id_tipo_usuario=fk_tipo_usuario";
      $query=$pdo->query($consulta);
      if ($query->rowCount()==1) {
        $data=$query->fetch();
          /* CREO VARIABLES GLOBALES CON EL ID_USUARIO, NOMBRE Y APELLIDO, EMAIL, FK_PERSONA Y FK_TIPO DE USUARIO PARA REUTILIZARLOS */
          $_SESSION['usuario']=$data['id_usuario'];
          $_SESSION['nombre']=$data['nombre_persona']." ".$data['apellido_persona'];
          $_SESSION['correo']=$data['user_email'];
          $_SESSION['rela']=$data['fk_persona'];
          $_SESSION['rol']=$data['fk_tipo_usuario'];
          $_SESSION['active']=true;
          header("location: index.php");
      }         
    }
?>

 <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

   <!-- Bootstrap SCRIPTS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 


</body>

</html>
