<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: text/html; charset=UTF-8');

 $id_Libro = $_GET['id']; 

require("conexion.php");
$result = $conneccion->query("SELECT * FROM libro where idLibro=".$id_Libro);

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
$resultcoment = $conneccion->query("SELECT * FROM comentario where Libro_idLibro=".$id_Libro);
$outp2 = "";
while($rs = $resultcoment->fetch_array(MYSQLI_ASSOC)) {
     
    if ($outp2 != "") {
        $outp2 .= ",";
    }
    

    $usuarios = $conneccion->query("SELECT persona.Nombre, persona.Img_persona FROM persona,usuario where persona.idPersona=usuario.Persona_idPersona AND usuario.idUsuario=".$rs["idUsuario"]);
    while($rsu = $usuarios->fetch_array(MYSQLI_ASSOC)) {

        $outp2 .= '{"n_usuario":"'  . $rsu['Nombre'] . '",';
        $outp2 .= '"img_per":"'. $rsu["Img_persona"]     . '",';

    }


    $outp2 .= '"comentario":"'  . $rs['Comentario'] . '",';
    $outp2 .= '"id_usu":"'. $rs["idUsuario"]     . '"}';

}
$outp ='{"records":['.$outp.'],"records2":['.$outp2.']}';
$conneccion->close();

echo($outp);

?>