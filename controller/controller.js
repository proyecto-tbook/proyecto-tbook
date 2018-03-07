app.controller('ctrlUsuario', function($scope, $http, $location, $window){

	$scope.show_edit=function (us){
		//alert(us);
		
		$scope.dat=us;
		$http({
        method: 'GET',
        url: '../controller/edit_us.php',
        params: {id: $scope.dat}

      })
      .then(function successCallback(datosDependencias)
      {

        $scope.names = datosDependencias.data.records;
        //$window.location.href='edit_user.html';
        console.log(datosDependencias);
        $window.location.href='edit_user.html';
       // $location.path('edit_user.html');

      },function errorCallback(datosDependencias)
      {
      	//alert(datosDependencias);
        console.log("Error, al tratar de traer los datos")
      }); 
	

	}
	$scope.save= function (){
		$scope.date=false;
		$scope.usuario=user;
	}

});
