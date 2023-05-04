
app.controller('empleadoCtrl', function($scope, $rootScope,$http) {
    
    $scope.inicio = function(){

    	$scope.numeroempleado = $rootScope.numempleado;	

        $scope.empleado= {
            nombre:'',
            paterno:'',
            materno:'',
            correo:'',
            edad:'',
            usuario:'',
            contrasena:''
    
        }
    	
    }
    
    
   
    $scope.guarda= function(){
         
          try{

            $http({

                url:'api/api.php?funcion=guardausuario',
                method:'POST', 
                contentType: "application/json; charset=utf-8", 
                dataType: "json", 
                data:$scope.empleado

            }).success(function (data){
                alert(data.mensaje);

            


            }).error( function (xhr,status,data){

             

            });

        }catch(err){

            alert(err);
        }

    }



});
