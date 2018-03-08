<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

 
 


$conn = new mysqli("localhost", "root", "", "t-book");

$result = $conn->query("SELECT * FROM categoria ");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {
    	$outp .= ",";
    }
    $outp .= '{"cat":"'  . $rs['Nombre'] . '"}';
}
$outp ='{"datos_categoria":['.$outp.']}';
$conn->close();

echo($outp);

?>