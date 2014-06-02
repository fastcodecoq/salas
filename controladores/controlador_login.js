var login = function(app){

    console.log("loginCtrl");
    console.log(app);


		
	app.controller("loginCtrl",function($scope, $rootScope ){	



       $scope.login = function(){

          data = {};
          data["cedula"] = $scope.cedula;
          data["id_sala"] = $rootScope.sala; 
          data["cliente"] = navigator.userAgent + navigator.vendor + navigator.platform + navigator.language;
     

           jQuery.ajax({
             url : "aplicacion/controladores/controlador_login.php", 
             data : data,
             type : "POST",
             dataType : "JSON",
             success : function(rs){
              
              console.log(rs);

                 if(rs.estado === 1)                
                     window.location = "#/sala";
                    else
                      alert("El usuario ingresado no es correcto, o no hace parte de la sala seleccionada.");
             },
             error : function(error){
               console.log(error);
             }
           });

           return false;

       }


    });




    new salas(app);
   


}