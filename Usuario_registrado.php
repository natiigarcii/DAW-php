<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

if(isset($_SESSION["nombre"])){
?>

<p><a href="#">Darme de baja</a></p>
<p><a href="./mis_albumes.php">Mis albumes</a></p>
<p><a href="./crear_album.php">Crear album</a></p>
<p><a href="/solicitar_album.php">Solicitar album</a></p>
<p><a href="/anyadir_foto_album.php">Añadir foto a álbum</a></p>


<?php
}
else{
	header('Location: acceso_denegado.php');
}

require_once("footer.inc");
?>
	
