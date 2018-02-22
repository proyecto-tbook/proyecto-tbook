<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
    print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}
?>
<html>
    <head>
        <title>.: HOME :.</title>
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <?php include "plantilla/navbar.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                   <!--- <?php if ($_SESSION['is_super'] == 1) { ?>
                        <h2>Bienvenido <?php echo $_SESSION['fullname'] ?> Administrador</h2>
                    <?php } else { ?>---->
                        <h2>Bienvenido <?php echo $_SESSION['fullname'] ?> Usuario</h2>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>