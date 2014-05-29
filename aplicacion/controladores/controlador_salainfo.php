<?php

require_once("../modelos/conectar.php");
require_once("controlador_bitacora.php");


function infosala(){

	if(!isset($_COOKIE["sala"]))
		die;

	$db = conectar();
	$cedula = explode(":", $_COOKIE["sala"]);
	$sala = $cedula[0];
	$cedula = $cedula[1];

	$query = "SELECT * FROM estudiantes WHERE cedula = {$cedula} LIMIT 1";	

	$rs = $db->query($query);

	if($rs)
	{ 

		$usuario = $rs->fetch_assoc();

		$query = "SELECT * FROM salas WHERE id = {$sala} LIMIT 1";
		$rs = $db->query($query);

		$usuario["sala"] = $rs->fetch_assoc();

		BITACORA::LOG($cedula, "observó su pagina principal de sala");

		echo json_encode($usuario);


	}



}




infosala();