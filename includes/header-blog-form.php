<?php 
include './ajax/conexion.php';
/* traigo a partir del id_persona la foto de perfil de la base de datos de la tabla persona */
$query=$pdo->query("SELECT perfil_persona FROM persona where id_persona={$_SESSION['rela']}");
$data=$query->fetch();
$imagen=base64_encode($data['perfil_persona']);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="myHOME - real estate template project">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>- ALQUILERES</title>
<link rel="icon" href="images/vrc-logo.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css">
<!-- css propios del blog -->
<link rel="stylesheet" type="text/css" href="styles/blog.css">
<link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">
<!-- css propios del contac -->
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>

	<div class="super_container">
		<div class="super_overlay"></div>

		<!-- Header -->

		<header class="header">

			<!-- Header Bar -->
			<div class="header_bar d-flex flex-row align-items-center justify-content-start">
				<div class="header_list">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<!-- Phone -->
						<li class="d-flex flex-row align-items-center justify-content-start float-left">
							<div><img src="data:image/jpg;base64,<?php if(isset($_SESSION)){ echo $imagen;} ?>" alt=""></div>
							<span><a href="" style="text-decoration: none;color: white;"><strong>

							<!-- si hay una sesion activa se va a mostrar el nombre del usuario -->

							<?php if (isset($_SESSION['active'])){echo $_SESSION['nombre'];}?></strong></a></span>
						</li>
						<!-- si no hay una sesión activa, se va a mostrar en el header los medios de contacto de vrc -->
						<?php if (!isset($_SESSION['active'])) { ?>
						<li class="d-flex flex-row align-items-center justify-content-start">
							<div><img src="images/phone-call.svg" alt=""></div>
							<span>+543 705221 122</span>
						</li>
						<!-- Address -->
						<li class="d-flex flex-row align-items-center justify-content-start">
							<div><img src="images/placeholder.svg" alt=""></div>
							<span>Maipú, 356, Formosa Capital</span>
						</li>
						<!-- Email -->
						<li class="d-flex flex-row align-items-center justify-content-start">
							<div><img src="images/envelope.svg" alt=""></div>
							<span>vrcalquileresfsa@gmail.com</span>
						</li>
						<?php } ?>
						<li class="d-flex flex-row align-items-center justify-content-start float-left"
							style="background-color: #adc867;">
							<span><a href="./salir.php" style="text-decoration: none;color: white;">
								 <!-- si hay una sesion activa, se va a mostrar el boton salir -->
									<?php if (isset($_SESSION['active'])) { ?>

									<strong>Salir</strong></a></span><?php } ?>
						</li>
					</ul>
				</div>
				<div class="ml-auto d-flex flex-row align-items-center justify-content-start">
					<div class="log_reg d-flex flex-row align-items-center justify-content-start">
						<ul class="d-flex flex-row align-items-start justify-content-start">
										<!-- si no hay una sesión activa, se muestran los botones de iniciar sesión/registrarse -->
							<?php if (!isset($_SESSION['active'])) { ?>
							<li class="d-flex flex-row align-items-center justify-content-start">
								<span style="color: white;"><a href="./index_iniciar.php">Iniciar
										Session/Registrarse</a></span>
								<?php } ?>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<!-- Header Content -->
			<div class="header_content d-flex flex-row align-items-center justify-content-start">
				<div class="logo"><a href="#">VRC-<span>Alquileres</span></a></div>
				<nav class="main_nav">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li class=""><a href="index.php">Inicio</a></li>
						<li><a href="listings.php">Publicaciones</a></li>
						<li><a href="blog.php">Destacados</a></li>
						<li><a href="about.php">Nosotros</a></li>

					</ul>
				</nav>
				<!-- PREGUNTAMOS SI EXISTE UNA SESION ACTIVA ENTONCES MOSTRAMOS EL BOTON DE PUBLICAR QUE LO LLEVA A SU CUENTA -->
				<?php 
			if (isset($_SESSION['active'])) {
			if ($_SESSION['rol']==1 || $_SESSION['rol']==2) { ?>
				<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
				<?php }} ?>

			</div>

		</header>

		<!-- Menu responsivo via cell-->

		<div class="menu text-right">
			<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<div class="menu_log_reg">
				<div class="log_reg d-flex flex-row align-items-center justify-content-end">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<?php if (!isset($_SESSION['active'])) { ?>
						<li><a href="./index_iniciar.php">Iniciar Sesión/Registrate</a></li>
						<?php } ?>
					</ul>
				</div>
				<nav class="menu_nav">
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="listings.php">Publicaciones</a></li>
						<li><a href="blog.php">Destacados</a></li>
						<li><a href="about.php">Nosotros</a></li>
					</ul>
				</nav>
			</div>
		</div>