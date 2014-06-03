var salas = function(app){

  console.log("salasCtrl");
		

	app.controller("salasCtrl",function($scope, salasFactory){	
	 
	     salasFactory.get().success( function(rs){

	     	   $scope.salas = rs;

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