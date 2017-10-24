<?php
$title = "Crear Album - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>

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
          <input type="text" name="pais" id="pais" required>
      </p>
     <p>
       <input type="submit" class="enviar-registro" value="Crear">
       <input type="submit" class="enviar-registro" value="Cancelar">
      </p>

    </form> 

 <?php
require_once("footer.inc");
?>
	
