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
   		
   		setcookie("salas", $_COOKIE["salas"], time() + (60 * 15) , "/");
		setcookie("sala", $_COOKIE["sala"], time() + (60 * 15) , "/");
        setcookie("tiempo", $_COOKIE["tiempo"], time() + (60 * 15) , "/");

   		echo json_encode(array("estado"=>1));
   	}