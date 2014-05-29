<?php
session_start("salas");
require_once("controlador_bitacora.php");


class controlador_salir{
		
		private $db;

		public function __construct(){}



		public function salir(){

			 if(!isset($_COOKIE["salas"]) && !isset($_SESSION["salas"]) && !isset($_COOKIE["sala"]))
			 	die;

			 $cedula =  explode(":", $_COOKIE["sala"]);
			 $sala = (int) $cedula[0];			 
			 $cedula = (int) $cedula[1];
			 $tiempo = (int) $_COOKIE["tiempo"];
			 $tiempo = time() - $tiempo;

			 setcookie("salas", "", time() - 3600, "/");
			 setcookie("sala", "", time() - 3600, "/");
			 setcookie("tiempo", "", time() - 3600, "/");
			 session_destroy();


			 BITACORA::LOG($cedula, "salió del sistema");
			 BITACORA::LOG($cedula, "tiempo", $tiempo, $sala);

			 echo json_encode(array("estado" => 1, "tiempo" => $tiempo));


		}



}


$app = new controlador_salir;
$app->salir();