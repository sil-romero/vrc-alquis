<?php 
session_start();
/* session_destroy() destruye toda la información asociada con la sesión actual */
session_destroy();
/* REDIRECCIONA NUEVAMENTE AL INDEX */
header('location: index.php');

 ?>