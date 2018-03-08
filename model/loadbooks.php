<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: text/html; charset=UTF-8');

$id_Punto = $_GET['categoria'];

$conn = new mysqli("localhost", "root", "", 't-book');
$conn->query("SET NAMES 'utf8'");
$findCategory = $conn->query("SELECT * FROM categoria where Nombre='" . $id_Punto . "'") or trigger_error($conn->error);
$idCategoria = "";
while ($rs = $findCategory->fetch_array()) {
    $idCategoria = $rs['idCategoria'];
}

$outp = "";
$findLibroCategoria = $conn->query("SELECT * FROM categoria_has_libro where Categoria_idCategoria=" . $idCategoria) or trigger_error($conn->error);
while ($rs = $findLibroCategoria->fetch_array(MYSQLI_ASSOC)) {
    $idLibro = $rs['Libro_idLibro'];
    if ($idLibro) {
        $findLibro = $conn->query("SELECT * FROM libro where idLibro=" . $idLibro) or trigger_error($conn->error);
        $datosLibro = mysqli_fetch_row($findLibro);
        if ($outp != "") {
            $outp .= ",";
        }

        $outp .= '{"nombre":"'  . $datosLibro[1] . '",'; 
        $outp .= '"lib_id":"'   . $datosLibro[0]        . '",';       
        $outp .= '"autor":"'   . $datosLibro[3]        . '",';
        $outp .= '"descripcion":"'   . $datosLibro[5]        . '",';
        $outp .= '"imagen":"'   . $datosLibro[2]        . '"}';
    }
}

$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
