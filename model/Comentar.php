<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: text/html; charset=UTF-8');

$coment = $_GET['com']; 
$user = $_GET['usu']; 
$lib = $_GET['lib']; 
$id_user;
require("conexion.php");
$result = $conneccion->query("SELECT idUsuario FROM usuario where Nombre_Usuario='$user'");

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    $id_user=$rs['idUsuario'];
}



$result = $conneccion->query("INSERT INTO comentario (idComentario,Comentario, Fecha_comen, Hora_comen, Libro_idLibro, idUsuario) " .
  "VALUES (null,'$coment', '2018-03-15', '05:33:16','$lib','$id_user')");

$conneccion->close();

echo($result);
