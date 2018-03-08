<?php session_start();
 $fullname=$_SESSION['fullname'];
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
    print "<script>alert(\"Acceso !\");window.location='/tbookV3';</script>";
} $us=$_GET['us'];
?>

<!DOCTYPE html>

<html lang="es" >
<head>
	<meta charset="utf-8">
	<title>My TBOOK</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/usuario.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/star-rating.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.7/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.7/angular-resource.min.js"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.7/angular-route.min.js"></script>	
	<script  src="../controller/app.js"></script>
	<script  src="../controller/controller.js"></script>
	<script  src="../controller/ver_libros.js"></script>
		<script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/css/style-menu.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fonts.css">
	<script type="text/javascript" src="../assets/js/opc_avatar.js"></script>

</head>
<body ng-app='app' ng-controller='ctrlUsuario'>
	<header>
		<?php
    		include("../view/menu.html");
  		?>
	</header>


	<h1 id="t_mi_tbook">MI TBOOK</h1>
	
	

	<div align="center" id="info_user" >
		
		<div aling="center" ng-repeat="usario in names" >
			<p >
				<label>
					Nombre:
				</label>
				<input type="text" ng-model="usario.nombre" >
				
			</p>
			<p>
				<label>
					Apellido:
				</label>
				<input type="text" ng-model="usario.apellido">
				
			</p>
			<p>
				<label>
					Correo:
				</label>
				<!--<input type="text" ng-model="usario.correo">-->
				
			</p>
			<button class="btn btn-danger" ng-click="edit(usario)">GUARDAR</button>
			<button class="btn btn-danger" ng-click="cancel()">CANCELAR</button>
		</div>
		
		
		
		
	</div>
	
	
	



</body>

</html>
