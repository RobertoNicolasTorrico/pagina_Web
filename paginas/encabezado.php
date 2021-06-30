<?php

if (isset($_REQUEST['pagina']))
	$pagina = $_REQUEST['pagina'];
else
	$pagina = '';

$activo1 = '';
$activo2 = '';
switch ($pagina) {

	case 'productos':
		$activo1 = 'style="color:orange;"';
		$titulo = 'ZonaGamer_Productos';
		break;
	case 'contacto':
		$activo2 = 'style="color:orange;"';
		$titulo = 'ZonaGamer_Contacto';
		break;
	case 'detalleproducto':
		$activo1 = 'style="color:orange;"';
		$titulo = 'ZonaGamer_Detalles_Productos';
		break;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo ?></title>
	<link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../estilos/estilos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg fixed-top bg-negro">
			<div class="container">
				<a class="navbar-brand" href="../index.php"><img src="../img/logos/logo-zonagamer.png"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="../index.php?pagina=inicio">Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" <?php echo $activo1 ?> href="productos.php?pagina=productos">Productos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" <?php echo $activo2 ?> href="contacto.php?pagina=contacto">Contacto</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>