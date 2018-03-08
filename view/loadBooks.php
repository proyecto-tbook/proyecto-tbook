<!DOCTYPE html>
<?php
session_start();
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
      
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Tbook</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style-menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style-section.css">
    <!-- <link rel="icon" type="image/png" href="assets/img/favicon_preh.jpg"> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style-detalle-libro.css">
    <!-- Incluir Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Incluir angular js -->
    <script type="text/javascript" src="../assets/js/angular.min.js"></script> 
    <script type="text/javascript" src="../assets/js/angular-route.min.js"></script> 
    <script type="text/javascript" src="../assets/js/angular-resource.min.js"></script> 
    <script type="text/javascript" src="../assets/js/opc_avatar.js"></script>
    <script type="text/javascript" src="../controller/app.js"></script>
    <script type="text/javascript" src="../controller/modelRecientes.js"></script>
    <!-- fin angular js -->
      <!-- Importancion para ventana Modal de Inicio de sesion-->
    <script src="assets/js/valida_login.js"></script> 
    <script  src="controller/app.js"></script>
    <script  src="controller/controller.js"></script>
  <!-- FIN Impoertancion para ventana Modal de Inicio de sesion-->
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Fin Incluir Bootstrap -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>    
    <body ng-app="app">  

    <header>
    <!--<script type="text/javascript" src="assets/js/menu.js"></script>-->
  <?php
    include("../view/menu.html");
  ?>
    </header> 
    <?php
      if(isset($_SESSION['fullname'])){
        echo "<script>";
        echo "desaparecer();";
        echo "aparecer();";
        echo "</script>";
      }
    ?>
     
    <?php
      if(isset($_SESSION['fullname'])){
        echo "<script>";
        echo "aparecer();";
        echo "</script>";
      }
    ?>                     
        <h3 style="background: #595959; color: #fefefe;padding: 50px;text-align: center ">
            Categoria 
            <?php echo $_GET['categoria'] ?>
        </h3>
        <div id="cuerpo" ng-controller="cargarLibros">                                    
            <div ng-init="load('<?php echo $_GET['categoria'] ?>')">
            </div>            
            <center>                
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">                        
                        <div class="carousel-item active" > 
                            <table cellpadding="10">
                                <tr>
                                    <th ng-repeat="x in names">
                                        <div class="card" style="width: 18rem;">
                                            <center>
                                            <img style="max-width:200px;" class="card-img-top" src="../assets/img/libros/{{x.imagen}}">
                                            </center>
                                            <div class="card-body">
                                                <h5 class="card-title">{{x.nombre}}</h5>
                                                <a id="verLibro" href="../view/Libro.php?lib={{x.lib_id}}"   class="btn btn-success btn-lg" >Ver ></a>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <!--                        <div class="carousel-item" ng-repeat="x in names" ng-if="$index > 0">
                                                    <table cellpadding="10">
                                                        <tr>
                                                            <th>
                                                                <div class="card" style="width: 18rem;">
                                                                    <img class="card-img-top" src="{{x.imagen}}">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">{{x.nombre}}</h5>
                                                                        <p class="card-text">{{x.descripcion}}</p>
                                                                        <a href="#" class="btn btn-primary">{{x.autor}}</a>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </div>-->
                    </div>
                </div>
                <a class="btn btn-lg btn-secondary" href="./../index.php">Regresar</a>
            </center>
        </div> 
        <footer style="background: #ff5248; color: white; text-align: center">
            <div class="row">
                <div class="col-md-4">
                    <h5>INFORMACIÓN LEGAL</h5>
                    <a href=""><p>Condiciones de uso</p></a>
                    <a href=""><p>Normas de comunidad</p></a>
                    <a href=""><p>Politicas del sitio</p></a>
                </div>
                <div class="col-md-4">
                    <h5>AYUDA</h5>
                    <a href=""><p>Condiciones de uso</p></a>
                    <a href=""><p>Normas de comunidad</p></a>
                    <a href=""><p>Politicas del sitio</p></a>
                </div>
                <div class="col-md-4 iconos">
                    <h5>SIGUENOS EN LAS REDES</h5>
                    <a href=""><span class='icon-facebook2'></span></a>
                    <a href=""><span class='icon-twitter'></span></a>
                    <a href=""><span class='icon-instagram'></span></a>
                    <a href=""><span class='icon-youtube'></span></a>
                </div>

                <span style="width:100%; text-align: right; font-size:12pt; padding-bottom:24px;">tbook-Todos los derechos reservados</span>                         
            </div> 
        </footer>
    </body>
</html>
