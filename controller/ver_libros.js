var app = angular.module('app',[]);
app.controller('controlador', function($scope, $http) {
  $scope.insert = false;


  ////////////////////////////////presentar libros/////////
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

    // $http.get("../modelos/imagenes.php")
    // .then(function (response) {$scope.names = response.data.records;      
    // });
    };
    $scope.new_book = function(usuer){
      $scope.insert= true;
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

    };

    $scope.save_book = function(id_user){
      $scope.user = id_user;
      alert($scope.titulo);

    }

    // $scope.save_book = function(datos){
  //   alert($scope.datos);
  //   $http({
  //     method: 'GET',
  //     url: '../model/guardar_libro.php',
  //     params: {$scope.datos}

  //   })

  // }

   


    $scope.update_book = function(id_libro){
      alert('Hola borrar'+id_libro);
    };

    $scope.delete_book = function(id_libro){
      $scope.id_prueba=id_libro;
      
      if(confirm("Desea eliminar el Libro\n Presione Aceptar")){
        $http({
        method: 'GET', 
        url: '../model/eliminar_libro.php',
        params: {id: $scope.id_prueba}
      })
      .then(function successCallback(datosDependencias)
      {
        
        $scope.datos = datosDependencias.data.records;
        console.log(datosDependencias);
        $scope.ver_libros(1);

      },function errorCallback(datosDependencias)
      {
        console.log("Error, al tratar de traer los datos")
      });         
      }
      

    };




    
});