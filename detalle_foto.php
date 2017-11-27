<?php
$title = "Registro - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

$id = $_GET['id'];

if(isset($_SESSION["nombre"])){

    $sentencia = 'SELECT f.titulo f_titulo, f.fichero, a.titulo a_titulo, p.nomPais, u.nomUsuario, f.descripcion, f.fecha  FROM fotos f, paises p, albumes a, usuarios u WHERE f.idFoto = "' . $id . '" and p.idPais = f.pais and f.album = a.idAlbum and a.usuario = u.idUsuario';
      if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    }

    $fila = mysqli_fetch_assoc($resultado);

    echo '<h2>Página detalle foto</h2>';
    echo '<figure class="foto_grande">';
    echo'<img id="foto_detalle" src="'. $fila['fichero'] . '" alt="imagen no encontrada" /><br>';
    echo '<p><strong>Título:</strong> '. $fila['f_titulo'] . '</p>';
    echo '<p><strong>Fecha:</strong> '. $fila['fecha'] . '</p>';
    echo '<p><strong>País:</strong> '. $fila['nomPais'] . '</p>';
    echo '<p><strong>Álbum:</strong> '. $fila['a_titulo'] . '</p>';
    echo '<p><strong>Subida por:</strong> '. $fila['nomUsuario'] . '</p>';
    echo '<p><strong>Descripcion:</strong> '. $fila['descripcion'] . '</p>';
    echo '</figure>';


	
}
else{

		header('Location: acceso_denegado.php');		
		exit;


}
mysqli_free_result($resultado);
	?>




 <?php
require_once("footer.inc");
?>
	
