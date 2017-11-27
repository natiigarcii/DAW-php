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

    mysqli_query($link,"SET CHARACTER SET 'utf8'");
	mysqli_query($link,"SET SESSION collation_connection ='utf8_bin'");
    
    $sentencia = "SELECT fichero, idFoto, a.titulo a_titulo, f.titulo f_titulo, f.fecha, nomPais FROM fotos f, albumes a, paises p WHERE f.album = '$id' and a.idAlbum=f.album and f.pais=p.idPais";
    if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    }
    
    echo '<div id="container-fotos">';
    while ($fila = mysqli_fetch_assoc($resultado)) {               
        echo "<article class=foto>";
        echo '<a href="./detalle_foto.php?id=' . $fila['idFoto'] . '"><img id="cssvalid" id="' . $fila['idFoto'] . '" src="' . $fila['fichero'] . '" alt="imagen no encontrada" /></a><br>';
        echo '<strong>Titulo: </strong> ' . $fila['f_titulo'] . '';
        echo '<br><strong>Fecha: </strong> ' . $fila['fecha'] . '';
        echo '<br><strong>Album: </strong> ' . $fila['a_titulo'] . '';
        echo '<br><strong>Pais: </strong> ' . $fila['nomPais'] . '';
        echo '</article>';
        mysqli_free_result($resultado);
    }
    echo '</div>';
    
?>
<?php
}
require_once("footer.inc");
?>