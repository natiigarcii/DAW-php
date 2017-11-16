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




	// Conecta con el servidor de MySQL
	$link = @mysqli_connect('localhost','root','admin','pibd');
	if(!$link) {
		echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
		echo '</p>';
		exit;
		header('Location: usuario_registrado.php');
	} 

	$sentencia = 'SELECT nomUsuario , clave FROM usuarios where nomUsuario like "' . $_POST["nombre"] . '"';
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Contraseña incorrecta" . mysqli_error($link);
		echo '</p>';
		exit;
		$_SESSION['message'] = 'Usuario y/o contraseña incorrectos';
		header('Location: usuario_registrado.php');
	}
	else{
		$_SESSION["remember"] = $_POST["remember"];
		$_SESSION["nombre"] = $_POST["nombre"];
		$_SESSION["psw"] = $_POST["psw"];
		
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
		
	}
	mysqli_free_result($resultado);
	mysqli_close($link);




	/*foreach ($usuarios as $usuario) {
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
	}*/


require_once("footer.inc");
?>	