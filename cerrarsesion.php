<?php session_start(); 
session_destroy();

   //redireccion a pagina principal
   //setcookie("fechaUltimaVisita"," ",time()-3600); //elimino cookie
   //setcookie("nombre"," ",time()-3600); //elimino cookie
   if(isset($_SESSION["remember"])){
		setcookie("fechaUltimaVisita", date("d-m-y H:i:s"), (time() + 365 * 24 * 60 * 60));
   }  
   header("Location: inicio.php");
  
  
?>