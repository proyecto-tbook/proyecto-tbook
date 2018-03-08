<?php  
	
	 header("Access-Control-Allow-Origin: *");
     header("Content-Type: application/json; charset=UTF-8");
	 header('Content-Type: text/html; charset=UTF-8');

	 require("conexion.php");

	$datos=json_decode(file_get_contents("php://input"));

	 $titulo = $datos->titulo;
	 $autor  = $datos->autor;
	 $f_publi = $datos->f_publicacion;
	 $descripcion = $datos->descripcion;
	 $restriccion = 1;
	 $imagen = '';
	 $id_usuario ='';




	

	
	$sql = "INSERT INTO libro (titulo, imagen, autor, F_publicacion, Descripcion, Restriccion, Usuario_idUsuario1 ) " +
	  "VALUES ('$titulo', '$imagen', '$autor', '$F_publicacion','Descripcion',$restriccion, $usuadio)";
	$result = mysql_query($sql);

	$conneccion->close();

	echo($result);


	/////////imagen////////

	

// 	$foto=$_GET['titulo'];

// // Check connection
// 	$target_dir="foto_doc/";
// 	$target_file=$target_dir.basename($_FILES["fileToUpload"]["name"]);
// 	$uploadOk=1;
// 	$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION)/!-- // <!-- 	<script type='text/javascript'> alert('<?php echo $target_file; </script> -->
// 	<?ph 
	
// //Comprobar si es una imagen
// 	if(isset($_POST["Guardar"])){
// 		$check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
// 		if($check!=false){
// 			echo "Es una imagen- ".$check["mime"]." . ";
// 			$uploadOk=1;
// 		}else{
// 		echo "No es una imagen";
// 		$uploadOk=0;
// 		}
// 	}

// //Existencia del archivo
// 	if(file_exists($target_file)){
// 		echo "Lo siento el archivo no existe";
// 		$uploadOk=0;
// 	}

// // revisa el tamaño
// 	if($_FILES["fileToUpload"]["size"]>500000){
// 		echo "Lo siento la imagen sobrepasa el limite de tamaño";
// 		$uploadOk=0;
// 	}

// //   revisar formato de la imagen
// 	if($imageFileType!="jpg"&&$imageFileType!="png"&&$imageFileType!="jpeg"&&$imageFileType!="gif"){
// 		echo "Lo siento la imagen no es compatible";
// 		$uploadOk=0;
// 	}

//establecer error $uploadOk
	// if($uploadOk==0){
	// 	echo "Lo siento tu imagen no pudo ser enviada";		
	// }else{
	// 	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
	// 		echo "El archivo".basename($_FILES["fileToUpload"]["name"])." a sido enviado";

	// 	}else{
	// 		echo "LO siento error al enviar la imagen";
	// 	}
	// }
?>