<?php

require_once("conectar.php");
require_once("cerrar_conexion.php");

class modelo_geo{
	
	 
	 private $db;		


	 public function __construct(){

	 	$this->db = conectar();


	 }


	 public function listar($args){


	 	 $query = "SELECT * FROM `municipios`";	 	 

	 	 $filters = array();


	 	 if(isset($args["id_mcpio"])) $filters[] = "id_municipio = {$args['id_mcpio']}";	 	
	 	 if(isset($args["id_dpto"])) $filters[] = "id_departamento = {$args['id_dpto']}";	 	

	 	 if(count($filters)){
	 	 	  
	 	 	 $query .= " WHERE " . implode(" AND ", $filters);

	 	 }


	     $query .= " ORDER BY nombre ASC";


	 	 $rs = $this->db->query($query);
	 	 $rss = array();
	 	 while($fila = $rs->fetch_array(MYSQLI_ASSOC)) {
         	
         	foreach ($fila as $key => $value)
         	  $fila[$key] = utf8_encode($value);

            $rss[]=$fila;
           }



         $geo = array();
         $geo[] = $rss;

         $rs->close();

         $query = (isset($args["id_dpto"])) ? "SELECT * FROM `departamentos` WHERE id_departamento = {$args['id_dpto']}" :"SELECT * FROM `departamentos`" ;	 	 
         $query .= " ORDER BY nombre ASC";

	 	 $rs = $this->db->query($query);
	 	 $rss = array();
	 	 while($fila = $rs->fetch_array(MYSQLI_ASSOC)) {

	 	 	 foreach ($fila as $key => $value)
         	  $fila[$key] = utf8_encode($value);

            $rss[]=$fila;
           }

	 	 $rs->close();	 	 
	 	 cerrar_conexion($this->db);

	 	
	 	 $geo[] = $rss;

	 	 return $geo;
	 	 

	 }


	 public function crear($datos){

	 
	 }

	 public function eliminar($cedula = 11103094999){



	 }

	 public function modificar( $set ){



	 }




 }

