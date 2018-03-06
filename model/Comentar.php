<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: text/html; charset=UTF-8');

$coment = $_GET['com']; 

require("conexion.php");
$sql = "INSERT INTO Comentario (Comentario, Fecha_comen, Hora_comen, Libro_idLibro, idUsuario) " +
  "VALUES ('$coment', '$direccion', '$telefono', '$email')";
$result = mysql_query($sql);

$conneccion->close();

echo($result);

?>

INSERT INTO `t-book`.`comentario` (`idComentario`, `Comentario`, `Fecha_comen`, `Hora_comen`, `Libro_idLibro`, `idUsuario`) VALUES (NULL, 'dfsdfsdafgsdfsdfasdcxccscsc', '2018-03-15', '05:33:16', '3', '3');