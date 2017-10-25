<?php
session_start();	
$title = "Menú de usuario - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

 	

	$nombre = $GET["nombre"];
 	$psw = $GET["psw"];
	echo "hola"; 	
 	if(($nombre=="natalia") && ($psw == "natalia")){

 		header('Location: usuario_registrado.php');
 	}

 	else{
 			
 		header('Location: inicio.php');
 	}

	//session_start();	
	//$_SESSION["nombre"] = $_POST["nombre"];
	//$_SESSION["psw"] = $_POST["psw"];
	//$_SESSION['message'] = 'Usuario y/o contraseña incorrectos';
	
	
	//if(($_POST['nombre']) == "natalia" && ($_POST['psw']) == "natalia" ){		
	//	header('Location: usuario_registrado.php');
	//}else{			
	//	header('Location: inicio.php');	
		
	//}





require_once("footer.inc");
?>	