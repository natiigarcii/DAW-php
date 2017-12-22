<?php
$title = "Respuesta Crear Album - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
require_once("funciones.php");

if(isset($_SESSION["id"])){
?>


<?php

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
        if($_FILES["foto"]["error"] > 0)
        {
        echo "Error: " . $msgError[$_FILES["foto"]["error"]] . "<br />";
        }
        else
        {
        /*
        echo "Nombre original: " . $_FILES["foto"]["name"] . "<br />";
        echo "Tipo: " . $_FILES["foto"]["type"] . "<br />";
        echo "Tamaño: " . ceil($_FILES["foto"]["size"] / 1024) . " Kb<br />";
        echo "Nombre temporal: " . $_FILES["foto"]["tmp_name"] . "<br />";
        */
        if(file_exists('img/'.$_FILES["foto"]["name"])){
            $i = 1;
            while(file_exists('img/'.$i."_".$_FILES["foto"]["name"])){
            $i++;
            }
            $_FILES["foto"]["name"] = $i."_".$_FILES["foto"]["name"];
            move_uploaded_file($_FILES["foto"]["tmp_name"],
            "img/" . $_FILES["foto"]["name"]);

            $mini = getthumb($_FILES["foto"]["name"], "./img");

            move_uploaded_file($mini, "/img/Thumbs");
          

            //echo'El fichero contiene un nombre ya en uso <br/>';
            //echo 'Almacenado con el nombre '. $_FILES["fotol"]["name"];
             
        }
        else
        {
        move_uploaded_file($_FILES["foto"]["tmp_name"],
        "img/" . $_FILES["foto"]["name"]);

        $mini = getthumb($_FILES["foto"]["name"], "./img");

        move_uploaded_file($mini, "/img/Thumbs");


        //echo "Almacenado en: " . "img/" . $_FILES["foto"]["name"];
        }
        }
        $foto = "./img/" . $_FILES["foto"]["name"];


$sentencia = 'INSERT INTO fotos
VALUES (NULL, "' . $_POST["titulo"] . '","' . $_POST["descripcion"] . '","' . $_POST["fecha"] . '","' . $_POST["pais"] . '","' . $_POST["album"] .'", "'.$foto.'" , CURRENT_TIME())';

  // Ejecuta la sentencia SQL
  if(!mysqli_query($link, $sentencia)){
    echo "Error: no se pudo realizar la inserción";
  }
  else{
    echo '<h2>Foto insertada correctamente</h2>';
    echo '<div class="mi_perfil">';
    echo '<p><a href="/veralbum.php?id=' . $_POST["album"] . '">Ver álbum</a></p>';
    echo '</div>'
  ?>

<?php
  }
?>



<?php
 }
else{
  header('Location: acceso_denegado.php');
}
require_once("footer.inc");
?>