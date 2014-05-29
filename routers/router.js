var router = function(app){
	
	 app.config(function($routeProvider){

	 	  var $router = $routeProvider;



	 	  $router
	 	  .when("/registro", { templateUrl : "vistas/registro.html" })	 	  
	 	  .when("/sala", { templateUrl : "vistas/sala.html" })	 	  
	 	  .when("/", { templateUrl : "vistas/login.html" , controller : "loginCtrl"});	 	  

	 });


}