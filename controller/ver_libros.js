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


////////////////////Presentar categorias/////////////
    $scope.new_book = function(usuer){
      $scope.insert= true;
        $http({
          method: 'GET',
          url: '../model/datos.php'
        })
        .then(function successCallback(categorias)
        {
          
          $scope.cat = categorias.data.datos_categoria;
          console.log(categorias);
          alert('categorias');

        },function errorCallback(categorias)
        {
          console.log("Error, al tratar de traer los datos")
        }); 

    };
//////////////////////////Guardar Libro/////////////////
    $scope.save_book = function(user,datos){
      $scope.datos=datos;
      $scope.user=user;

     if (confirm("Esta seguro de guardar el libro")) {
      $http({
          method: 'GET',
          url: '../model/guardar_libro.php',
          params: {titulo : $scope.datos.titulo,
            autor : $scope.datos.autor,
            f_publicacion : $scope.datos.f_publicacion,
            descripcion : $scope.datos.descripcion,
            foto : $scope.datos.foto,
            categoria : $scope.datos.cate,
            id_user : $scope.user}
       
        })
        .then(function successCallback(categorias)
        {
          alert('Se guardo con exito');
          $scope.insert= false;
          $scope.ver_libros(1);
          
        },function errorCallback(categorias)
        {
          console.log("Error, al tratar de traer los datos")
        }); 

      }
      

    };

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