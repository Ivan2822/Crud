app.controller('homeCtrl', function($scope, $rootScope,$http) {
    
    $scope.inicio = function(){

    	$scope.numeroempleado = $rootScope.numempleado;	
	
    }

	$http({url:'api/api.php?funcion=usuarios', 
	contentType: 'application/json', 
	dataType: "json", 
	}).success(function (res){
	$scope.listadoPC=res;
	  console.log(res)
	
	});


	$scope.detalle = function(clave) {
		var id = clave
		 $location.path('editaempleado/'+id);
  	}	

 
	

   
});


