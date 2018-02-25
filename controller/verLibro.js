var app = angular.module('app');
app.controller('controlador', function($scope, $http) {
  $scope.detalleLibro=function(libro){
   $scope.id_user = libro;
    $http({
        method: 'GET',
        url: '../model/verLibro.php',
        params: {id: libro}
      })
      .then(function successCallback(datosDependencias)
      {
        $scope.libro = datosDependencias.data.records;
        console.log(datosDependencias);

      },function errorCallback(datosDependencias)
      {
        console.log("Error, al tratar de traer los datos")
      }); 
    };
    
});