<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

 
 


$conn = new mysqli("localhost", "root", "", "t-book");

$result = $conn->query("DELETE FROM `t-book`.`libro` WHERE `idLibro`='12' and`Usuario_idUsuario1`='1'");

$conn->close();

echo($outp);

?>





