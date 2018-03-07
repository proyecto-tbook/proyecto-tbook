var app = angular.module('app');
app.controller('controlador', function($scope, $http) {

   

  $scope.ver_libros=function(user){

    $http.post('../model/datos.php').then(function (vehiculo) {
        $scope.categoria = categoria.data.cat;
    });
    
   $scope.id_user = user;
    console.log($scope.id_user);
    $http({
        method: 'GET',
        url: '../model/imagenes.php',
        params: {id: user}
      })
      .then(function successCallback(datosDependencias)
      {
        $scope.names = datosDependencias.data.records;
        console.log(datosDependencias);

      },function errorCallback(datosDependencias)
      {
        console.log("Error, al tratar de traer los datos")
      }); 

    // $http.get("../modelos/imagenes.php")
    // .then(function (response) {$scope.names = response.data.records;      
    // });
    };
    
});