<?php
require_once("../modelos/modelo_estudiantes.php");


class controlador_estudiantes{
		
		private $modelo;

		public function __construct(){

			$this->modelo = new modelo_estudiantes;

		}


		public function listar(){}
		public function crear(){}
		public function eliminar(){}
		public function modificar(){}

}