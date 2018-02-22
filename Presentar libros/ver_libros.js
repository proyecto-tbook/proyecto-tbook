var app = angular.module('app', ['ngResource']);

app.controller('controlador', function($scope, $http) {
    $http.get("../model/imagenes.php")
    .then(function (response) {
    	$scope.datos = response.data.records;
    	$scope.ordenar = function(opcion){
		$scope.filtro = opcion;
	};	
    	
    });
});
