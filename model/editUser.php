<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include "conexion.php";




$nombre=$_GET['usuario']; 
$apellido=$_GET['apellido']; 
$correo=$_GET['correo']; 
$result=$conneccion->query("UPDATE persona, 
	usuario SET persona.Nombre =\"$nombre\", 
	persona.Apellido=\"$apellido\" where 
	persona.Correo=\"$correo\"  AND usuario.Nombre_Usuario=\"$correo\"  
	AND persona.idPersona=usuario.persona_idPersona");
if($result){
	 $response ='{records:[{respuesta: ok}]}'; 
}
else{
	$response ='{records:[{respuesta: error}]}'; 
}
$conneccion->close();
echo ($response);
?>
 
 