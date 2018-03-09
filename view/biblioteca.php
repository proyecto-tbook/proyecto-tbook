<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title>Biblioteca</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style-menu.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style-section.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style-detalle-libro.css">
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../assets/js/angular.min.js"></script> 
	<script type="text/javascript" src="../assets/js/angular-route.min.js"></script> 
	<script type="text/javascript" src="../assets/js/angular-resource.min.js"></script> 
	<script type="text/javascript" src="../assets/js/opc_avatar.js"></script>
	<script type="text/javascript" src="../controller/app.js"></script>	
	<script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../controller/modelRecientes.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body ng-app="app">
	<header style="position: relative;">	
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
<!-- REVISAR DISPLAY Y CLEAR -->
	<div id="_cuerpo" ng-controller="Ctrl_Libros_Categorias">      		
        
        <ul ng-repeat="(a,categorias) in librosCategorias" style=" display: block; clear: left;" >        	
        	<div ng-repeat="(key,val) in categorias" id="_divCategorias">
        		<div id="_titulo_ultimos" ><h2>{{key}}</h2>
        		</div>
        		<article ng-repeat="x in val | limitTo: 5" >	        		        			
		          <div >
		          <div class='_img_container'>
		            <img src="../assets/img/libros/{{x.dir_img}}">
		          </div>
		          <div id='_datos' >
		            <h3>{{x.Titulo | cut:true:30:' ...'}}</h3>
		            <span>{{x.Usuario}} {{x.UsuarioApellido|cut:true:1:'.'}}</span>
		            <a href=""><span></span></a>
		            <form>
		            <a id="_verLibro" href="Libro.php?lib={{x.lib_id}}"   class="btn btn-success btn-lg" ng-model="servicio.datosCompartidos" ng-click="servicio.anadirElemento(x.lib_id)">Ver ></a>
		          </form>
		          </div>		          
		          </div>
		      	</article>
		       
        	</div>        	
        	
        </ul>
        
      </div>

  	
	<div>
		<div id="auspiciantes" style="margin-top: 25%;">
	        <div id="img_aus">
	          <img src="../assets/img/auspiciantes/unl.png">
	          <img src="../assets/img/auspiciantes/cce.png">
	        </div>
     	</div>
	</div>
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
	<!-- Modal -->   
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <?php
      include 'login.php';
      ?>

    </div>
</body>
</html>