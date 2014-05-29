<?php
require_once("../modelos/modelo_estudiantes.php");
require_once("controlador_bitacora.php");


class controlador_registro{
		
		private $modelo;

		public function __construct(){

			$this->modelo = new modelo_estudiantes;

		}


		public function registrar(){

			 $errores = array();

			 if(!isset($_POST["nombres"]) || empty($_POST["nombres"]))
			  $errores[] = "Ingrese sus nombres";

			  if(!isset($_POST["apellidos"]) || empty($_POST["apellidos"]))
			  $errores[] = "Ingrese sus apellidos";

			if(!isset($_POST["cedula"]) || empty($_POST["cedula"]))
			  $errores[] = "Ingrese su cedula";

			if(!isset($_POST["direccion"]) || empty($_POST["direccion"]))
			  $errores[] = "Ingrese su direccion";

			if(!isset($_POST["telefono"]) || empty($_POST["telefono"]))
			  $errores[] = "Ingrese su telefono";

			if(!isset($_POST["dpto"]) || empty($_POST["dpto"]))
			  $errores[] = "Seleccione un departamento";

			if(!isset($_POST["mcpio"]) || empty($_POST["mcpio"]))
			  $errores[] = "Seleccione una ciudad";

			if(!isset($_POST["sexo"]) || empty($_POST["sexo"]))
			  $errores[] = "Seleccione un sexo";

			if(!isset($_POST["sala"]) || empty($_POST["sala"]))
			  $errores[] = "Seleccione una sala";


			if(count($errores) > 0 ){

				 echo json_encode($errores);				 
				 die;
			}

			foreach ($_POST as $key => $value) 
				if(!is_numeric($_POST[$key]))
				 $_POST[$key] = addslashes(htmlspecialchars(strip_tags($value)));
			

			$rs = $this->modelo->crear($_POST);

			if($rs === -1)
			    echo json_encode(array("estado" => -1));							
			else if($rs)			
				echo json_encode(array("estado" => 1));							
			else
				echo json_encode(array("estado" => 0));

		}


}



if(isset($_POST["registro"])){
		
	$app = new controlador_registro;
	$app->registrar();

}