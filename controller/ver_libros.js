var app = angular.module('app');
app.controller('controlador', function($scope, $http) {
  $scope.datos=listado.get();
  $scope.ordenar = function(opcion){
    $scope.filtro = opcion;
  };  
  
$http({
        method: 'GET',
        url: '../model/datos.php'
      })
      .then(function successCallback(categorias)
      {
        alert('obtener valor');
        $scope.cat = categorias.data.datos_categoria;
        console.log(categorias);

      },function errorCallback(categorias)
      {
        console.log("Error, al tratar de traer los datos")
      }); 
     


  $scope.save_book = function(datos){
    alert($scope.datos);
    $http({
      method: 'GET',
      url: '../model/guardar_libro.php',
      params: {$scope.datos}

    });
    //.then(function successCallback(resultado){
    //   $scope.result = resultado.data.result;
    //   alert('Se ingreso con exit');
    // },function errorCallback(resultado){
    //   alert('No se pudo realizar el ingreso');
    // });

  };

  $scope.update_book=function(){
    alert('Hola');
  }

  
  $scope.ver_libros=function(user){
   $scope.id_user = user;
    console.log($scope.id_user);
    $http({
        method: 'GET',
        url: '../model/imagenes.php',
        params: {id: user}
      }).then(function successCallback(datosDependencias)
      {
        $scope.names = datosDependencias.data.records;
        console.log(datosDependencias);

      },function errorCallback(datosDependencias)
      {
        console.log("Error, al tratar de traer los datos")
      }); 
    };

    
    $scope.delet_book= function(libro){
      $scope.id_libro = libro;
      $http({
        method: 'GET',
        url: '../model/delet_book.php',
        params: {id: id_libro}
      }).then(function successCallback(datosDependencias)
      {
        $scope.names = datosDependencias.data.records;
        console.log(datosDependencias);

      },function errorCallback(datosDependencias)
      {
        console.log("Error, al tratar de traer los datos")
      }); 

    };
});