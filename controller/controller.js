var app = angular.module('app', []);


app.controller('ctrlUsuario', function($scope, $http, $location, $window){

  
  $scope.getParameterByName=function(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  };

    var usuario = $scope.getParameterByName('us');
  


  $scope.Cargar=function(){
      
     $http({
        method: 'GET',
        url: '../controller/edit_us.php',
        params: {id: usuario}

      })
      .then(function successCallback(datosDependencias)
      {
        $scope.names = datosDependencias.data.records;
        console.log(datosDependencias);

      },function errorCallback(datosDependencias)
      {
      

        console.log("Error, al tratar de traer los datos")
      }); 
   
    };

  $scope.Cargar();

    $scope.edit= function (user){
      $scope.user=user;
    if(confirm("esta seguro de guardar")){
       
       $http({
        method: 'GET',
        url: '../model/editUser.php',
        params: {usuario:$scope.user.nombre, 
          apellido:$scope.user.apellido, 
          correo:$scope.user.correo}
       })
      .then(function successCallback(datosDependencias)
          {
            
            $scope.names = datosDependencias.data.records;
            console.log(datosDependencias);

        },function errorCallback(datosDependencias)
          {
            
            console.log("Error, al tratar de traer los datos")
          });

            $window.location.href='user.php';
    }
  };
    

  

  
  $scope.getParameterByName=function(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  };

    var usuario = $scope.getParameterByName('us');
  


  $scope.Cargar=function(){
      
     $http({
        method: 'GET',
        url: '../controller/edit_us.php',
        params: {id: usuario}

      })
      .then(function successCallback(datosDependencias)
      {
        $scope.names = datosDependencias.data.records;
        console.log(datosDependencias);

      },function errorCallback(datosDependencias)
      {
    
        console.log("Error, al tratar de traer los datos")
      }); 
   
    };

  $scope.Cargar();

    $scope.edit= function (user){
      
      $scope.user=user;
    //  $scope.iinput = document.getElementById('inputFileServer');
    //if($scope.iinput.files && $scope.iinput.files[0])
      // console.log("File Seleccionado : ", $scope.iinput.files[0]);
      //if(typeof($scope.iinput.files[0])=='undefined')
    //{
    //  $scope.iinput.files=$scope.img;
      
    //}
    
    if(confirm("esta seguro de guardar")){
       $http({
        method: 'GET',
        url: '../model/editUser.php',
        params: {usuario: $scope.user.nombre, 
          apellido: $scope.user.apellido, 
          correo: $scope.user.correo}
          /*imagen:$scope.iinput.files[0].name*/
       })
      .then(function successCallback(datosDependencias)
          {
            
            $scope.names = datosDependencias.data.records;
            console.log(datosDependencias);

        },function errorCallback(datosDependencias)
          {
            console.log(datosDependencias);
            console.log("Error, al tratar de traer los datos")
          });

            $window.location.href='user.php';
    }
  };
    

  //nsnns


  $scope.cancel= function(){
    $window.location.href='user.php';
  }

});

app.controller('crtlBusqueda', ['$scope','$http', function($scope, $http){
  $scope.ban=false;
  $scope.cate = [
  { id : "1", nombre : "Poesia" },
  { id : "2", nombre : "Filosofia" },
  { id : "3", nombre : "Novelas" },
  { id : "4", nombre : "Literatura" }
  ];

  $scope.buscar=function(){


    
    $scope.libro="f";
    //alert($scope.libro.categoria);
    if(typeof($scope.nombre)=='undefined')
    {
      $scope.nombre="n";
      
    }
    if(typeof($scope.autor)==='undefined')
    {
      $scope.autor="n";
    }
    if(typeof($scope.categoria)==='undefined')
    {
      $scope.categoria="null";
    } 
    
    $http({
      method: 'GET',
      url: '../model/busqulibro.php',
      params: {nombre: $scope.nombre,
          autor: $scope.autor,
          categoria: $scope.categoria}
    })
    .then(function successCallback(datosDependencias)
    {
      $scope.nombre="";
      $scope.autor="";
      $scope.categoria="";
      $scope.librosrec= datosDependencias.data.records;
      console.log(datosDependencias);

      $scope.ban=true;


    },function errorCallback(datosDependencias)
    {
      console.log(datosDependencias);
    });

  };