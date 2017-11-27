<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

if(isset($_SESSION["nombre"])){
?>
<h2 id="h2-registro">Mi perfil</h2>
<div class="mi_perfil">
<p><a href="/mis_datos.php">Mis datos</a></p>
<p><a href="/darse_baja.php">Darme de baja</a></p>
<p><a href="/mis_albumes.php">Mis albumes</a></p>
<p><a href="/crear_album.php">Crear album</a></p>
<p><a href="/solicitar_album.php">Solicitar album</a></p>
<p><a href="/anyadir_foto_album.php">Añadir foto a álbum</a></p>
</div>

<?php
}
else{
	header('Location: acceso_denegado.php');
}

require_once("footer.inc");
?>
	
