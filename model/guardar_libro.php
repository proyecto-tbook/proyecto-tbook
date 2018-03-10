<?php  
	
	 header("Access-Control-Allow-Origin: *");
     header("Content-Type: application/json; charset=UTF-8");
	 header('Content-Type: text/html; charset=UTF-8');

	 require("conexion.php");
	 // {titulo : datos.titulo,
  //           autor : datos.autor,
  //           f_publicacion : datos.f_publicacion,
  //           descripcion : datos.descripcion,
  //           foto : datos.foto,
  //           categoria : datos.cate

	//$datos=json_decode(file_get_contents("php://input"));

	 $titulo = $_GET['titulo'];
	 $autor  = $_GET['autor'];
	 $f_publi = $_GET['f_publicacion'];
	 $descripcion = $_GET['descripcion'];
	 $restriccion = 1;
	 $foto = $_GET['foto'];
	 $id_user = $_GET['user'];
	 $categoria = $_GET['cate'];
	 // $titulo = 'A orillas del rio piedra me sente y llores';
	 // $foto = 'libro12.jpg';
	 // $autor  = 'Paulo Coelho';
	 // $f_publi = '2018-02-02';
	 // $descripcion = 'Viaje de dos amigos de infancia x el mundo';
	 // $restriccion = 1;
	 
	 // $id_user = 1;
	
	$sql = "INSERT INTO libro (Titulo, Imagen, Autor, F_publicacion, Descripcion, Restriccion, Usuario_idUsuario1 ) " +
	  "VALUES ('$titulo', '$foto', '$autor', '$f_publi','descripcion',$restriccion, $id_user)";
	$result = mysql_query($sql);

	$id_libro=mysql_insert_id();

	// $id_libro = "SELECT * FROM libro where ");

	$sql2 ="INSERT INTO categoria (Categoria_idCategoria, Libro_idLibro)"+
	"VALUES('$categoria','$id_libro')";

	$result = mysql_query($sql2);
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