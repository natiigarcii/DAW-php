<?php
$title = "Resgistro respuesta - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
require_once("filtro.inc");
?>

<h3>Usuario registrado con los siguientes datos:</h3>
<form class="formulario-vertical" method="post" action="respuesta_registro.php">      
        <p><label for="usuario"> Nombre de usuario: </label>
          <input type="text" name="usuario" id="usuario" disabled value="<?php echo $_POST["usuario"];?>">
        </p>

        <p><label for="pwd">Contraseña:</label> 
          <input type="password" name="pwd" id="pwd" disabled value="<?php echo $_POST["pwd"];?>">
        </p>

        <p><label for="2pwd">Repite la contraseña:</label>
          <input type="password" name="2pwd" id="2pwd" disabled value="<?php echo $_POST["2pwd"];?>">
        </p>

        <?php
          if ($_POST["pwd"] != $_POST["2pwd"]) {
           
            header('Location: registro.php?psw=1');
          }
        ?>

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
   // Sentencia SQL: inserta un nuevo libro
  $sentencia = 'INSERT INTO usuarios 
    VALUES (NULL, "' . $_POST["usuario"] . '","' . $_POST["pwd"] . '","' . $_POST["email"] . '","' . $_POST["sexo"] . '",
    "' . $_POST["fecha_nacimiento"] . '","' . $_POST["ciudad"] . '","'. $_POST["pais"] .'",
    "", CURRENT_TIME())';
  // Ejecuta la sentencia SQL
  if(!mysqli_query($link, $sentencia)){
    echo "Error: no se pudo realizar la inserción";
  }

require_once("footer.inc");
?>
	
