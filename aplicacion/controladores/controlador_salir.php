<?php
session_start("salas");
require_once("controlador_bitacora.php");


class controlador_salir{
		
		private $db;

		public function __construct(){}



		public function salir(){

			 if(!isset($_COOKIE["salas"]) && !isset($_SESSION["salas"]) && !isset($_SESSION["sala"]))
			 	die;


			 $cedula = (int) explode(":", $_COOKIE["sala"])[1];


			 setcookie("salas", "", time() - 3600, "/");
			 setcookie("sala", "", time() - 3600, "/");
			 session_destroy();



			 BITACORA::LOG($cedula, "salió del sistema");

			 echo json_encode(array("estado" => 1));


		}



}


$app = new controlador_salir;
$app->salir();