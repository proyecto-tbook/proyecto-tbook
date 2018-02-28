<!DOCTYPE html>
<?php
session_start();
$v1 = $_GET['lib'];

?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tbook</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style-menu.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style-section.css">
	<!-- <link rel="icon" type="image/png" href="assets/img/favicon_preh.jpg"> -->
	<link rel="stylesheet" type="text/css" href="../assets/css/fonts.css">
<!-- Incluir Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">

	<!-- Incluir angular js -->
  	<script type="text/javascript" src="../assets/js/angular.min.js"></script> 
  	<script type="text/javascript" src="../assets/js/angular-route.min.js"></script> 
  	<script type="text/javascript" src="../assets/js/angular-resource.min.js"></script> 
    <script type="text/javascript" src="../assets/js/opc_avatar.js"></script>
    <script type="text/javascript" src="../controller/app.js"></script>


	<script type="text/javascript" src="../controller/modelRecientes.js"></script>
<!-- fin angular js -->
	<script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Fin Incluir Bootstrap -->
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
</head>
<body ng-app="app" ng-controller="detalle">
	<header>
	<!--<script type="text/javascript" src="assets/js/menu.js"></script>-->
  <?php
    include("menu.html");
  ?>
	</header>
  <?php
  if(isset($_SESSION['fullname'])){
    echo "<script>";
    echo "desaparecer();";
    echo "aparecer();";
    echo "</script>";
  }
  ?>
   
  <?php
  if(isset($_SESSION['fullname'])){
    echo "<script>";
    echo "aparecer();";
    echo "</script>";
  }
  ?>


    
      <div id="cuerpo" >
       
        
        <!-- {{detalleLibro(<?php echo $v1;?>)}}   -->
        <a id="target" style="top:100px; color:#000;" href="#!verlibro" ng-click="verLibro(<?php echo $v1; ?>)">ver</a>

      
      </div>
        <div ng-repeat="data in detallelibro">
      
      <h1>{{data.titulo}}</h1>
      <img src="../assets/img/libros/{{data.imagen}}">                

    </div>  
  <!-- <div ng-view></div> -->
      
     

<footer style="background: #ff5248; color: white; text-align: center">
    <div class="row">
        <div class="col-md-4">
            <h5>INFORMACIÓN LEGAL</h5>
            <a href=""><p>Condiciones de uso</p></a>
            <a href=""><p>Normas de comunidad</p></a>
            <a href=""><p>Politicas del sitio</p></a>
        </div>
       <div class="col-md-4">
            <h5>AYUDA</h5>
            <a href=""><p>Condiciones de uso</p></a>
            <a href=""><p>Normas de comunidad</p></a>
            <a href=""><p>Politicas del sitio</p></a>
        </div>
        <div class="col-md-4 iconos">
            <h5>SIGUENOS EN LAS REDES</h5>
            <a href=""><span class='icon-facebook2'></span></a>
            <a href=""><span class='icon-twitter'></span></a>
            <a href=""><span class='icon-instagram'></span></a>
            <a href=""><span class='icon-youtube'></span></a>
        </div>

<span style="width:100%; text-align: right; font-size:12pt; padding-bottom:24px;">tbook-Todos los derechos reservados</span>                         
    </div> 
</footer>


</body>


</html>