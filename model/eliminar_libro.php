<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: text/html; charset=UTF-8');


$id_libro=$_GET['id'];

require("conexion.php");
$result = $conneccion->query("DELETE FROM libro WHERE idLibro=$id_libro ");

$conneccion->close();

echo($result.$id_libro);

?>|