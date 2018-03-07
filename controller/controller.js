app.controller('ctrlUsuario', function($scope, $http, $location, $window){

	
	scope.getParameterByName=function(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  };

  var libro = $scope.getParameterByName('lib');
  alert(libro);
  $scope.save= function (){
		$scope.date=false;
		$scope.usuario=user;
	}

});