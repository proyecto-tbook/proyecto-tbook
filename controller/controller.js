app.controller('ctrlUsuario', function($scope, $http, $location){
	
	
	//$scope.getUsuario=function(){
		//$scope.nombUser=$scope.user;
		//alert($scope.nombUser);
		$http.post('../modelos/usuario.php').then(function (result){
      
        $scope.usuarios = result.data.perfil;
        console.log(result);
        	
     //   window.location='../view/usuario.html';
       // $location.path('../view/usuario.html');
       
	});

	//}
});

