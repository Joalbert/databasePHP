<!DOCTYPE html>
<html lang="es">
<head>
<title> Facturación </title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/theme.css" />
</head>
<body class="container">

<?php
// Control de Acceso no autorizado
require '../Utility/validation.php';
require '../Utility/tableDetail.php';
//require 'accountBalance.php';
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
	
	<div class="row">
	<h2 class="col-md-offset-4">Reportar Pago</h2>
	<br/>
	
	<img src="img/invoices.jpg" alt="Facturación" title="Facturación" class="col-md-6" />
	<br />
	
	<form action="registerPayment.php" method="post" class="col-md-6">
		<fieldset name="registerPayment">
			<div class="row">
			
                        <div class="row">
			<label for="user" class="col-md-5">Deuda Actual:</label> 
                        <p>
                        <?php
                        $conn=  dbOpen();
                        echo balance($conn,$_SESSION['email']);
                        ?>
                        </p>
			</div>
                            
                        <div class="row">
			<label for="user" class="col-md-5">Correo Electrónico:</label> 
                        <p>
                        <?php
                        echo $_SESSION['email'];
                        ?>
                        </p>
			</div>
			
                        <div class="row">
			<label for="paymentMethod" class="col-md-5">Método de Pago:</label> 
                        <input type="text" name="paymentMethod" class="col-md-7" required><br/>
			</div>
			
                        <div class="row">
			<label for="bank" class="col-md-5">Banco:</label> 
                        <input type="text" name="bank" class="col-md-7" required><br/>
			</div>
			    
                            
			<div class="row">
			<label for="confirmationNumber" class="col-md-5">Número de Confirmación:</label> 
                        <input type="text" name="confirmationNumber" class="col-md-7" required><br/>
			</div>
			
                        <div class="row">
			<label for="amountPaid" class="col-md-5">Cantidad Pagada:</label> 
                        <input type="text" name="amountPaid" class="col-md-7" required><br/>
			</div>    
                            
			<div class="row">
			<label for="date" class="col-md-5">Fecha:</label> 
                        <input type="date" name="date" class="col-md-7" required><br/>
			</div>
			
			</div>
			<br />
			<div class="row">
			
                        <button type="submit" name="enviar" value="Submit" class="col-md-2  col-md-push-6 btn">Enviar</button> 
			<button type="reset" form="registerCar" class="col-md-2 col-md-push-7 btn">Reiniciar</button>
			</div>
		</fieldset>
	</form>
	</div>
	
	<div class="row">
	<summary><h2 class="col-md-offset-4">Historial de Pagos</h2></summary>
	<details> 
            <?php 
                userPaymentTable($conn,$_SESSION['email']);
                dbClose($conn);
            ?> 
        </details>
	</div>
	<h4 class="row">Derechos de Autor</h4>
	<footer class="row">
		<details>
		<summary>Copyright, las imagenes mostrado en este website son de libre distribución y pertenecen a los sitios web listados:</summary>
		<p>Publicado en https://de.wikipedia.org/wiki/Rechnung ,presente en la página web el 09-12-2016</p>
		</details>
	</footer>
	
</body>
</html>