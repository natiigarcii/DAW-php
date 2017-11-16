<?php
$title = "Crear Album - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>
<h2>Crea tu álbum:</h2>
<form class="formulario-vertical" method="post">

      <p id="label-titulo"><label for="titulo">Titulo del album:</label> 
      <input type="search" maxlength="200" required name="titulo" id="titulo" placeholder="que lo describa"></p>

     <p> <label id="descripcion" for="descripcion">Descripcion:</label> 
      <textarea maxlength="4000" cols="100" rows="5" name="descripcion" id="descripcion" placeholder="Descripción de su contenido, etc."> </textarea>
      </p>

     <p><label for="fecha">Fecha:</label> 
       <input type="date" name="fecha" id="fecha">
     </p>
      <p>
          <label for="pais">País:</label>
 <select id="pais" name="pais">

            <?php
            
              // Conecta con el servidor de MySQL
              $link = @mysqli_connect('localhost','root','admin', 'pibd');
              if(!$link) {
                echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
                echo '</p>';
                exit;
              } 
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
              // Cierra la conexión
              mysqli_close($link);
            
            ?>
          </select>      </p>
     <p>
       <input type="submit" class="enviar-registro" value="Crear">
       <input type="submit" class="enviar-registro" value="Cancelar">
      </p>

    </form> 

 <?php
require_once("footer.inc");
?>
	
