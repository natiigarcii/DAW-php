<?php
$title = "Crear Album - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

if(isset($_SESSION["nombre"])){
?>
<h2>Crea tu álbum:</h2>
<form class="formulario-vertical" method="post" action="crear_album_respuesta.php">

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
 <select name="pais" id="pais">

            <?php

              // Ejecuta una sentencia SQL
              
              $sentencia = 'SELECT nomPais, idPais FROM paises order by nomPais asc';
              if(!($resultado = @mysqli_query($link, $sentencia))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                echo '</p>';
              exit;
              } 
              
              // Recorre el resultado
              while($fila = mysqli_fetch_assoc($resultado)) {
              echo '<option value="' . $fila['idPais'] . '">' . $fila['nomPais'] . '</option>' ;   
              }
              mysqli_free_result($resultado);
            ?>
          </select>   
        </p>
     <p>
       <input type="submit" class="enviar-registro" value="Crear">
      </p>

    </form> 

 <?php
 }
else{
  header('Location: acceso_denegado.php');
}
require_once("footer.inc");
?>
	
