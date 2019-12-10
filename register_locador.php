<?php 
/* La sentencia include_once incluye y evalúa el fichero especificado durante la ejecución del script. */
require_once 'config.php';
$rol=$_GET['rol'];
/* implementar inicio de sesion por medio de facebook */
$redir='http://localhost/GitHub/Sistema-Inmuebles/fb-callback.php?rol='.$rol.'';

$permision=['email'];
$loginUrl = $helper->getLoginUrl($redir, $permision);



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <!-- <link href="css/sb-admin.css" rel="stylesheet"> -->

  <!-- relacionar con el estilo de css a los botones de tipo input-->
  <link rel="stylesheet" href="style.css">

  <script src="https://kit.fontawesome.com/2533522b31.js"></script>

</head>

<body style="background-color: #55407d;">

  <div class="container col-md-7">
    <div class="card card-register mx-auto mt-4 mb-4">
      <div class="card-header text-center" style="background-color: #adc867;">REGÍSTRATE</div>
      <div class="card-body">

        <?php if (!empty($message)): ?>
        <p> <?= $message ?></p>
        <?php endif; ?>

        <form action="cargar_registro.php?rol=<?php echo $rol; ?>" method="post" enctype="multipart/form-data"
          class="form-a">
          <!-- utilizo el metodo enctype para poder guardar la imagen del formulario -->
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="perfil">Seleccione foto de perfil</label>
                  <div class="card col-md-8" >
                    <img src="images/perfilicon.png" width="50" height="100" class="card-img" alt="...">
                    <div class="card-body">
                      <div class="form-group">
                        <input type="file" class="form-control-file" required="required" name="rostro" id="perfil">
                      </div>
                      <!-- <input type="button" id="subir" class="btn btn-info upload" value="Subir"> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="nombre">Nombre/s</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre/s"
                    required="required">
                  <label for="apellido">Apellido/s</label>
                  <input type="text" name="apellido" class="form-control" placeholder="Ingrese Apellido/s"
                    required="required">
                  <label for="direccion">Dirección</label>
                  <input type="text" name="direccion" class="form-control" placeholder="Ingrese Dirección"
                    required="required">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Ingrese número de telefono"
                  required="required" autofocus="autofocus">
              </div>

              <div class="col-md-6">
                <label for="vertelefono" required="required">¿Deseas que se muestre tu número de teléfono?</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="vertelefono" id="inlineRadio1" value="si">
                  <label class="form-check-label" for="inlineRadio1">SI</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="vertelefono" id="inlineRadio2" value="no">
                  <label class="form-check-label" for="inlineRadio2">NO</label>
                </div>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Ingrese dirección de Email"
                  required="required">
              </div>

              <div class="col-md-6">
                <label for="vertelefono" required="required">¿Deseas que se muestre tu dirección de Email?</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="veremail" id="inlineRadio1" value="si">
                  <label class="form-check-label" for="inlineRadio1">SI</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="veremail" id="inlineRadio2" value="no">
                  <label class="form-check-label" for="inlineRadio2">NO</label>
                </div>
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="contraseqa">Contraseña</label>
                  <input type="password" name="contraseqa" class="form-control" placeholder="Ingrese contraseña"
                    required="required">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <label for="vercontraseqa">Confirmar contraseña</label>
                  <input type="password" name="vercontraseqa" class="form-control"
                    placeholder="Vuelva a ingresar contraseña" required="required">
                </div>
              </div>
            </div>
          </div>


          <input type="submit" class="btn btn-primary btn-block col-md-4 mx-auto" style="background-color: #adc867;"
            name="ini" value="Registrar"></input>
        </form>
        <!-- <button class="btn btn-primary btn-block col-md-4 mx-auto" style="background-color: #adc867;" onclick="window.location='<?php echo $loginUrl; ?>'">Iniciar sesion con Facebook</button> -->

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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>


</body>

</html>