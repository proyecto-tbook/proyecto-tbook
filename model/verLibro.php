<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$id_Libro = $_GET['id']; 
 


$conn = new mysqli("localhost", "root", "", "t-book");

$result = $conn->query("SELECT * FROM libro where idLibro=".$id_Libro);

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {
    	$outp .= ",";
    }
    $outp .= '{"titulo":"'  . $rs['Titulo'] . '",';
    $outp .= '"imagen":"'   . $rs["Imagen"]        . '",';
    $outp .= '"autor":"'   . $rs["Autor"]        . '",';
    $outp .= '"descripcion":"'   . $rs["Descripcion"]        . '",';
    $outp .= '"f_public":"'. $rs["F_publicacion"]     . '"}';

}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);

?>