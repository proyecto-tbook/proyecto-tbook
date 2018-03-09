<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "conexion.php";



$id=$_GET['id'];
$nombre=$_GET['usuario']; 
$titulo=$_GET['titulo']; 
$img=$_GET['img']; 
$autor=$_GET['autor']; 
$categoria=$_GET['categoria']; 
$descrip=$_GET['descripcion']; 
$f_public=$_GET['f_public']; 
$result=$conneccion->query("UPDATE libro SET Titulo =\"$titulo\", 
	autor=\"$autor\", F_publicacion=\"$f_public\", Descripcion=\"$descrip\" where idLibro = $id");
if($result){
	 $response ='{records:[{respuesta: ok}]}'; 
}
else{
	$response ='{records:[{respuesta: error}]}'; 
}
$conneccion->close();
echo ($response);
?>
 
 