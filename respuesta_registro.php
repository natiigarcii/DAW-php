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

        <p><label for="psw">Contraseña:</label> 
          <input type="password" name="psw" id="psw" disabled value="<?php echo $_POST["psw"];?>">
        </p>

        <p><label for="psw2">Repite la contraseña:</label>
          <input type="password" name="psw2" id="psw2" disabled value="<?php echo $_POST["psw2"];?>">
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

 if($_SESSION["insertar_modificar"] == 1){

   // Sentencia SQL: inserta un nuevo libro
  $sentencia = 'INSERT INTO usuarios 
    VALUES (NULL, "' . $_POST["usuario"] . '","' . $_POST["psw"] . '","' . $_POST["email"] . '","' . $_POST["sexo"] . '",
    "' . $_POST["fecha_nacimiento"] . '","' . $_POST["ciudad"] . '","'. $_POST["pais"] .'",
    "", CURRENT_TIME())';
  // Ejecuta la sentencia SQL
  if(!mysqli_query($link, $sentencia)){
    echo "Error: no se pudo realizar la inserción";
  }


}else{
 // header('Location: Registro.php');
}

require_once("footer.inc");
?>
	
