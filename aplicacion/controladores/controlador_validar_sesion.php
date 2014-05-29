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
   	echo json_encode(array("estado"=>1));