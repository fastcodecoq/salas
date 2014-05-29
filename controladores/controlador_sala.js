var sala = function(app){

  console.log("salaCtrl");
		
   
	app.controller("salaCtrl",function($scope, $rootScope, $http, salaFactory){	
	   


       salaFactory.infoSala().success(function(rs){

            
            if(rs.nombres)
             $scope.usuario = rs; 
            else
             $scope.salir; 
                  

         });


         $scope.salir = function(){

            $http.get("aplicacion/controladores/controlador_salir.php").success(function(rs){

                if(!rs)return;

                rs.tiempo = parseInt(rs.tiempo);

                if(rs.tiempo < 60)
                 alert("Tiempo de sesión: " + numeral(rs.tiempo).format("0,00") + " segs.");
                else if(rs.tiempo > 60 && rs.tiempo < 3600)
                 alert("Tiempo de sesión: " + numeral(rs.tiempo/60).format("0,00") + " mins.");
               else
                 alert("Tiempo de sesión: " + numeral(rs.tiempo/3600).format("0,00") + " hrs.");


                 if(rs.estado === 1)
                   window.location = "#/";


            });

          }


    });



   app.factory("salaFactory", function($http){
   
   var factory = {};
    


   factory.infoSala = function(){

      return $http.get("aplicacion/controladores/controlador_salainfo.php");

   }

   return factory;

  });


}