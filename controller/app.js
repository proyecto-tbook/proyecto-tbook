var app = angular.module('app', ['ngRoute','ngResource']);

app.config(function($routeProvider/*$locationProvider*/){
	
	$routeProvider 
		//.when('/', { //es para pagina principal 
		//	templateUrl: '',//el archivo que quieren que se cargue
			//controller://y que controlador se va a utilizar.... tambien se puede omitir si no se utiliza controlador
		//})
		.when('/perfil',{
			templateUrl: '../view/presentar_libro.html',
			controller: 'controlador'
		});
		
		.when('/verLibro',{
			templateUrl: 'view/detalleLibro.html',
			controller: 'myApp'
		})
		
		
		//$locationProvider.html5Mode(true);
});					