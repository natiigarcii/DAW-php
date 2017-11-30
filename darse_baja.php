 <?php
$title = "Darse de baja - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

 if( isset($_GET['error']) == 1){
   echo "<h2>Ha habido un error al intentar eliminar su usuario, por favor vuelva a comprobar los datos</h2>";
  }
?>

<h2>Para darte de baja necesitamos comprobar que eres el propietario de esta cuenta</h2>

	<form class="formulario-vertical" method="post" action="usuario_eliminado.php">
		<p><label for="usuario"> Nombre de usuario: </label>
          <input type="text" name="usuario" id="usuario" required>
        </p>

        <p><label for="pwd">Contraseña:</label> 
          <input type="password" name="pwd" id="pwd" required >
        </p>
        <input type="submit" class="enviar-registro" value="Enviar" >
        <input type="submit" class="enviar-registro" value="Cancelar" formaction="usuario_registrado.php">
	</form>


 <?php
require_once("footer.inc");
?>