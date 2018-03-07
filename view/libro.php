<!DOCTYPE html>
<?php
session_start();
$v1 = $_GET['lib'];

?>
<html lang="es">
  <head>
  	<meta charset="UTF-8">
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
  <body ng-app="app" ng-controller="detalle">
  	<header>
    <?php include("menu.html");?>
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

    <div id="cuerpo" >
      <div class="detalle_cuerpo">
        <div ng-repeat="data in detallelibro">

          
          <div class='portada'>
              <img src="../assets/img/libros/{{data.imagen}}">   
          </div>
          <div class='detalles'>
            <h1>{{data.titulo}}</h1>
            <div>Autor: <span>{{data.autor}}</span></div>
            <div>Fecha de Publicación: <span>{{data.f_public}}</span></div>
            <div id="desc">{{data.descripcion}}</div>
            <div ng-if="'<?php echo $_SESSION['fullname'] ?>' != data.correo_user">
              <?php
                   if(isset($_SESSION['fullname'])){
                      echo "<a id='verLibro' href='#'   class='boton'>Pedir</a>";
                    }
                    else
                      echo "<span style='font-size:10pt;'>Para solicitar este libro: </span><a id='verLibro' style='font-size:10pt;' href='/tbookV3'   class='botonr'>Registrate</a>";
                ?>
            </div>
          </div>
          
                       
        </div>
      </div>
      <div id="t_coment"><h4>Comentarios</h4></div>
      <div class="coments" ng-repeat="data in comentlib">
        <div class="imgperfil">
          <img src="../assets/img/usuario/{{data.img_per}}">
          
          
        </div>
        <div class="informacion">
          <span class="nusu">{{data.n_usuario}}</span>
          <div id="elimina_coment" ng-if="'<?php echo $_SESSION['fullname'] ?>' == data.name_user">
              <!--hacemos todo lo que queramos-->
              <a href='' ng-click = "Eliminar(data.id_coment)">borrar</a>  
          </div>
          <span class="comentario">{{data.comentario}}</span>
        </div>
      </div>
      <br>
      <form class="form-inline ng-pristine ng-valid" id="comentar">
        <?php
               if(isset($_SESSION['fullname'])){
                  $user=$_SESSION['fullname'];
                  echo "<input class='form-control mr-sm-2' type='text' placeholder='Comentar ...' ng-model='comentario' ng-keyup='\$event.keyCode == 13 && Comentar(\"$user\")'>";
                }
            ?>
        
      </form>
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
     <!-- Modal -->   
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <?php
          include 'login.php';
          ?>

        </div>

  </body>

</html>