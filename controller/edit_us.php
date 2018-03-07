<?php 
 //print_r("hola");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "../model/conexion.php";
$id_Punto = $_GET['id']; 
 
 //print_r($id_Punto);

$result= $conneccion->query("SELECT persona.Nombre, persona.Apellido, usuario.Nombre_Usuario FROM usuario, persona WHERE usuario.idUsuario= \"$id_Punto\" AND usuario.Estado='1' AND persona.idPersona=usuario.persona_idPersona");



$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {
    	$outp .= ",";
    }
    $outp .= '{"nombre":"'  . $rs['Nombre'] . '",';
    $outp .= '"apellido":"'   . $rs["Apellido"]        . '",';
    $outp .= '"correo":"'   . $rs["Nombre_Usuario"]        . '"}';
    
}
$outp ='{"records":['.$outp.']}';
$conneccion->close();

echo($outp);

?>

