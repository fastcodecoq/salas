var salas = function(app){

  console.log("salasCtrl");
		

	app.controller("salasCtrl",function($scope, $rootScope, salasFactory){	
	 
	     salasFactory.get().success( function(rs){

	     	   $scope.salas = rs;

	     });


       $scope.$watch("sala", function(nuevo){

          if(!nuevo) return;

          console.log($scope.sala);

          $rootScope.sala = $scope.sala;

       });

    });



   app.factory("salasFactory", function($http){
   
   var factory = {};
   
   factory.get = function(){

        return $http.get("aplicacion/controladores/controlador_salas.php?listar");
     
     };   

   return factory;

  });


}