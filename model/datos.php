<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

<<<<<<< HEAD
=======

>>>>>>> origin/Nelson
 
 


$conn = new mysqli("localhost", "root", "", "t-book");

<<<<<<< HEAD
$result = $conn->query("SELECT * FROM categoria ");
=======
$result = $conn->query("SELECT * FROM categoria");
>>>>>>> origin/Nelson

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {
    	$outp .= ",";
    }
<<<<<<< HEAD
    $outp .= '{"cat":"'  . $rs['Nombre'] . '"}';
}
$outp ='{"datos_categoria":['.$outp.']}';
=======
    $outp .= '{"categoria":"'  . $rs['Nombre'] . '"}';
}
$outp ='{"cat":['.$outp.']}';
>>>>>>> origin/Nelson
$conn->close();

echo($outp);

?>