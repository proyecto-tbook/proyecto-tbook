
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// $conn = new mysqli("localhost", "root", "", "t-book");
require("conexion.php");
$result = $conneccion->query("SELECT persona.Nombre,persona.Apellido,libro.Titulo,libro.Imagen,libro.idLibro,categoria.Nombre as NombreCategoria  FROM usuario,persona,libro,categoria_has_libro,categoria WHERE libro.Usuario_idUsuario1=usuario.idUsuario and usuario.Persona_idPersona=persona.idPersona and categoria_has_libro.Categoria_idCategoria=categoria.idCategoria and categoria_has_libro.Libro_idLibro=libro.idLibro ORDER BY categoria.Nombre,libro.idLibro  DESC LIMIT 12");
echo $conneccion->error;
//$result = $conn->query("SELECT *  FROM libro");

$outp = "";
$salida="";
$bandC=0; //bandera para la categoria
$nombreCategoria="";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {	
    if ($outp != "") {    	
    	$outp .= ",";    	

    }        
   
    if ($bandC!=0&&$nombreCategoria!=$rs["NombreCategoria"]) {    	
    	$salida.='{"'.$nombreCategoria.'":['.$entrada.']},';
    	$entrada="";
    	$outp="";
    	$bandC=0;
    }
        
    $outp .= '{"Titulo":"'  . $rs["Titulo"] . '",';
    $outp .= '"Usuario":"'   . $rs["Nombre"]        . '",';
    $outp .= '"UsuarioApellido":"'   . $rs["Apellido"]        . '",';  
    $outp .= '"lib_id":"'   . $rs["idLibro"]        . '",';
    $outp .= '"dir_img":"'. $rs["Imagen"]     . '"}';
    $entrada=$outp;    
   	
   	$bandC=1;
    
    $nombreCategoria=$rs["NombreCategoria"];
    
}

$salida.='{"'.$nombreCategoria.'":['.$entrada.']}';

$outp ='{"records":['.$salida.']}';
$conneccion->close();

echo($outp);
?>