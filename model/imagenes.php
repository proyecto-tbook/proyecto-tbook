<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$id_Punto = $_GET['id']; 
 
 


$conn = new mysqli("localhost", "root", "", "t-book");

$result = $conn->query("SELECT * FROM libro where Usuario_idUsuario1=".$id_Punto);

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {
    	$outp .= ",";
    }
    $outp .= '{"nombre":"'  . $rs['Titulo'] . '",';
    $outp .= '"imagen":"'   . $rs["Imagen"]        . '",';
    $outp .= '"autor":"'   . $rs["Autor"]        . '",';
    $outp .= '"id_libro":"'   . $rs["idLibro"]        . '",';
    $outp .= '"f_public":"'. $rs["F_publicacion"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);

?>