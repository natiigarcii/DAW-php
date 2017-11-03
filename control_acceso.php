<?php
session_start();	
$title = "Menú de usuario - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

	
	$usuarios  = array(
		array("natalia"	,"natalia"	),
		array("sergio"	,"pato"		),
		array("u1"		,"u1"		),
		array("root"	,"root"		)
		);


	foreach ($usuarios as $usuario) {
		if(($_POST['nombre']) == $usuario[0] && ($_POST['psw']) == $usuario[1]  ){
			$_SESSION["remember"] = $_POST["remember"];
			$_SESSION["nombre"] = $_POST["nombre"];
			$_SESSION["psw"] = $_POST["psw"];
			$_SESSION['message'] = 'Usuario y/o contraseña incorrectos';
			
			if(isset($_POST["remember"])){
				setcookie("nombre", $_POST["nombre"], (time() + 365 * 24 * 60 * 60));
				setcookie('remember', $_SESSION["remember"], (time() + 365 * 24 * 60 * 60));
				//setcookie("fechaUltimaVisita", date("d-m-y H:i:s"), (time() + 365 * 24 * 60 * 60));
				setcookie("fechaUltimaVisita", date("d-m-y H:i:s"), (time() + 365 * 24 * 60 * 60));
  				
			}
			else{
				setcookie("nombre"," ",time()-3600); //elimino cookie
				setcookie("fechaUltimaVisita"," ",time()-3600); //elimino cookie
			}


		header('Location: usuario_registrado.php');
		break;
		}

		else{
		header('Location: inicio.php');		
		}
	}


require_once("footer.inc");
?>	