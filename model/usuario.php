<?php 

 
function getUsuario($users)
{
include "conexion.php";

$fullname=$users;
$resultado= $conneccion->query("SELECT persona.Nombre, persona.Apellido, usuario.Nombre_Usuario, usuario.idUsuario FROM usuario, persona WHERE usuario.Nombre_Usuario= \"$fullname\" AND usuario.Estado='1' AND persona.idPersona=usuario.persona_idPersona");
$resultado= $resultado->fetch_array(MYSQLI_NUM);
return $resultado;


}


?>
