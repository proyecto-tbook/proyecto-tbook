var app = angular.module('app');
app.controller('controlador', function($scope, $http) {
$scope.show_edit=function (us){
   
    
    $scope.dat=us;
    alert($scope.dat);
    $http({
        method: 'GET',
        url: 'edit_us.php',
        params: {id: $scope.dat}

      })
      .then(function successCallback(datosDependencias)
      {

        $scope.names = datosDependencias.data.records;
        //$window.location.href='edit_user.html';
        console.log(datosDependencias);
      //  $window.location.href='edit_user.html';
       // $location.path('edit_user.html');

      },function errorCallback(datosDependencias)
      {
       
        console.log("Error, al tratar de traer los datos")
      }); 
  

  }
   

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