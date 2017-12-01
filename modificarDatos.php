<?php
$title = "Registro - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
require_once("filtro.inc");
?>



<h1 class="cabecera">Tus datos son:</h1>
<form class="formulario-vertical" method="post" action="respuesta_registro.php">      
        <p><label for="usuario"> Nombre de usuario: </label>
          <input type="text" name="usuario" id="usuario" disabled value="<?php echo $_POST["usuario"];?>">
        </p>

        <p><label for="psw">Contraseña:</label> 
          <input type="password" name="psw" id="psw" disabled value="<?php echo $_POST["psw"];?>">
        </p>

        <p><label for="email">Email:</label>
          <input type="email" name="email" id="email" disabled value="<?php echo $_POST["email"];?>">
        </p>

        <p>
          <label for="sexo-respuesta">Sexo:</label>
          <input type="text" name="sexo-respuesta" id="sexo-respuesta" disabled value="<?php echo $_POST["sexo"];?>">
        </p>

        <p>
         <label for="fecha_nacimiento">Fecha de nacimiento:</label>
         <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" disabled value="<?php echo $_POST["fecha_nacimiento"];?>">
        </p>

        <p>
        <label for="ciudad">Ciudad:</label>
         <input type="text" name="ciudad" id="ciudad"  disabled value="<?php echo $_POST["ciudad"];?>">
        </p>

        <p>
          <label for="pais">País de residencia:</label>
          <input type="text" name="pais" id="pais" disabled value="<?php echo $_POST["pais"];?>">
        </p>

        <p>
          <label for="foto_perfil">Foto de perfil:</label>
          <input type="file" name="foto_perfil" id="foto_perfil" disabled value="<?php echo $_POST["foto_perfil"];?>">
        </p>
     
  </form>



<?php
if($_SESSION["insertar_modificar"] == 1){ //significa que todo es correcto y debe modificar
//aqui iria lo de insertar
   // Sentencia SQL: inserta un nuevo libro

	$sentencia = 'SELECT idPais FROM paises WHERE nomPais like "' . $_POST["pais"] . '"'; 
	$idPais = 0;
	if(!($resultado = @mysqli_query($link, $sentencia))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                echo '</p>';
              exit;
    } 
              
              // Recorre el resultado
    while($fila = mysqli_fetch_assoc($resultado)) {
    	$idPais = $fila['idPais'];
    }
    mysqli_free_result($resultado);
    echo  $_SESSION["id"];

  $sentencia = 'UPDATE usuarios SET nomUsuario = "' . $_POST["usuario"] . '", clave = "'. $_POST["psw"] .'", email = "'. $_POST["email"] . '", 
  sexo = "'. $_POST["sexo"] .'", fNacimiento = "'. $_POST["fecha_nacimiento"] .'",ciudad = "'. $_POST["ciudad"] .'",
  pais = "'. $idPais . '", foto = "" where idUsuario = "' . $_SESSION["id"]. '"';

  if(!mysqli_query($link, $sentencia)){
    echo "Error: no se pudo realizar el UPDATE";
  }
}



require_once("footer.inc");
?>
