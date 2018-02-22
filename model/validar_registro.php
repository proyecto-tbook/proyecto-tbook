<header>	
	<link rel="stylesheet" type="text/css" href="../assets/css/style-menu.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fonts.css">
	<script type="text/javascript" src="../assets/js/menu.js"></script>
</header>
<?php
	if(!empty($_GET["pv"])){
		require("conexion.php");
		$band=0;
		$id=0;
		$p_v=$_GET["pv"];
		$sql="SELECT idUsuario,palabra_verificacion from usuario";
		$resultado=$conneccion->query($sql);
		if($resultado->num_rows>0){
			while($row=$resultado->fetch_assoc()){
				if(strcmp($p_v,$row["palabra_verificacion"])==0){
					$band=1;
					$id=$row["idUsuario"];
					break;
				}
			}
			
			if($band==1){
				$sql="UPDATE usuario set Estado=1 where idUsuario='$id'";
				if($conneccion->query($sql)==true)
					echo '
						<center><div class="card text-white bg-success mb-3" style="max-width: 80%;">
						  <center><div class="card-header">Validación de Cuenta TBook</div></center>
						  <div class="card-body">
						    <h5 class="card-title text-left">Cuenta activada con exito.</h5>
						    <p class="card-text text-left">Su cuenta ha sido activada satisfactoriamente. Ahora ya puede ingresar a su perfil y comenzar a intercambiar libros.</p>
						  </div>
						</div></center>						
					';
				else
					echo '
						<center><div class="card text-white bg-danger mb-3" style="max-width: 80%;">
						  <center><div class="card-header">Error de Cuenta</div></center>
						  <div class="card-body">
						    <h5 class="card-title text-left">Ah surgido un error al activar su cuenta.</h5>
						    <p class="card-text text-left">Lamentamos los inconvenientes, favor enviar un correo a tbook@gmail.com comentando su problema. Muchas Gracias.</p>
						  </div>
						</div></center>
					';
			}
			else
				echo "Error";
		}
		$conneccion->close();
	}
?>
<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
<center><a class='btn btn-success' id="_btnVolverInicio" href="\tbookV3">Volver al inicio</a>	</center>
<style type="text/css">
	#_btnVolverInicio{
		width: 15%;
		background-color: rgb(233,96,74);
		border-style: none;
	}
</style>