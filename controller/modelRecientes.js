
var app = angular.module('app');



app.controller('modeloReciente', function($scope,$http) {

    $http.get("model/recientes_mysql.php")
    .then(function (response) {$scope.names = response.data.records;    	
    });
   
    
});
app.controller('detalle', function($scope, $http) {
 
  $scope.getParameterByName=function(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  };
 


  // $scope.verLibro=function(libro){
    var libro = $scope.getParameterByName('lib');
    // alert(prodId);
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
    // };

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
