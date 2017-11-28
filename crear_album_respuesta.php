<?php
$title = "Respuesta Crear Album - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

if(isset($_SESSION["id"])){
?>


<?php

$sentencia = 'INSERT INTO albumes 
VALUES (NULL, "' . $_POST["titulo"] . '","' . $_POST["descripcion"] . '","' . $_POST["fecha"] . '","' . $_POST["pais"] . '","' . $_SESSION["id"] .'")';

  // Ejecuta la sentencia SQL
  if(!mysqli_query($link, $sentencia)){
    echo "Error: no se pudo realizar la inserción";
  }
  else{
    echo '<h2>Álbum creado correctamente</h2>';
  ?>
    <div class="mi_perfil">
    <p><a href="/mis_albumes.php">Mis albumes</a></p>
    </div>

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
	
