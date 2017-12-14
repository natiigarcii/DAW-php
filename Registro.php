<?php
$title = "Registro - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

?>

<h2 id="h2-registro">Registro</h2>
<?php



 if(isset($_GET["error"])){
    echo $_GET["error"];
  }
?>
	<form class="formulario-vertical" method="post" action="respuesta_registro.php" enctype="multipart/form-data">      
        <p><label for="usuario"> Nombre de usuario: </label>
          <input type="text" name="usuario" id="usuario" required>
        </p>

        <p><label for="psw">Contraseña:</label> 
          <input type="password" name="psw" id="psw" required >
        </p>

        <p><label for="psw2">Repite la contraseña:</label>
          <input type="password" name="psw2" id="psw2" required>
        </p>

        <p><label for="email">Email:</label>
          <input type="email" name="email" id="email" required placeholder="ej: usuario@mail.com">
        </p>

        <p id="sexo">
          <label id="label-sexo">Sexo:</label>
          <label id="label_masculino" for="masculino">Masculino<input type="radio" name="sexo" value="1" id="masculino" checked></label>

          <label id="label_femenino" for="femenino">Femenino<input type="radio" name="sexo" value="2" id="femenino"></label>
        </p>

        <p>
         <label for="fecha_nacimiento">Fecha de nacimiento:</label>
         <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
        </p>

        <p>
        <label for="ciudad">Ciudad:</label>
         <input type="text" name="ciudad" id="ciudad"  required>
        </p>

        <p>
          <label for="pais">País de residencia:</label>
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
          <label for="foto_perfil">Foto de perfil:</label>
          <input type="file" name="foto_perfil" id="foto_perfil" >
        </p>

        <p>
          <input type="submit" class="enviar-registro" value="Enviar">
          <input type="submit" class="enviar-registro" value="Cancelar" formaction="inicio.php">
        </p>
     
  </form>


 <?php
require_once("footer.inc");
?>
	
