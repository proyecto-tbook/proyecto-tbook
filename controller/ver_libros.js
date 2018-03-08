var app = angular.module('app');
app.controller('controlador', function($scope, $http) {
<<<<<<< HEAD
  
  
      $http({
        method: 'GET',
        url: '../model/datos.php'
      }).then(function successCallback(categorias){
        //alert('obtener valor');
        $scope.cat = categorias.data.datos_categoria;
        console.log(categorias);

      },function errorCallback(categorias){
        console.log("Error, al tratar de traer los datos")
      }); 
     


  $scope.save_book = function(){
    // alert($scope.datos);
    // $http({
    //   method: 'GET',
    //   url: '../model/guardar_libro.php',
    //   params: {$scope.datos}

    // })
    alert('Hi save');

  };

  $scope.update_book=function(){
    alert('Hola');
  }

  
=======
>>>>>>> parent of f961631... archivos
  $scope.ver_libros=function(user){
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
<<<<<<< HEAD
    }
    
    $scope.delet_book= function(id_libro){
      $scope.id_libro = id_libro;

    }
=======

    // $http.get("../modelos/imagenes.php")
    // .then(function (response) {$scope.names = response.data.records;      
    // });
    };
    
>>>>>>> parent of f961631... archivos
});