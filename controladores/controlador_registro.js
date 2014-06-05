var registro = function(app){
		
	app.controller("registroCtrl",function($scope, $http){	
	 
	     $scope.sexos = [{"id":1, "nombre":"Hombre"},{"id":2, "nombre":"Mujer"}];




       $scope.registro = function($scope){

             var data = $("form.form-signin").serializeObject();

             data["registro"] = "";


             console.log(data);


             $.ajax({ 
                url: "aplicacion/controladores/controlador_registro.php", 
                data : data,
                type : "POST",
                dataType : "JSON"
                })
             .done(function(rs){
                     
                      console.log(rs);

                      if(rs.estado > 0)                      
                         { 
                          alert("Usuario registrado exitosamente.");                        
                          window.location = "#/";
                          }
                      else if(rs.estado < 0)
                          alert("El usuario ya se encuentra registrado.");
                      else if(rs.estado === 0)
                          alert("error con la base de datos")
                      else{
                          var errores = "";

                          for(x in rs)
                            errores += rs[x] + "\n";

                          alert("Tenemos los siguientes errores: \n" + errores);                    
                        }

              })
             .fail(function(err){ /*console.log(err);solo descomentar para modo desarrollo */ });

           

       }



    });



    new geo(app);

}