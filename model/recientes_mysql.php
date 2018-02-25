
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// $conn = new mysqli("localhost", "root", "", "t-book");
require("conexion.php");
$result = $conneccion->query("SELECT persona.Nombre,persona.Apellido,libro.idLibro,libro.Titulo,libro.Imagen  FROM usuario,persona,libro WHERE libro.Usuario_idUsuario1=usuario.idUsuario and usuario.Persona_idPersona=persona.idPersona ORDER BY libro.idLibro DESC LIMIT 12");
echo $conneccion->error;
//$result = $conn->query("SELECT *  FROM libro");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Titulo":"'  . $rs["Titulo"] . '",';
    $outp .= '"Usuario":"'   . $rs["Nombre"]        . '",';
    $outp .= '"UsuarioApellido":"'   . $rs["Apellido"]        . '",';
    $outp .= '"lib_id":"'   . $rs["idLibro"]        . '",';
    $outp .= '"dir_img":"'. $rs["Imagen"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conneccion->close();

echo($outp);
?>
