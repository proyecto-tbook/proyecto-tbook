<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "t-book");

$result = $conn->query("SELECT * FROM libro where Usuario_idUsuario= 1");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {
    	$outp .= ",";
    }
    $outp .= '{"nombre":"'  . $rs["Nombre"] . '",';
    $outp .= '"imagen":"'   . $rs["Imagen"]        . '",';
    $outp .= '"autor":"'   . $rs["Autor"]        . '",';
    $outp .= '"f_public":"'. $rs["F_publicacion"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
	
?>