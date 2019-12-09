<?php 

session_start();
/* crea una sesión o reanuda la actual basada en un identificador de sesión pasado mediante una petición GET o POST */
require_once 'Librerias/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '2126781494298310', // Replace {app-id} with your app id
  'app_secret' => '451154c5eb4b23e97f262000b3aa8270',
  'default_graph_version' => 'v2.10',
  ]);

$helper = $fb->getRedirectLoginHelper();


 ?>
