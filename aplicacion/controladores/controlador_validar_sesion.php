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
   		
   		setcookie("salas", $_COOKIE["salas"], time() + 3600 , "/");
		setcookie("sala", $_COOKIE["sala"], time() + 3600 , "/");
        setcookie("tiempo", $_COOKIE["tiempo"], time() + 3600 , "/");

   		echo json_encode(array("estado"=>1));
   	}