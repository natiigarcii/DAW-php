<?php
$title = "Respuesta Crear Album - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

if(isset($_SESSION["id"])){
?>


<?php

$sentencia = 'INSERT INTO fotos
VALUES (NULL, "' . $_POST["titulo"] . '","' . $_POST["descripcion"] . '","' . $_POST["fecha"] . '","' . $_POST["pais"] . '","' . $_POST["album"] .'", "" , CURRENT_TIME())';

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