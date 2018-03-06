
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form role="form" name="login" action="\tbookv3/controller/autenticacion.php" method="post">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Autenticacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body">            
                <div class="form-group">
                    <label for="username">Nombre de usuario o email</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" ng-model="user">
                </div>
                <div class="form-group">
                    <label for="password">Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <a href="#" class="btn">Recuperar Clave</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" >Acceder</button>
            </div>
        </form>
    </div>
</div>
<!-- <script src="../assets/js/valida_login.js"></script>
<script src="../assets/js/angular.min.js"></script>
<script src="../assets/angular/angular-resource.min.js"></script>   
<script src="../assets/js/angular-route.min.js"></script>  
<script  src="../controller/app.js"></script>
<script  src="../controller/controller.js"></script> -->
