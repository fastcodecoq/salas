var geo = function(app){
		
	app.controller("geoCtrl",function($scope, $rootScope, $http, geoFactory){	
	   


       $scope.$watch('dpto', function (nuevoValor, viejoValor) {

           if(!nuevoValor) return;
           if (nuevoValor.id_departamento === viejoValor.id_departamento) { return; }

           geoFactory.actMcpios($scope.dpto.id_departamento).success(function(rs){
              
               console.log(rs[0]);
               $scope.mcpios = rs[0]; 
               $scope.mcpio = $scope.mcpios[0];

          }); 

            $rootScope.dpto = $scope.dpto;

        }, true);


        $scope.$watch('mcpio', function (nuevoValor, viejoValor) {

           if(!nuevoValor) return;

           $rootScope.mcpio = $scope.mcpio;


            });


	     geoFactory.get().success( function(rs){


	     	        $scope.dptos = rs[1];
                

	     });


      

    });




   app.factory("geoFactory", function($http){
   
   var factory = {};
   
   factory.get = function(){

        return  $http.get("aplicacion/controladores/controlador_geo.php?listar");
     
     };   


   factory.actMcpios = function(id_dpto){

     return $http.get("aplicacion/controladores/controlador_geo.php?listar&id_dpto=" +  id_dpto);
         
   }

   return factory;

  });


}