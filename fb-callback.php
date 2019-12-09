<?php 
require_once 'config.php';

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (!$accessToken) {
	header('location: login.php');
	exit();
}
$oAuth2Client = $fb->getOAuth2Client();
if (!$accessToken->isLongLived()) {
	$accessToken=$oAuth2Client->getLongLivedAccessToken($accessToken);

}
$response=$fb->get("me?fields=id,first_name,last_name,email,picture.type(large)",$accessToken);
$userData=$response->getGraphNode()->asArray();

$_SESSION['user_data']=$userData;
$_SESSION['accessToken']=(string) $accessToken;

include 'ajax/conexion.php';

$imagen=addslashes(file_get_contents($_SESSION['user_data']['picture']['url']));
$nombre=$_SESSION['user_data']['first_name'];
$apellido=$_SESSION['user_data']['last_name'];
$correo=$_SESSION['user_data']['email'];
$rol=$_GET['rol'];
if (!empty($nombre) && !empty($apellido) && !empty($correo) && !empty($rol)) {
  $sqlInsertarPersona="INSERT INTO persona(nombre_persona,apellido_persona,perfil_persona) values('{$nombre}','{$apellido}','{$imagen}')";
  $queryPersona=$pdo->query($sqlInsertarPersona);
  if ($queryPersona->rowCount()>0) {
    $lastPersona=$pdo->lastInsertId();
    $sqlInsertarUsuario="INSERT INTO usuario(user_email,user_contraseqa,fk_persona,fk_tipo_usuario) values('{$correo}','{$correo}',{$lastPersona},{$rol})";
    $queryUsuario=$pdo->query($sqlInsertarUsuario);
    if ($queryUsuario->rowCount()>0) {
     /*  $_SESSION['nombre']=$nombre." " .$apellido;
      $_SESSION['apellido']=$apellido;
      $_SESSION['correo']=$correo;
      $_SESSION['rela']=$lastPersona;
      $_SESSION['rol']=$rol;
      echo "
      <script>
        window.location.href='index.php';
      </script>"; */
    }
  }
}










 ?>