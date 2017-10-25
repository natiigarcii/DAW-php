<?php
session_start();	
$title = "Menú de usuario - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");




 
	session_start();	
	$_SESSION["nombre"] = $_POST["nombre"];
	$_SESSION["psw"] = $_POST["psw"];
	$_SESSION['message'] = 'Usuario y/o contraseña incorrectos';
	
	
	if(($_POST['nombre']) == "natalia" && ($_POST['psw']) == "natalia" ){		
		header('Location: usuario_registrado.php');
	}else{			
		header('Location: inicio.php');	
		
	}





require_once("footer.inc");
?>	