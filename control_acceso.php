<?php
session_start();	
$title = "Menú de usuario - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

	
	$usuarios  = array(
		array("nombre" =>"natalia"	,"pwd" =>"natalia"	),
		array("nombre" =>"sergio"	,"pwd" =>"pato"		),
		array("nombre" =>"u1"		,"pwd" =>"u1"		),
		array("nombre" =>"root"		,"pwd" =>"root"		)
		);

	$_SESSION["remember"] = $_POST["remember"];
	
	$_SESSION["nombre"] = $_POST["nombre"];
	$_SESSION["psw"] = $_POST["psw"];
	$_SESSION['message'] = 'Usuario y/o contraseña incorrectos';

	$longitud = count($array);
	setcookie('remember', $_SESSION["remember"], (time() + 365 * 24 * 60 * 60));


	foreach ($usuarios as $usuario) {
		if(($_POST['nombre']) == $usuario["nombre"] && ($_POST['psw']) == $usuario["pwd"]  ){
		
			if(isset($_SESSION["remember"])){
				setcookie('nombre', $_SESSION["nombre"], (time() + 365 * 24 * 60 * 60));
				//setcookie("fechaUltimaVisita", date("d-m-y H:i:s"), (time() + 365 * 24 * 60 * 60));
			}

		header('Location: usuario_registrado.php');
		}

		else{
		header('Location: inicio.php');		
		}
	}


require_once("footer.inc");
?>	