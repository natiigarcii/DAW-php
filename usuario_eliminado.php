 <?php
$title = "Usuario eliminado - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

$sentencia = 'SELECT idUsuario ,nomUsuario , clave FROM usuarios';
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
		header('Location: inicio.php');	
	exit;

	}

	while($fila = mysqli_fetch_assoc($resultado)) {


		if( $fila['nomUsuario'] == $_POST['usuario'] && $fila['clave'] == $_POST['pwd'] 
			&& $_POST['usuario'] == $_SESSION["nombre"] && $_POST['pwd'] == $_SESSION["psw"]){
			
			$sentencia = 'DELETE FROM usuarios WHERE idUsuario =  "' . $fila["idUsuario"] . '"';
			
			if(!mysqli_query($link, $sentencia)){
   				header('Location: darse_baja.php');
  			}
  			else{
  				header('Location: cerrarsesion.php?borrado=1');
  			}
		}
		else{
			header('Location: darse_baja.php?error=1');
		}
	}
?>
 <?php
require_once("footer.inc");
?>