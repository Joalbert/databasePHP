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
	
	<div class="row">
	<h1 class="col-md-offset-3"> Autenticación y Registro del Usuario</h1>
	</div>
	
        <article class="row">
	<img src="img/faces.jpg" alt="Usuarios" title="Usuarios" class="col-md-6"/>
	<div class="col-md-6">
	<h2 class="row">Autenticación</h2>
	<form action="auth1.php" method="post" name="auth1" >
		<fieldset name="Authentication">
		<div class="row">
		
                    <div class="row">
                    <label for="mail" class="col-md-4">E-mail:</label> 
                    <input type="email" name="email" class="col-md-8" required>
                    </div>
                    
                    <div class="row">
                    <label for="password" class="col-md-4 ">Clave:</label> 
                    <input type="password" name="password" class="col-md-8" required>
                    </div>
		</div>
                <div class="row">
                    <br/>
                    <button type="submit" name="enviar" value="Submit" class="col-md-2  col-md-push-5 btn">Enviar</button> 
                    <button type="reset" form="auth" class="col-md-2 col-md-push-6 btn">Reiniciar</button>
		</div>
		</fieldset>
	</form>
	
	<h2 class="row">Registro de Nuevos Usuarios</h2>
	<form action="registerUser.php" method="post" class="row">
		<fieldset name="Register">
		<div class="row">
		
		<div class="row">
		<label for="RegName" class="col-md-4">Nombre:</label> 
		<input type="text" name="RegName" class="col-md-8" required><br/>
		</div>
		
		<div class="row">
		<label for="RegLastName" class="col-md-4">Apellido:</label> 
		<input type="text" name="RegLastName" class="col-md-8" required><br/>
		</div>
		
		<div class="row">	
		<label for="RegEmail" class="col-md-4">Correo Electrónico:</label> 
		<input type="mail" name="RegEmail" class="col-md-8" required><br/>
		</div>
		
		<div class="row">
		<label for="RegBirthday" class="col-md-4">Fecha de Nacimiento:</label> 
		<input type="date" name="RegBirthday" value="2016-12-31" class="col-md-8" required>
		<br/>
		</div>
		
		<div class="row">
		<label for="RegIdCard" class="col-md-4">C.I:</label> 
		<input type="text" name="RegIdCard" class="col-md-8" required><br/>
		</div>
		
		<div class="row">
		<label for="RegPhone" class="col-md-4">Teléfono:</label> 
		<input type="phone" name="RegPhone" class="col-md-8" required><br/>
		</div>
		
		<div class="row">
		<label for="Userpassword1" class="col-md-4">Clave:</label> 
		<input type="password" name="RegUserpassword1" class="col-md-8" required><br/>
		</div>
		
		<div class="row">
		<label for="Userpassword2" class="col-md-4">Reingrese clave:</label> 
		<input type="password" name="RegUserpassword2" class="col-md-8" required><br/>
		</div>
		
		</div>
		<div class="row">
		<br/>
		
		<button type="submit" name="enviar" value="Submit" class="col-md-2  col-md-push-5 btn">Enviar</button> 
		<button type="reset" form="register" class="col-md-2 col-md-push-6 btn">Reiniciar</button>
		</div>
		<br/>
		</fieldset>
	</form>
	</div>
	
	</article>
	
	<br />
	<h4 class="row"> Derechos de Autor</h4>
	<footer>
	<p>Copyright zhaolifang at https://www.vecteezy.com/vector-art/92889-hipster-vector-silhouettes</p>
	</footer>
</body>
</html>