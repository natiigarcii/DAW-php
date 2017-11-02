<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>

<h2>Búsqueda</h2>	
		<form class="formulario-avanzada" method="post" action="Resultado_busqueda.php">
		  <p><label for="titulo">Titulo:</label>
		  <input type="search" name="titulo" id="titulo"></p>
		  <p><label for="fecha">Fecha</label>
		  <input type="date" name="fecha" id="fecha"></p>
		  <p><label for="pais">País</label>
		  <input type="search" name="pais" id="pais"></p>
		  <p> 
		  	<input type="submit" class="enviar-registro" value="Buscar">
		  	<a id="texto-registro" href="Inicio.php" > Atrás </a>
		  </p>
		</form>		
	<?php
require_once("footer.inc");
?>
	
