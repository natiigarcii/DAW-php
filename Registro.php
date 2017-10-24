<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>

<h2 id="h2-registro">Registro</h2>
	<form class="formulario-vertical" method="post" action="respuesta_registro.php">      
        <p><label for="usuario"> Nombre de usuario: </label>
          <input type="text" name="usuario" id="usuario" required>
        </p>

        <p><label for="pwd">Contraseña:</label> 
          <input type="password" name="pwd" id="pwd" required >
        </p>

        <p><label for="2pwd">Repite la contraseña:</label>
          <input type="password" name="2pwd" id="2pwd" required>
        </p>

        <p><label for="email">Email:</label>
          <input type="email" name="email" id="email" required placeholder="ej: usuario@mail.com">
        </p>

        <p id="sexo">
          <label id="label-sexo">Sexo:</label>
          <label id="label_masculino" for="masculino">Masculino<input type="radio" name="sexo" value="masculino" id="masculino" checked></label>

          <label id="label_femenino" for="femenino">Femenino<input type="radio" name="sexo" value="femenino" id="femenino"></label>
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
          <input type="text" name="pais" id="pais" required>
        </p>

        <p>
          <label for="foto_perfil">Foto de perfil:</label>
          <input type="file" name="foto_perfil" id="foto_perfil">
        </p>

        <p>
          <input type="submit" class="enviar-registro" value="Enviar">
          <input type="submit" class="enviar-registro" value="Cancelar" onclick="window.location.href='Inicio.html'">
        </p>
     
  </form>


 <?php
require_once("footer.inc");
?>
	
