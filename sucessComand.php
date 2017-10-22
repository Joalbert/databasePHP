<!DOCTYPE html>
<html lang="es">
<head>
<title> Autenticación y Registro del Usuario </title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/theme.css" />
</head>
<body class="container">
	<header class="jumbotron">
	<div class="row">
	<img src="img/maps.jpg" alt="Registro de Carros" title="Registro de Carros" class="col-md-2"/>
	<h1 class="col-md-offset-4">PALCOM GPS</h1>
	</div>
	</header>
	<br />
	<?php 
        require '../Utility/dbConnect.php';
        require '../Utility/validation.php';
        session_start();
        validateSession();
        ?>
	<nav class="navbar">
	<table>
	<ul><a href="registerCar.php" class="btn-primary"> Registro de Carros</a></ul>
	<ul><a href="mapaPosition.php" class="btn-primary"> Localización de Vehiculos</a></ul>
	<ul><a href="facturacion.php" class="btn-primary"> Facturación y Saldos</a></ul>
	<ul><a href="mapaHist.php" class="btn-primary"> Recorridos, Consultas y/o Historicos</a></ul>
	</table>
	</nav>
	
        <h1> Comando Enviado Exitosamente!!</h1>
        
	<br />
	<h4 class="row">Derechos de Autor</h4>
	<footer>
	<p>Copyright zhaolifang at https://www.vecteezy.com/vector-art/92889-hipster-vector-silhouettes</p>
	</footer>
</body>
</html>