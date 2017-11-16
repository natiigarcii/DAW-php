<?php
session_start();	
$title = "Menú de usuario - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

	$check = false;

	// Conecta con el servidor de MySQL
	$link = @mysqli_connect('localhost','root','admin', 'pibd'); 
	if(!$link) {
		echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
		echo '</p>';
		header('Location: inicio.php');	
	exit;
	} 
	// Ejecuta una sentencia SQL
	$sentencia = 'SELECT nomUsuario , clave FROM usuario';
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		header('Location: inicio.php');	
	exit;

	}

	while($fila = mysqli_fetch_assoc($resultado)) {

		if( $fila['nomUsuario'] == $_POST['nombre'] && $fila['clave'] == $_POST['psw'] ){
			
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

			$check = true;
			header('Location: usuario_registrado.php');
			break;
		}
	}
		
	if($check == false){
		header('Location: inicio.php');	
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