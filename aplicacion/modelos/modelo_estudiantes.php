<?php

require_once("conectar.php");
require_once("cerrar_conexion.php");

class modelo_estudiantes{
	
	 
	 private $db;		


	 public function __construct(){

	 	$this->db = conectar();


	 }


	 public function crear($datos = NULL){

	 	if($datos === NULL)
	 		die;

	 	 $query = "SELECT id FROM `estudiantes` WHERE cedula = {$datos["cedula"]} LIMIT 1";
	 	 $rs = $this->db->query($query);
	 	 $rs = $rs->fetch_assoc();


	 	 if(isset($rs["id"]))
	 	 	 return -1;
	 	 


	 	 $query = "INSERT INTO `estudiantes` (cedula, nombres, apellidos, id_municipio, id_departamento, direccion, telefono, sexo)  
	 	           VALUES 
	 	           ( {$datos["cedula"]} ,
	 	           	'{$datos['nombres']}' ,
	 	           	'{$datos['apellidos']}' , 
	 	           	{$datos['mcpio']} , 
	 	           	{$datos['dpto']} , 
	 	           	'{$datos['direccion']}', 
	 	           	'{$datos['telefono']}' , 
	 	           	{$datos['sexo']}
	 	           	)";	

	 
	 	 $rs = $this->db->query($query) or die($this->db->error);

	 	 if($rs){
	 	 $query = "INSERT INTO `sala_estudiante` (id_sala, cedula) VALUES ( {$datos["sala"]} , {$datos["cedula"]})";
	 	 $rs = $this->db->query($query) or die($this->db->error);

	 	 return $rs;
	 	 }

	 	 return $rs;

	 }

	 public function eliminar($cedula = 11103094999){

	 	 $query = "DELETE FROM `estudiantes` WHERE `cedula` = {$cedula} LIMIT 1";	 	 

	 	 $rs = $this->db->query($query);

	 	 $rows = $rs->affected_rows;
	 	 $rs->close();	 	 
	 	 cerrar_conexion();
	 	 
	 	 if($rows > 0)
	 	 	return true;
	 	 else
	 	 	return false;


	 }

	 public function modificar( $set ){


	 	 $query = "UPDATE `estudiantes` SET {$set} WHERE `cedula` = {{cedula}} LIMIT 1";	 	 

	 	 $rs = $this->db->query($query);

	 	 $rows = $rs->affected_rows;
	 	 $rs->close();	 	 
	 	 cerrar_conexion();
	 	 
	 	 if($rows > 0)
	 	 	return true;
	 	 else
	 	 	return false;

	 }


 }


 new modelo_estudiantes;