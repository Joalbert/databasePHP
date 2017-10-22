<!DOCTYPE html>
<html lang="es">
<head>
<title> Registro de Usuario </title>
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
	
	
	<nav class="navbar">
	<table>
	<ul><a href="registerCar.php" class="btn-primary"> Registro de Carros</a></ul>
	<ul><a href="mapaPosition.php" class="btn-primary"> Localización de Vehiculos</a></ul>
	<ul><a href="facturacion.php" class="btn-primary"> Facturación y Saldos</a></ul>
	<ul><a href="mapaHist.php" class="btn-primary"> Recorridos, Consultas y/o Historicos</a></ul>
	</table>
	</nav>
	<p class="user-msg"> 
	<?php 
        session_start();
               
        if ($_SESSION['errorReg']==2)
            {
            echo "Cédula de identidad o correo electrónico ya registrado en el sistema."; 
            echo "Por favor validar la información.";
            } 
        if ($_SESSION['errorReg']==1)
            {
            echo "La clave suministrada no coincide, por favor suministrar"
            . " la misma en ambos campos";
            } 
        ?>
        </p>
	<h2 class="col-md-offset-3">Registro de Nuevos Usuarios</h2>
	<div class="row">
	<img src="img/faces.jpg" alt="Usuarios" title="Usuarios" class="col-md-6"/>
	
	<div class="col-md-6">
	<form action="registerUser.php" method="post" enctype="text/plain" name="auth" class="row">
		<fieldset name="Register">
		<div class="row">
		
		<div class="row">
		<label for="name" class="col-md-4">Nombre:</label> 
		<input type="text" name="name" class="col-md-6"><br/>
		</div>
		
		<div class="row">
		<label for="lastName" class="col-md-4">Apellido:</label> 
		<input type="text" name="lastName" class="col-md-6"><br/>
		</div>
		
		<div class="row">
		<label for="email" class="col-md-4">Correo Electrónico:</label> 
		<input type="mail" name="email" class="col-md-6"><br/>
		</div>
		
		<div class="row">
		<label for="birthday" class="col-md-4">Fecha de Nacimiento:</label> 
		<input type="date" name="birthday" required class="col-md-6"><br/>
		</div>
		
		<div class="row">
		<label for="idCard" class="col-md-4">C.I:</label> 
		<input type="text" name="idCard" class="col-md-6"><br/>
		</div>
		
		<div class="row">
		<label for="phone" class="col-md-4">Teléfono:</label> 
		<input type="phone" name="mail" class="col-md-6"><br/>
		</div>
		
		<div class="row">
		<label for="password1" class="col-md-4">Password:</label> 
		<input type="password" name="Userpassword1" class="col-md-6"><br/>
		</div>
		
		<div class="row">
		<label for="password2" class="col-md-4">Password:</label> 
		<input type="password" name="Userpassword2" class="col-md-6"><br/>
		</div>
		
		</div>
		<div class="row">
		<br/>
		<button type="submit" name="enviar" value="Submit" form="register" class="col-md-2  col-md-push-4 btn">Enviar</button> 
		<button type="reset" form="register" class="col-md-2 col-md-push-6 btn">Reiniciar</button>
		</div>
		<br/>
		</fieldset>
	</form>
	</div>
	<br />
	</div>
	<h4 class="row">Derechos de Autor</h4>
	<footer class="col-sm-12">
		<details>
		<summary>Copyright, las imagenes mostrado en este website son de libre distribución y pertenecen a los sitios web listados:</summary>
		<p>Usuario: zhaolifang en https://www.vecteezy.com/vector-art/92889-hipster-vector-silhouettes ,presente en la página web el 09-12-2016 </p>
		</details>
	</footer>
</body>
