<?php
 session_start();


 if(!isset($_COOKIE["salas"]) && !isset($_SESSION["Salas"]))
   {
      echo json_encode(array("estado"=>0));
      die;
   }


   if($_COOKIE["salas"] != $_SESSION["salas"])
   	echo json_encode(array("estado"=>0));
   else
   	{	
   		setcookie("salas", $token, time() + (3600 * 2) , "/");
		setcookie("sala", $id_sala. ":" .$cedula, time() + (3600 * 2) , "/");
        setcookie("tiempo", $_COOKIE["tiempo"], time() + (3600 * 2) , "/");

   		echo json_encode(array("estado"=>1));
   	}