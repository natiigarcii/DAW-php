<?php
$title = "Registro - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>

<h2 id="h2-registro">Registro</h2>
<?php



  if( isset($_GET['psw']) == 1){
    echo '<p class="m_error"> <label for="pwd">  Las contraseñas no coinciden </label> </p>';
  }
?>
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
          <select id="pais">

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
          </select>
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
	
