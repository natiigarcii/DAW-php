<?php
session_start();	
$title = "Menú de usuario - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

$user1 = array("admin", "admin");
$user2 = array("natalia", "natalia");
$user3 = array("sergio", "pato");	

	$nombre = $_POST["nombre"];
 	$psw = $_POST["psw"];	


 	if(	($nombre==$user1[0] && $psw == $user1[1]) || ($nombre==$user2[0] && $psw == $user2[1]) || ($nombre==$user3[0] && $psw == $user3[1])){

 		header('Location: usuario_registrado.php?id=1');
 		exit;
 	}

 	else{ 		
 		header('Location: inicio.php');
 		exit;
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