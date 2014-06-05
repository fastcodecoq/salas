var login = function(app){

    console.log("loginCtrl");
    console.log(app);


		
	app.controller("loginCtrl",function($scope){	



       $scope.login = function(){

          var data = $("form.form-signin").serializeObject();     
     
          data["cliente"] = navigator.userAgent + navigator.vendor + navigator.platform + navigator.language;
     

           $.ajax({
             url : "aplicacion/controladores/controlador_login.php", 
             data : data,
             type : "POST",
             dataType : "JSON",                          
           })
           .done(function(rs){
              
              console.log(rs);

                 if(rs.estado === 1)                
                     window.location = "sala";
                    else
                      alert("El usuario ingresado no es correcto, o no hace parte de la sala seleccionada.");
             })
           .fail(function(err){ /*console.log(err);solo descomentar para modo desarrollo */ });

           return false;

       }


    });




    new salas(app);
   


}