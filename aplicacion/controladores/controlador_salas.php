<?php 

require_once("../modelos/modelo_salas.php");


class controlador_salas{
		
		private $modelo;

		public function __construct(){

			$this->modelo = new modelo_salas;

		}


		public function listar(){

			 $data = $this->modelo->listar();
			 echo json_encode($data);

		}

		public function crear(){}
		public function eliminar(){}
		public function modificar(){}

}


if(isset($_GET["listar"]))
   {
   	  $app = new controlador_salas();
   	  $app->listar();
   }