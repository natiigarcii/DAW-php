<?php
session_start();	
$title = "Menú de usuario - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

	
	$_SESSION["remember"] = $_POST["remember"];
	
	$_SESSION["nombre"] = $_POST["nombre"];
	$_SESSION["psw"] = $_POST["psw"];
	$_SESSION['message'] = 'Usuario y/o contraseña incorrectos';

	$longitud = count($array);
	setcookie('remember', $_SESSION["remember"], (time() + 365 * 24 * 60 * 60));


	if(($_POST['nombre']) == "natalia" && ($_POST['psw']) == "natalia"  ){
		if(isset($_SESSION["remember"])){
			setcookie('nombre', $_SESSION["nombre"], (time() + 365 * 24 * 60 * 60));
			//setcookie("fechaUltimaVisita", date("d-m-y H:i:s"), (time() + 365 * 24 * 60 * 60));
		}
		header('Location: usuario_registrado.php');
	}else{
		header('Location: inicio.php');		
	}
	


require_once("footer.inc");
?>	