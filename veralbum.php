<?php
$title = "Mis álbumes - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
$id  = $_GET['id'];
$idA = $_GET['idA'];
if (isset($_SESSION["nombre"])) {
    
?>
<h2 class="cabecera"> Ver album</h2>
<form action="detalle_de_foto" method="post">
<div id="div">
<?php
    // Conecta con el servidor de MySQL
    $link = @mysqli_connect('localhost', 'root', 'admin', 'pibd');
    if (!$link) {
        echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
        echo '</p>';
        exit;
    }
    
    $sentencia = "SELECT * FROM fotos WHERE Album = '$id'";
    if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    }
    
    
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $aux        = $fila['album']; //auxiliar para mostrar el nombre del Album en vez de su id
        $sentencia2 = "SELECT * FROM albumes WHERE idAlbum = '$aux' ";
        if (!($resultado = @mysqli_query($link, $sentencia2))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
            echo '</p>';
            exit;
            
        }
        $fila2 = mysqli_fetch_assoc($resultado);
        
        
        echo '<a href="./detalle_foto.php?id=' . $fila['idFoto'] . '"><img id="cssvalid" id="' . $fila['idFoto'] . '" src="' . $fila['fichero'] . '" alt="imagen no encontrada" /></a><br>';
        echo '<strong>Titulo: </strong> ' . $fila['titulo'] . '';
        echo '<br><strong>Fecha: </strong> ' . $fila['fecha'] . '';
        echo '<br><strong>Album: </strong> ' . $fila2['titulo'] . '';
        
    }
    
    // Libera la memoria ocupada por el resultado 
    mysqli_free_result($resultado);
    // Cierra la conexión 
    mysqli_close($link);
    
?>
<?php
}
require_once("footer.inc");
?>