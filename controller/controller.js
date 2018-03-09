var app = angular.module('app', ['ngRoute','ngResource']);


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
		

	

	$scope.cancel= function(){
		$window.location.href='user.php';
	}

});

app.controller('crtlBusqueda', function($scope, $http){
	$scope.categorias = [
	{ id : "1", nombre : "Terror" },
	{ id : "2", nombre : "Literatura" },
	{ id : "3", nombre : "Filosofia" },
	{ id : "4", nombre : "Novela" }
	];
	


});
app.controller('myCtrl', function($scope) {
    $scope.cars = [
        {model : "Ford Mustang", color : "red"},
        {model : "Fiat 500", color : "white"},
        {model : "Volvo XC90", color : "black"}
    ];
});