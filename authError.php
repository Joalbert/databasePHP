<!DOCTYPE html>
<html lang="es">
<head>
<title> Error en la Autenticación  </title>
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
	
	<p class="user-msg">Por favor verifique el usuario y la contraseña, estos datos no coinciden con los registrados en el sistema</p>
	
	<div class="row">
	<img src="img/faces.jpg" alt="Usuarios" title="Usuarios" class="col-md-6"/>
	<br/>
	<form action="auth1.php" method="post" class="col-md-6">
		<fieldset name="Authentication">
		<div class="row">
		
		<div class="col-md-4">
		<label for="mail" >E-mail:</label> 
                <input type="email" name="email">
		</div>
		
		<div class="col-md-4">
		<label for="password">Password:</label> 
                <input type="password" name="password">
		</div>
		
		<div class="col-md-4">
		<br />
		<button type="submit" name="enviar" value="Submit" class="btn"> Enviar</button> 
		<button type="reset" form="auth" class="btn">Reiniciar</button>
		</div>
		
		</div>
		</fieldset>
	</form>
	</div>
	<br />	
<br />	
<br />	

	
<h4 class="row">Derechos de Autor</h4>

<footer class="row">
<details>
<summary>Copyright, las imagenes mostrado en este website son de libre distribución y pertenecen a los sitios web:</summary>
<p>https://www.vecteezy.com/vector-art/92889-hipster-vector-silhouettes</p>
</details>
</footer>
	
</body>