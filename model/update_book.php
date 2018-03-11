<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "conexion.php";



// $id=$_GET['id'];
// $nombre=$_GET['usuario']; 
// $titulo=$_GET['titulo']; 
// $img=$_GET['img']; 
// $autor=$_GET['autor']; 
// $categoria=$_GET['categoria']; 
// $descrip=$_GET['descripcion']; 
// $f_public=$_GET['f_public']; 

$id=1;
$autor='JICR'; 
$titulo= 'EL quijote'; 
$img= 'libro10.jpg';
$categoria='Novelas'; 
$descrip= 'Hola soy german'; 
$f_public='2018-02-02'; 
$user= 1;

$result=$conneccion->query("UPDATE libro SET Titulo =\"$titulo\",Foto = \"$img\", 
	Autor=\"$autor\", F_publicacion=\"$f_public\", Descripcion=\"$descrip\" where idLibro = $id and Usuario_idUsuario1 = $user");
if($result){
	 $response ='{records:[{respuesta: ok}]}'; 
}
else{
	$response ='{records:[{respuesta: error}]}'; 
}
$conneccion->close();
echo ($response);
?>
 
 