<?php

require_once("../modelos/conectar.php");

class BITACORA{
	
	static function LOG($cedula, $accion, $tiempo = NULL, $sala = NULL){
      
       $db = conectar();
       $ip = $_SERVER["REMOTE_ADDR"];
       $ip = addslashes(htmlspecialchars(strip_tags($ip)));

       if($tiempo === NULL && $sala == NULL)
       $query = "INSERT INTO bitacora (cedula, accion, ip) VALUES ({$cedula}, '{$accion}', '{$ip}')";
       else
       $query = "INSERT INTO bitacora (cedula, accion, ip, tiempo, id_sala) VALUES ({$cedula}, '{$accion}', '{$ip}', {$tiempo}, {$sala})";

       $db->query($query) or die($db->error);
       $db->close();

    }

}
