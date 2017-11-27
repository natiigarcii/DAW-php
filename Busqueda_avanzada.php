<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>

<h2>Búsqueda</h2>	
		<form id="form_busqueda" class="formulario-avanzada" method="post" action="Resultado_busqueda.php">
		  <p><label for="titulo">Titulo:</label>
		  <input type="search" name="titulo" id="titulo"></p>

		  <p><label for="fecha">Fecha</label>
		  <input type="date" name="fecha" id="fecha"></p>
		  
		  <p><label for="pais">País</label>
		  <select name="pais">
        <option value="">País</option>
		  <?php
              // Ejecuta una sentencia SQL
              
              $sentencia = 'SELECT nomPais FROM paises order by nomPais asc';
              if(!($resultado = @mysqli_query($link, $sentencia))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                echo '</p>';
              exit;
              } 
              
              // Recorre el resultado
              while($fila = mysqli_fetch_assoc($resultado)) {
              echo '<option value="' . $fila['nomPais'] . '">' . $fila['nomPais'] . '</option>' ;   
              }
              mysqli_free_result($resultado);
			
            ?>
          </select>
		  <p> 
		  	<input type="submit" class="enviar-registro" value="Buscar">
		  	<a id="texto-registro" href="Inicio.php" > Atrás </a>
		  </p>
		</form>		
	<?php
require_once("footer.inc");
?>
	
