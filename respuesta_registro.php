<?php
$title = "Resgistro respuesta - Pickle";
$pag = 1;
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


$msgError = array(0 => "No hay error, el fichero se subió con éxito",
        1 => "El tamaño del fichero supera la directiva
        upload_max_filesize el php.ini",
        2 => "El tamaño del fichero supera la directiva
        MAX_FILE_SIZE especificada en el formulario HTML",
        3 => "El fichero fue parcialmente subido",
        4 => "No se ha subido un fichero",
        6 => "No existe un directorio temporal",
        7 => "Fallo al escribir el fichero al disco",
        8 => "La subida del fichero fue detenida por la extensión");
        if($_FILES["foto_perfil"]["error"] > 0)
        {
        echo "Error: " . $msgError[$_FILES["foto_perfil"]["error"]] . "<br />";
        }
        else
        {
          /*
        echo "Nombre original: " . $_FILES["foto_perfil"]["name"] . "<br />";
        echo "Tipo: " . $_FILES["foto_perfil"]["type"] . "<br />";
        echo "Tamaño: " . ceil($_FILES["foto_perfil"]["size"] / 1024) . " Kb<br />";
        echo "Nombre temporal: " . $_FILES["foto_perfil"]["tmp_name"] . "<br />";
        */

        if(file_exists('img/'.$_FILES["foto_perfil"]["name"])){
            $i = 1;
            while(file_exists('img/'.$i."_".$_FILES["foto_perfil"]["name"])){
            $i++;
            }
            $_FILES["foto_perfil"]["name"] = $i."_".$_FILES["foto_perfil"]["name"];
            move_uploaded_file($_FILES["foto_perfil"]["tmp_name"],
            "img/" . $_FILES["foto_perfil"]["name"]);
            //echo'El fichero contiene un nombre ya en uso <br/>';
            //echo 'Almacenado con el nombre '. $_FILES["foto_perfil"]["name"];
             
        }
        else
        {
        move_uploaded_file($_FILES["foto_perfil"]["tmp_name"],
        "img/" . $_FILES["foto_perfil"]["name"]);
       // echo "Almacenado en: " . "img/" . $_FILES["foto_perfil"]["name"];
        }
        }
        $foto = "./img/" . $_FILES["foto_perfil"]["name"];
        ////////////////////////////////////////////////HAGO LOS INSERT A LA BASE DE DATOS
     
//SOLO TIENES QUE INSERTAR FOTO AL SERVIDOR QUE ES EL LA RUTA DE NUESTRA FOTO

   
  $sentencia = 'INSERT INTO usuarios 
    VALUES (NULL, "' . $_POST["usuario"] . '","' . $_POST["psw"] . '","' . $_POST["email"] . '","' . $_POST["sexo"] . '",
    "' . $_POST["fecha_nacimiento"] . '","' . $_POST["ciudad"] . '","'. $_POST["pais"] .'","'. $foto .'", CURRENT_TIME())';
  // Ejecuta la sentencia SQL
  if(!mysqli_query($link, $sentencia)){
    echo "Error: no se pudo realizar la inserción";
  }


}else{
 // header('Location: Registro.php');
}

require_once("footer.inc");
?>
	
