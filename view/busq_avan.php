<!DOCTYPE html>
<?php
session_start();
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tbook</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style-menu.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style-section.css">
	<!-- <link rel="icon" type="image/png" href="assets/img/favicon_preh.jpg"> -->
	<link rel="stylesheet" type="text/css" href="../assets/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/registro.css">
<!-- Incluir Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">

	<!-- Incluir angular js -->
  	<script type="text/javascript" src="../assets/js/angular.min.js"></script> 
  	<script type="text/javascript" src="../assets/js/angular-route.min.js"></script> 
  	<script type="text/javascript" src="../assets/js/angular-resource.min.js"></script> 
    <script type="text/javascript" src="../assets/js/opc_avatar.js"></script>
    <script type="text/javascript" src="../controller/registro.js"></script>

	<script  src="../controller/controller.js"></script>

	<script type="text/javascript" src="../controller/modelRecientes.js"></script>
<!-- fin angular js -->
	<script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Fin Incluir Bootstrap -->
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
</head>
<body ng-app="app" ng-controller="myCtrl">
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

<div >
	<table>
		<tr>
			<td> 
				<label>
					Nombre del libro:
				</label>
			</td>
			<td>
				<input type="text" ng-model="libro.nombre">
			</td>

		</tr>

		<tr>
			<td>
				<label>
					Autor:
				</label>
			</td>
			<td>
				<input type="text" ng-model="libro.autor">
			</td>

		</tr>
		<tr>
			<td>
				<label>
					Categoria:
				</label>
			</td>
			<td>

				<select ng-model="libro.categoria">
					<option ng-repeat="x in cars" value="{{x.model}}">{{x.model}}</option>
				</select>

			</td>
		</tr>

	</table>
</div>
<div ng-view></div>
</body>
</html>