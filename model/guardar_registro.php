<header>	
	<link rel="stylesheet" type="text/css" href="../assets/css/style-menu.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/fonts.css">
	<script type="text/javascript" src="../assets/js/menu.js"></script>
</header>
<?php	

	if(!isset($_POST["submit"])){		
		$nombres_ibd=$_POST["_iptNombres"];		
		$apellidos_ibd=$_POST["_iptApellidos"];		
		$fecha_nacimiento_ibd=$_POST["_slctAnio"]."-".$_POST["_slctMes"]."-".$_POST["_slctDia"];				
		$genero_ibd=$_POST["_slctGenero"];		
		$u_ibd=$_POST["_iptEmail"];
		$p_ibd=$_POST["_iptPassword"];				
		$uploadOk=1;		
		$img_ibd="default.png";		

		if($uploadOk!=0){
			require("generar_palabra_verificacion.php");

			include("conexion.php");								
			$sql="INSERT INTO persona (Nombre,Apellido,Correo,Fecha_nacimiento,Genero,Img_persona) VALUES('$nombres_ibd','$apellidos_ibd','$u_ibd','$fecha_nacimiento_ibd','$genero_ibd','$img_ibd')";			
			$sql2="SELECT idPersona FROM persona where Correo='$u_ibd'";

			if($conneccion->query($sql)===true){
				$resultado=$conneccion->query($sql2);
				if($resultado->num_rows>0){
					while($row=$resultado->fetch_assoc()){
						$id_per_ebd=$row["idPersona"];
					}					
					$sql3="INSERT INTO usuario(Nombre_Usuario,contrasenia,Estado,Persona_idPersona,palabra_verificacion) VALUES('$u_ibd','$p_ibd','','$id_per_ebd','$palabra_v')";					
					if($conneccion->query($sql3)===true){
						//$dir="http://localhost/TBookProject/model/validar_registro.php?pv=";
						//$palabra_v_email=$dir.$palabra_v;
						//AQUI ENVIAR EL EMAIL
						require("enviar_correo.php");
						echo '
							<center><div class="card text-white bg-success mb-3" style="max-width: 80%;">
							  <center><div class="card-header">Creacion de Cuenta</div></center>
							  <div class="card-body">
							    <h5 class="card-title text-left">Su cuenta ha sido creada con éxito.</h5>
							    <p class="card-text text-left">Ahora debe activarla, para lo cual se enviará un mensaje a su correo electrónico</p>
							  </div>
							</div></center>						
						';
					}
					else{
						//echo $conneccion->error. "\n";
						echo '
							<center><div class="card text-white bg-danger mb-3" style="max-width: 80%;">
							  <center><div class="card-header">Error de Cuenta</div></center>
							  <div class="card-body">
							    <h5 class="card-title text-left">Ah surgido un error al crear su cuenta.</h5>
							    <p class="card-text text-left">Lamentamos los inconvenientes, favor regresar a inicio y volver a intentarlo. Gracias por su compresión.</p>
							  </div>
							</div></center>
						';
					}
				}
			}
			else
				echo '
					<center><div class="card text-white bg-danger mb-3" style="max-width: 80%;">
					  <center><div class="card-header">Error de Cuenta</div></center>
					  <div class="card-body">
					    <h5 class="card-title text-left">Ah surgido un error al crear su cuenta.</h5>
					    <p class="card-text text-left">Lamentamos los inconvenientes, favor regresar a inicio y volver a intentarlo. Gracias por su compresión.</p>
					  </div>
					</div></center>
				';
			$conneccion->close();		
		}
		/*else{
			if($band==0){
				$mensaje_erroc="El correo ya existe";
				header("Location:pag_registro_estudiante.php?m_ec=$mensaje_erroc");
			}
			else
				header("Location:pag_registro_estudiante.php");
		}*/		
	?>
	<br>	
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<center><a class='btn btn-success' id="_btnVolverInicio" href="\tbookV3">Volver al inicio</a>	</center>
	<style type="text/css">
		#_btnVolverInicio{
			width: 15%;
			background-color: rgb(233,96,74);
			border-style: none;
		}
	</style>
	<?php
	}
	?>