<!DOCTYPE html>
<?php
session_start();
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tbook</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style-menu.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style-section.css">
	<!-- <link rel="icon" type="image/png" href="assets/img/favicon_preh.jpg"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="assets/css/registro.css">
<!-- Incluir Bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

	<!-- Incluir angular js -->
  	<script type="text/javascript" src="assets/js/angular.min.js"></script> 
  	<script type="text/javascript" src="assets/js/angular-route.min.js"></script> 
  	<script type="text/javascript" src="assets/js/angular-resource.min.js"></script> 
    <script type="text/javascript" src="assets/js/opc_avatar.js"></script>
    <script type="text/javascript" src="controller/registro.js"></script>
    <script type="text/javascript" src="controller/app.js"></script>
  <!-- Importancion para ventana Modal de Inicio de sesion-->
  <script src="assets/js/valida_login.js"></script> 
  <script  src="controller/app.js"></script>
  <script  src="controller/controller.js"></script>
  <!-- FIN Impoertancion para ventana Modal de Inicio de sesion-->
 
   <!-- Alex -->

	<script type="text/javascript" src="controller/modelRecientes.js"></script>
<!-- fin angular js -->
	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Fin Incluir Bootstrap -->
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
</head>
<body ng-app="app" ng-controller="modeloReciente">
	<header>
	<!--<script type="text/javascript" src="assets/js/menu.js"></script>-->
  <?php
    include("view/menu.html");
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

	<div id="banner">
		<div id="informacion">
				<h1>Prestamo y cambio<br>de libros usados</h1>
				<a href="#" data-toggle="modal" data-target="#registroModal">Registrarse</a>
		</div>
    <div id="inf_ad">
        <h4>Registrate y sacale provecho a tus libros de: <br>Literatura, Filosofia, Poesía y Novelas </h4>
    </div>
	</div>
  <section>
    
      <div id="cuerpo" >
      
        

        <div id="titulo_ultimos" ><h2>Ultimos añadidos</h2>
        </div>
        <article ng-repeat="x in names">
          <div >
          <div class='img_container'>
            <img src="assets/img/libros/{{x.dir_img}}">
          </div>
          <div id='datos'>
            <h3>{{x.Titulo| cut:true:30:' ...'}}</h3>
            <a href=""><span>{{x.Usuario}} {{x.UsuarioApellido|cut:true:1:'.'}}</span></a>
            
            <a id="verLibro" href="view/Libro.php?lib={{x.lib_id}}"   class="btn btn-success btn-lg" ng-model="servicio.datosCompartidos" ng-click="servicio.anadirElemento(x.lib_id)">Ver ></a>
          <!--  -->
          </div>
          
          </div>
        </article>
        <div ng-view>
        </div>
      </div>
     
      <div id='btn_biblio'>
        <a href="">Ir a Biblioteca</a>
      </div>
      <div id="auspiciantes">
        <div id="img_aus">
          <img src="assets/img/auspiciantes/unl.png">
          <img src="assets/img/auspiciantes/cce.png">
        </div>
      </div>
  </section>
 
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

<!-- VENTANA MODAL -->
<div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="registroModalTitle" aria-hidden="true" ng-controller="controladorRegistro">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="_divRegistroModal">      
      <div class="modal-content">      
        <form action="model/guardar_registro.php" method="post" class="needs-validation" novalidate="">
          <div class="modal-header">
            <h5 class="modal-title" id="_registroModalLongTitle">Registro TBook</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="_btnCerrarModal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="_divRegistroModalBody">    
            <div class="form-group">
              <div>
                <label for="validationCustom01" id="_lblNombres">Nombres</label>
                <input type="text" name="_iptNombres" id="_iptNombres" placeholder="Nombres" class="form-control" required class="form-control" id="validationCustom01">
                <div class="invalid-feedback">
                  Debe ingresar su nombre.
                </div>
              </div>
              <div>
                <label id="_lblApellidos">Apellidos</label>
                <input type="text" name="_iptApellidos" id="_iptApellidos" placeholder="Apellidos" class="form-control" required="hola">
                <div class="invalid-feedback">
                  Debe ingresar su apellido.
                </div>
              </div>
              <div>
                <label id="_lblEmail">Email</label>
                <input type="email" name="_iptEmail" id="_iptEmail" placeholder="Email" class="form-control" required>
                <div class="invalid-feedback">
                  Debe ingresar su correo.
                </div>
              </div>
              <div>
                <label id="_lblEmail">Contraseña</label>
                <input type="password" name="_iptPassword" id="_iptPassword" placeholder="Contraseña" class="form-control" ng-model="Password1" required>
                <div class="invalid-feedback">
                  Debe ingresar su contraseña.
                </div>
              </div>
              <div>
                <label id="_lblEmail">Repita Contraseña </label><label id="_lblError">{{mensajeError}}</label>
                <input type="password" id="_iptRepeatPassword" placeholder="Contraseña" class="form-control" ng-model="Password2" ng-blur="validarPassword(Password1,Password2)" required>                
                <div class="invalid-feedback">
                  Debe repetir su contraseña.
                </div>
              </div>
              <div>
                <label id="_lblFNacimiento">Fecha de Nacimiento</label><br>
                <div class="input-group">          
                  <select class="custom-select mr-sm-2" name="_slctMes" id="_slctMes" required> 
                    <option value="">Mes...</option>                   
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                  </select>
                  <select class="custom-select mr-sm-2" name="_slctDia" id="_slctDia" required>                    
                    <option value="">Día...</option>                   
                    <?php
                      for ($i=1;$i<=31; $i++) { 
                      echo '<option value="'.$i.'">'.$i.'</option>';
                      }                   
                    ?>
                  </select>

                  <select class="custom-select mr-sm-2" name="_slctAnio" id="_slctAnio" required>                    
                    <option value="">Año...</option>                   
                    <?php
                      for ($i=1950;$i<=date("Y")-6; $i++) { 
                      echo '<option value="'.$i.'">'.$i.'</option>';
                      }                   
                    ?>
                  </select>
                  <div class="invalid-feedback">
                  Debe ingresar su fecha de nacimiento.
                </div>
                </div>                
              </div>
              <div>
                <label id="_lblGenero">Género</label><br>
                <select class="custom-select mr-sm-2" name="_slctGenero" id="_slctGenero" required>
                  <option value="">Género...</option>
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
                  <option value="O">Otros</option>
                </select>
                <div class="invalid-feedback">
                  Debe ingresar su género.
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">          
            <input type="submit" id="_btnRegistro" class="btn btn-primary" value="REGISTRARSE">
          </div>
        </form> 
      </div>
             
    </div>
  </div>
<!-- FIN VENTANA MODAL -->

        <!-- Modal -->   
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <?php
          include 'view/login.php';
          ?>

        </div>

</body>


</html>