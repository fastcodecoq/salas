<?php

require_once("../modelos/conectar.php");

class BITACORA{
	
	static function LOG($cedula, $accion){
      
       $db = conectar();
       $ip = $_SERVER["REMOTE_ADDR"];
       $ip = addslashes(htmlspecialchars(strip_tags($ip)));

       $query = "INSERT INTO bitacora (cedula, accion, ip) VALUES ({$cedula}, '{$accion}', '{$ip}')";

       $db->query($query) or die($db->error);
       $db->close();

    }

}
