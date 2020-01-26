<?php
include "configs/config.php";
include "configs/funciones.php"	;

if(!isset($p)){
	$p="principal";
}else{$p=$p;}
?>


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Bienvenido a Fabulous Glamour</title>
	<meta name="SWSolution" content="Humberto">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="material.io/fonts.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	
	
</head>

<body>
	<header class="header">Fabulous Glamour</header>
	<div class="menu">
		<a href="?p=principal">Principal</a>
		<a href="?p=productos">Productos</a>
		<a href="?p=ofertas">Ofertas</a>
		<a href="?p=carrito">Carrito</a>
		<a href="?p=admin">Administrador</a>
		<?php
			if(isset($_SESSION['id_cliente'])){
		?>
		<a class="pull-right subir" href="?p=salir">Salir</a>
		<a class="pull-right subir" href="#"><?=nombre_cliente($_SESSION['id_cliente'])?></a>
		<?php
			}
		?>
		<?php
			if(isset($_SESSION['id_admin'])){
		?>
		<a class="pull-right subir" href="?p=salir">Salir</a>
		<a class="pull-right subir" href="#"><?=nombre_admin($_SESSION['id_admin'])?></a>
		<?php
			}
		?>
		?>
	</div>
	<div class="cuerpo">
		<?php
			if(file_exists("modulos/".$p.".php")){
				include "modulos/".$p.".php";
			}else{
				echo "<i>No se ha encontrado el modulo <b>".$p."</b> <a href='./'> Regresar</a></i>";
			}
		?>
	</div>

	<div class="footer">
		Todos los derechos reservados Fabulos Glamour MX | SW Solution &copy; <?=date("Y")?>
	</div>
	<script type="text/javascript" src=""></script>
</body>

</html>