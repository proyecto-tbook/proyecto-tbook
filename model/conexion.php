<?php		
	$servername="localhost";
	$username="root";
	$password="";
	$database="t-book";

	$conneccion=new mysqli($servername,$username,$password,$database);
	$conneccion->query("SET NAMES 'utf8'");
	if($conneccion->connect_error){
		die("Error de conexion: ".$conneccion->connect_error);
	}	
?>