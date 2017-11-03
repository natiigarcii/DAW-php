<?php session_start(); 
session_destroy();

   //redireccion a pagina principal
   //setcookie("fechaUltimaVisita"," ",time()-3600); //elimino cookie
   setcookie("nombre"," ",time()-3600); //elimino cookie
   setcookie("fechaUltimaVisita"," ",time()-3600); //elimino cookie
   header("Location: inicio.php");
  


  
?>