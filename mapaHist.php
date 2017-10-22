 <!DOCTYPE html>
 <html lang="es">
  <head>
    <title>Historia de Posiciones </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/mapaPosicion.css" />
	<link rel="stylesheet" type="text/css" href="css/theme.css" />
         <link rel="stylesheet" href="https://openlayers.org/en/v3.20.1/css/ol.css" type="text/css">
        <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
         <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
        <script src="https://openlayers.org/en/v3.20.1/build/ol.js"></script>
        <!--<script src="http://openlayers.org/api/OpenLayers.js"></script>-->
	<script src="js/mapaPosicionBase.js"></script>
        <script src="js/mapaPosicionHist.js"></script>
  </head>
   <meta http-equiv="refresh" content="600" />
<!--<div id="mark"></div>-->
<body onload="init();" class="container">
    
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
	<?php
        // Control de Acceso no autorizado
        require '../Utility/validation.php';
        session_start();
        validateSession();
        ?>	
        
	<div class="row">
	<h2 class="col-md-offset-4">Mapa con la Historia de las Posiciones </h2>
	<br/>
	</div>
	<p>El mapa se actualiza automaticamente cada cinco minutos</p>
	<div id="basicMap"></div>
        <div id="location" class="marker icon-flag"></div>
        <br />
       
        <div id="resumeTable"> 
        <?php
        require '../Utility/tableDetail.php';
        $email=$_SESSION['email'];
        //$email="joalbertp@gmail.com";
        //positionTrackers($_SESSION['email']);
        positionTrackers($email);
        ?>
        </div>    
        
        <br />
        <legend> Carros en el mapa</legend>
        <p><strong>El cuadrado <span style="color:rgba(255,0,0,0.8);">rojo</span> en el mapa simboliza que el carro se ha detenido.</strong></p>
        <p><strong>El circulo <span style="color:rgba(0,255,0,0.8);">verde</span> en el mapa simboliza que el carro esta en movimiento.</strong></p>
        <div id="carFeatures"></div>
	
        <br />
	
	<?php
        userCarsCheckBox($email);
        ?>
        
	

</body>
</html>
