<?php
session_start("salas");
require_once("../modelos/conectar.php");
require_once("controlador_bitacora.php");


class controlador_login{
		
		private $db;

		public function __construct(){

			$this->db = conectar();

		}



		public function login(){

			 if(isset($_COOKIE["salas"]) && isset($_SESSION["salas"]))
			 	die;

			 $errores = array();

			 if(!isset($_POST["cedula"]) || empty($_POST["cedula"]))
			  $errores[] = "Ingrese su cedula";

			 if(!isset($_POST["id_sala"]) || empty($_POST["id_sala"]))
			  $errores[] = "Seleccione una sala";

			if(count($errores) > 0)
			{
				 echo json_encode($errores);
				 die;
			}

			$cedula = addslashes(htmlspecialchars(strip_tags($_POST["cedula"])));
			$id_sala = addslashes(htmlspecialchars(strip_tags($_POST["id_sala"])));

			$cliente = htmlspecialchars(strip_tags($_POST["cliente"]));


			$query = "SELECT * FROM `sala_estudiante`";


			$rs = $this->db->query($query);

			while($row = $rs->fetch_assoc())
				 if($row["id_sala"] === $id_sala AND $row["cedula"] === $cedula)
				 	 {	
				 	 	 $token = md5($cedula . microtime() . $_SERVER["REMOTE_ADDR"] . $cliente);
				 	 	 setcookie("salas", $token, time() + (3600 * 24 * 5) , "/");
				 	 	 setcookie("tiempo", time(), time() + (3600 * 24 * 5) , "/");
				 	 	 setcookie("sala", $id_sala. ":" .$cedula, time() + (3600 * 24 * 5) , "/");
				 	 	 $_SESSION["salas"] = $token;

				 	 	 BITACORA::LOG( (int) $cedula, "ingresó al sistema");


				 	 	 echo json_encode(array("estado" => 1));
				 	 	 die;
				 	 }


		 	 echo json_encode(array("estado" => 0));



		}




}



$app = new controlador_login;

$app->login();