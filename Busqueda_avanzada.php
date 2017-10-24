<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>

<h2>Búsqueda</h2>	
		<form class="formulario-avanzada">
		  <p><label for="titulo">Titulo:</label>
		  <input type="search" name="titulo" id="titulo"></p>
		  <p><label for="fecha">Fecha</label>
		  <input type="search" name="fecha" id="fecha"></p>
		  <p><label for="pais">País</label>
		  <input type="search" name="pais" id="pais"></p>
		</form>		
	<input type="submit" class="enviar-registro" value="Buscar" onclick="window.location.href='Resultado_busqueda.html'"> 
	<input type="submit" class="enviar-registro" value="Atrás" onclick="window.location.href='Inicio.html'"> 

	<?php
require_once("footer.inc");
?>
	
