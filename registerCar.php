<!DOCTYPE html>
<html lang="es">
<head>
<title> Registro del Carro </title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/theme.css" />

</head>
<body class="container">
<?php
// Control de Acceso no autorizado
require '../Utility/validation.php';
require '../Utility/tableDetail.php';
session_start();        
validateSession();
?>	
	<header class="jumbotron">
	<div class="row">
	<img src="img/maps.jpg" alt="Registro de Carros" title="Registro de Carros" class="col-md-2"/>
	<h1 class="col-md-offset-4">PALCOM GPS</h1>
	</div>
	</header>
	<br />
	
	<nav class="navbar">
	<table>
	<ul><a href="registerCar.php" class="btn-primary"> Registro de Carros</a></ul>
	<ul><a href="mapaPosition.php" class="btn-primary"> Localización de Vehiculos</a></ul>
	<ul><a href="facturacion.php" class="btn-primary"> Facturación y Saldos</a></ul>
	<ul><a href="mapaHist.php" class="btn-primary"> Recorridos, Consultas y/o Historicos</a></ul>
	</table>
	</nav>
	
	<h1 class="row"> Registro de Carro en la Base de Datos </h1>
	<br/>
	
	<div class="row">
	<img src="img/cars.jpg" alt="Registro de Carros" title="Registro de Carros" class="col-md-6"/>
	
	
		
	<form action="registerCar1.php" method="post" name="registerCar" class="col-md-6">
		<fieldset name="RegisterUser"> 
		<h2 class="col-md-offset-3">Usuarios</h2>
		<label for="mail" class="col-md-4">E-mail:</label> 
                <p>
                    <?php
                    //session_start();
                    echo $_SESSION['email'];
                    ?>
                </p>
		</fieldset>
		<fieldset name="registerCar"> 
		<h2 class="col-md-offset-3">Datos del Vehículo </h2>
		<div class="row">
		
                <label for="carType" class="col-md-4">Tipo de Carro:</label> 
                <input type="text" name="carType" class="col-md-8" required><br/>
		
                <label for="carMfr" class="col-md-4">Fabricante:</label> 
                <input type="text" name="carMfr" class="col-md-8" required><br/>
		
                <label for="carMdl" class="col-md-4">Módelo:</label> 
                <input type="text" name="carMdl" class="col-md-8" required><br/>
		
                <label for="carColor" class="col-md-4">Color:</label> 
                <input type="text" name="carColor" class="col-md-8" required><br/>
		
                <label for="carPlate" class="col-md-4">Placa:</label> 
                <input type="text" name="carPlate" class="col-md-8" required><br/>
		
                <label for="carDate" class="col-md-4">Fecha:</label> 
                <input type="date" name="carDate" class="col-md-8" required><br/>
		                
                </div>
		
                <div class="row">
		<br />
		<button type="submit" name="enviar" value="Submit" class="col-md-2  col-md-push-5">Enviar</button> 
		<button type="reset" form="registerCar" class="col-md-2  col-md-push-5">Reiniciar</button>
		</div>
		</fieldset>
	</form>
	
	
	</div>
	<div class="row">
        <summary><h2 class="col-md-offset-4">Carros Registrados</h2></summary>
        <details>   
                <?php 
                userCarsTable($_SESSION['email']);
                ?>   
        </details>
        </div>
        <br />	
	<h4 class="row">Derechos de Autor</h4>
	<footer class="col-sm-12">
		<details>
		<summary>Copyright, las imagenes mostrado en este website son de libre distribución y pertenecen a los sitios web listados:</summary>
		<p>Usuario: momentbloom en https://www.vecteezy.com/vector-art/90280-vector-car-aerial-view-pack ,presente en la página web el 09-12-2016 </p>
		</details>
	</footer>
		
	<br />
</body>