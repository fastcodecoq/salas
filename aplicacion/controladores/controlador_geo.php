<?php
require_once("../modelos/modelo_geo.php");


class controlador_geo{
		
		private $modelo;

		public function __construct(){

			$this->modelo = new modelo_geo;

		}


		public function listar($args = NULL){

			 $data = $this->modelo->listar($args);
			 
			 echo json_encode($data);

		}

		public function crear(){}
		public function eliminar(){}
		public function modificar(){}

}





if(isset($_GET["listar"]))
   {
   	  $app = new controlador_geo();
   	  $args = array();

   	  if(isset($_GET["id_dpto"]))
   	  	$args["id_dpto"] = (int) $_GET["id_dpto"];

   	  if(isset($_GET["id_mcpio"]))
   	  	$args["id_mcpio"] = (int) $_GET["id_mcpio"];

     if(count($args) > 0)
   	  $app->listar($args);
   	else
   	  $app->listar();

   }