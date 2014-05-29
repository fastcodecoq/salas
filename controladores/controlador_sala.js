var sala = function(app){

  console.log("salaCtrl");
		
   
	app.controller("salaCtrl",function($scope, $rootScope, $http, salaFactory){	
	   




	     salaFactory.auth().success( function(rs){

	     	   if(rs.estado != 1)
            window.location = "#/";

	     });



       salaFactory.infoSala().success(function(rs){
            
            if(rs)
             $scope.usuario = rs;            

         });


         $scope.salir = function(){

            $http.get("aplicacion/controladores/controlador_salir.php").success(function(rs){

                if(!rs)return;

                 if(rs.estado === 1)
                   window.location = "#/";


            });

          }


    });



   app.factory("salaFactory", function($http){
   
   var factory = {};
   
   factory.auth = function(){

        return $http.get("aplicacion/controladores/controlador_validar_sesion.php");
     
     };   


   factory.infoSala = function(){

      return $http.get("aplicacion/controladores/controlador_salainfo.php");

   }

   return factory;

  });


}