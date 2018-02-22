<?php

function login_user($usernamedb, $clave) {

   // echo "string";
    include "conexion.php";

    $result = mysqli_query($conneccion, "select * from usuario where Nombre_Usuario=\"$usernamedb\" ");
    if (mysqli_num_rows($result)) {
        echo "hola";
        $user_id = null;
        $sql1 = "select * from usuario where Nombre_Usuario=\"$usernamedb\" and Contrasenia=\"$clave\" ";
        $query = $conneccion->query($sql1);
        while ($r = $query->fetch_array()) {
            $user_id = $r["idUsuario"];
            $fullname = $r["Nombre_Usuario"];
          //  $is_super = $r["is_super"];
            break;
        }
       // $con->close();

        if ($user_id == null) {            
            print "<script>alert(\"Usuario o Clave Incorrectas.\");window.location='/tbookV3';</script>";
        } else {
            session_start();
            $_SESSION["user_id"] = $user_id;
            $_SESSION['fullname'] = $fullname;
            $conneccion->close();
            header ("Location: ../view/user.php");
          //  
        }
    } else {
        $conneccion->close();
        print "<script>alert(\"Usuario No Registrado.\");window.location='/tbookV3';</script>";
    }
}

?>
