<?php session_start(); 
session_destroy();

   //redireccion a pagina principal
   //setcookie("fechaUltimaVisita"," ",time()-3600); //elimino cookie
   setcookie("nombre"," ",time()-3600); //elimino cookie
   setcookie("fechaUltimaVisita"," ",time()-3600); //elimino cookie
  
  if( isset($_GET['borrado']) == 1){
   header("Location: inicio.php?borrado=1");
  }
  else{
  	header("Location: inicio.php");
  }
?>