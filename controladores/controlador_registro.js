var registro = function(app){
		
	app.controller("registroCtrl",function($scope, $rootScope, $http){	
	 
	     $scope.sexos = [{"id":"1", "nombre":"Hombre"},{"id":"2", "nombre":"Mujer"}];




       $scope.registro = function(){

             var data = {};

             data["sexo"] = $scope.sexo.id;
             data["mcpio"] = $rootScope.mcpio.id_municipio;
             data["apellidos"] = $scope.apellidos;
             data["dpto"] = $rootScope.dpto.id_departamento;   
             data["cedula"] = $scope.cedula;                  
             data["nombres"] = $scope.nombres;
             data["telefono"] = $scope.telefono;
             data["direccion"] = $scope.direccion;
             data["sala"] = $rootScope.sala;
             data["registro"] = "";


             console.log(data);


             jQuery.ajax({ 
                url: "aplicacion/controladores/controlador_registro.php", 
                data : data,
                type : "POST",
                dataType : "JSON",
                success : function(rs){
                     
                      console.log(rs);

                      if(rs.estado > 0)
                        {
                          alert("Usuario registrado exitosamente.");
                          window.location = "#/";
                          window.location = "#/";
                        }
                      else if(rs.estado < 0)
                        alert("El usuario ya existe");
                      else if(rs.estado === 0)
                        alert("error con la base de datos")
                      else{
                          var errores = "";

                          for(x in rs)
                            errores += rs[x] + "\n";

                          alert("Tenemos los siguientes errores: \n" + errores);                    
                        }

             },
             error : function(error){
                
                console.log(error);

             }
           });
           

       }



    });



    new geo(app);

}