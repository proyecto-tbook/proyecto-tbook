<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: text/html; charset=UTF-8');


$id_coment=$_GET['id'];

require("conexion.php");
$result = $conneccion->query("DELETE FROM comentario WHERE idComentario=$id_coment");

$conneccion->close();

echo($result);

?>