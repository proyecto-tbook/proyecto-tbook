<?php session_start();
 $fullname=$_SESSION['fullname'];
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
    print "<script>alert(\"Acceso !\");window.location='/tbookV3';</script>";
} 

include "../model/usuario.php";
$users=  getUsuario($fullname);

//printf($users[0]);

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
<body ng-app='app' ng-controller='controlador'>
	<header>
		<?php
    		include("../view/menu.html");
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
	<h1 id="t_mi_tbook">MI TBOOK</h1>
	<div align="center" class="panel panel-danger col-sm-5 col-md-2" width="100px" height="195">
	<div class="panel-heading">
	<h3 clas="panel-title" align="center">Calificación</h3>
	</div>
	<!-- estrellas de calificación-->
	<div class="star panel-body" align="center">
		
		<p class="clasificacion star1">
   			<input id="radio1" name="estrellas" value="5" type="radio"><!--
    	--><label  class="star2" for="radio1">★</label><!--
    	--><input id="radio2" name="estrellas" value="4" type="radio"><!--
    	--><label  class="star2" for="radio2">★</label><!--
    	--><input id="radio3" name="estrellas" value="3" type="radio"><!--
    	--><label class="star2" for="radio3">★</label><!--
    	--><input id="radio4" name="estrellas" value="2" type="radio"><!--
    	--><label class="star2" for="radio4">★</label><!--
    	--><input id="radio5" name="estrellas" value="1" type="radio"><!--
    	--><label class="star2" for="radio5">★</label>
  		</p>
	</div>
	</div>
	<nav class="woocommerce-MyAccount-navigation">
		<ul class="woocommerce-MyAccount-navigation">
			<li class="woocommerce-MyAccount-navigation not(.is-active):hover ">
				<a href="#!perfil" class="camb" ng-click = "ver_libros(' <?php echo $users[3]; ?>')">Mi Biblioteca</a>
			</li>		
			
		</ul>
	</nav>

	<div align="center" id="info_user">
		
		<div>
			<img src="../assets/img/usuario/default.png" class=" rounded-circle rounded mx-auto d-block" alt="Cinque Terre" width="125" height="124">
		</div >
		
		<div aling-text="rigth" >
			<p >
				<label>
					Nombre:
				</label>
				<label >
					<?php print_r($users[0]);?>
				</label>
			</p>
			<p>
				<label>
					Apellido:
				</label>
				<label >
				<?php print_r($users[1]);?>
				</label>
				
			</p>
			<p>
				<label>
					Correo:
				</label>
				<label >
				<?php print_r($users[2]);?>
				</label>
				
			</p>

		</div>
		<a id="editus" href="edit_user.php?us=<?php echo $users[3];?>" class="btn btn-danger">editar</a>
		
		
	</div>
	<br>
	<br>
	
	

</div>
		
	
	<div ng-view></div>

</body>

</html>
