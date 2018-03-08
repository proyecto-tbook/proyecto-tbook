
var app = angular.module('app',[]);



app.controller('modeloReciente', function($scope,$http) {

    $http.get("model/recientes_mysql.php")
    .then(function (response) {$scope.names = response.data.records;    	
    });
   
    
});

// Critihian
app.controller('cargarLibros', function($scope, $http) {    
    $scope.load = function (categoria) {                
        $http.get("../model/loadbooks.php?categoria="+categoria)
            .then(function (response) {     
            $scope.names = response.data.records;
            console.log(response);
            });
    }
});
// fin Cristhian
app.controller('Ctrl_Libros_Categorias', function($scope, $http) {
    $http.get("../model/libros_categorias_mysql.php")
    .then(function (response) {$scope.librosCategorias = response.data.records;        
    });
});

app.directive("mensajeEnvio", function(){
   return {
       template:'<div class="alert alert-success alert-dismissible fade show" role="alert" style="display: block; clear: left;">'
            +'<strong>EXITO!</strong> Tu peticion ha sido enviada exitosamente.'
            +'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
             + '<span aria-hidden="true">&times;</span>'
            +'</button>'
          +'</div>'
   };
});
app.controller('Ctrl_Solicitar_Libro', function($scope, $http) {      
    $scope.solicitarLibro=function(persona_logueo)    {       
        var emailPropietario=$scope.detallelibro[0].emailPropietario;
        var titulo=$scope.detallelibro[0].titulo;
        $http({
          method: 'GET',
          url: '../model/enviar_correo_peticion.php',
          params: {email: emailPropietario,
                  user_logged: persona_logueo,
                  title: titulo}
        })
        .then(function successCallback()
        {          
          alert("SU PETICION HA SIDO ENVIADA SATISFACTORIAMENTE.");
        });
      };           
      
});

app.controller('detalle', function($scope, $http) {
 
  $scope.getParameterByName=function(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  };

  var libro = $scope.getParameterByName('lib');
    
  $scope.Cargar=function(){
    $http({
        method: 'GET',
        url: '../model/verLibro.php',
        params: {id: libro}
      })
      .then(function successCallback(datosDependencias)
      {
        $scope.detallelibro = datosDependencias.data.records;
        $scope.comentlib = datosDependencias.data.records2;
        console.log(datosDependencias);

      },function errorCallback(datosDependencias)
      {
        console.log("Error, al tratar de traer los datos")
      }); 
    };

  $scope.Cargar();

  $scope.Comentar=function(usuario){
    if($scope.comentario==null){
      alert("ERROR: No puede ingresar un comentario vacío!");
    }else{
      $scope.user=usuario;
      $http({
          method: 'GET',
          url: '../model/Comentar.php',
          params: {com: $scope.comentario,usu:$scope.user,lib:libro}
        })
        .then(function successCallback(datosDependencias)
        {
          $scope.Cargar();
          $scope.comentario="";
          $scope.datos = datosDependencias.data.records;
          console.log(datosDependencias);

        },function errorCallback(datosDependencias)
        {
          console.log("Error, al tratar de traer los datos")
        }); 
    
        
        
     }
  };

  $scope.Eliminar=function(idComent){
    $http({
        method: 'GET',
        url: '../model/eliminar_comentario.php',
        params: {id: idComent}
      })
      .then(function successCallback(datosDependencias)
      {
        $scope.Cargar();
        $scope.datos = datosDependencias.data.records;
        console.log(datosDependencias);

      },function errorCallback(datosDependencias)
      {
        console.log("Error, al tratar de traer los datos")
      }); 
    };

});


//Función para limitar el numero de carateres de una palabra
angular.module('app').filter('cut', function () {
        return function (value, wordwise, max, tail) {
            if (!value) return '';

            max = parseInt(max, 10);
            if (!max) return value;
            if (value.length <= max) return value;

            value = value.substr(0, max);
            if (wordwise) {
                var lastspace = value.lastIndexOf(' ');
                if (lastspace !== -1) {
                  //Also remove . and , so its gives a cleaner result.
                  if (value.charAt(lastspace-1) === '.' || value.charAt(lastspace-1) === ',') {
                    lastspace = lastspace - 1;
                  }
                  value = value.substr(0, lastspace);
                }
            }

            return value + (tail || ' …');
        };
    });
app.controller('controladorRegistro',function($scope){
    $scope.mensajeError=""; 
    $scope.validarPassword=function(password1,password2)    {       
        if(password1!=password2)
            $scope.mensajeError="Error, las contraseñas no coinciden";
        else
            $scope.mensajeError="";
    };  
});
//Controlador para ver los detalles de un libro especifico, implementado en el index
