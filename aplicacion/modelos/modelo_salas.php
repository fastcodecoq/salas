<?php

require_once("conectar.php");
require_once("cerrar_conexion.php");

class modelo_salas{
	
	 
	 private $db;		


	 public function __construct(){

	 	$this->db = conectar();


	 }


	 public function listar($args = NULL){


	 	 $query = ($args != NULL) ? "SELECT * FROM `salas` {$args}" : "SELECT * FROM `salas`" ;	 	 

	 	 $rs = $this->db->query($query);
	 	 $rss = array();
	 	 while($fila = $rs->fetch_array(MYSQLI_ASSOC)) {
	 	 	
	 	    foreach ($fila as $key => $value)
         	  $fila[$key] = utf8_encode($value);

            $rss[]=$fila;
           }

	 	 $rs->close();	 	 
	 	 cerrar_conexion($this->db);


	 	 return $rss;
	 	 

	 }


	 public function crear($datos){

	 	 $query = "INSERT INTO `salas` (cedula, nombres, apellidos, id_municipio, id_departamento, direccion, telefono, sexo)  
	 	           VALUES 
	 	           ( {$datos["cedula"]} ,
	 	           	'{$datos['nombres']}' ,
	 	           	'{$datos['apellidos']}' , 
	 	           	{$datos['id_municipio']} , 
	 	           	{$datos['id_departamento']} , 
	 	           	'{$datos['direccion']}', 
	 	           	'{$datos['telefono']}' , 
	 	           	{$datos['sexo']} )";	 	 

	 	 $rs = $this->db->query($query);

	 	 $rows = $this->db->affected_rows;	 	 
	 	 $rs->close();	 	 
	 	 cerrar_conexion();
	 	 
	 	 if($rows > 0)
	 	 	return true;
	 	 else
	 	 	return false;

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

