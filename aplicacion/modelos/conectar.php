<?php 

require_once("../config.inc");



	   function conectar(){

     		$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DB);

 
	 	 if($db->connect_errno)
	 		die("ha fallado la conexion");

		  return $db;	 	
		  
		  }




