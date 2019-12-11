<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Tipo Usuario</title>

  <!-- Custom fonts for this template-->
 <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <!-- <link href="css/sb-admin.css" rel="stylesheet"> -->

  <!-- relacionar con el estilo de css a los botones de tipo input-->
  <link rel="stylesheet" href="style.css">

  <script src="https://kit.fontawesome.com/2533522b31.js"></script>
    <script src="jquery-3.4.1.min.js"></script>

 
 

</head>

<body style="background-color: #55407d;">

  


  <div class="container" >
    <div class="card card-register mx-auto mt-5 col-md-8" >
        
      <div class="card-header" style="background-color: #adc867;">Regístrate</div>
      <div class="card-body">

      <label for="tipousuario">¿Qué usuario eres?</label>
            <br>
            <br>

        <form action="tipo_usuario.php" id="tipo_u" method="post" class="form-a">
            
              <!-- CADA BOTON CAPTURA EL ID PARA CARGARLO A LA BASE DE DATOS EL TIPO DE USUARIO, LO CUAL NOS LLEVA A DISTINTOS FORMULARIOS -->
              <a href="register_locador.php?rol=1" class="btn btn-primary btn-block col-md-4 mx-auto" style="background-color: #adc867;" >Propietario Particular</a>
            <br>
            <br>
            <a href="register_locador.php?rol=2" class="btn btn-primary btn-block col-md-4 mx-auto" style="background-color: #adc867;" >Propietario de Inmobiliaria</a>
            <!-- <a href="register_locatario.php?rol=3" class="btn btn-primary btn-block col-md-4 mx-auto" style="background-color: #adc867;">Cliente</a> -->
         
        </form>
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
 <script src="registro.js"></script>

</body>

</html>

<!-- <script>

$(document).ready(function(){
    $('#prop_pa').click(function(){
        var datos=$('#tipo_u').serialize();
    $.ajax({
        type:'post',
        url:'insertar_tipo.php',
        data: datos,
        success:function(r){
            if(r==1){
                alert("Agregado con éxito");
            }else{
                alert("Fallo el servidor");
            }
        }
    })
    return false;
 })
})

</script> -->