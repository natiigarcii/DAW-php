<?php
$title = "Mis álbumes - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
$id  = $_GET['id'];
if (isset($_SESSION["nombre"])) {
    
?>
<h2 class="cabecera"> Ver album</h2>
<form action="detalle_de_foto" method="post">
<div id="div">
<?php

    mysqli_query($link,"SET CHARACTER SET 'utf8'");
	mysqli_query($link,"SET SESSION collation_connection ='utf8_bin'");
    
    try {

    // Find out how many items are in the table
    $sentencia ="SELECT count(*) as total FROM fotos WHERE album = $id";
        date('d.m.Y',strtotime("-1 days"));
        if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
        }

    $fila = mysqli_fetch_assoc($resultado);
    $total = $fila["total"];

    // How many items to list per page
    $limit = 5;

    // How many pages will there be
    $pages = ceil($total / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

    // The "back" link
    $prevlink = ($page > 1) ? '<a href="?id='. $id .'&page=1" title="First page">&laquo;</a> <a href="?id='. $id .'&page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

    // The "forward" link
    $nextlink = ($page < $pages) ? '<a href="?id='. $id .'&page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?id='. $id .'&page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

    // Display the paging information
    echo '<div id="paging"><p>', $prevlink, ' Página ', $page, ' de ', $pages, ' páginas, mostrando ', $start, '-', $end, ' de ', $total, ' resultados ', $nextlink, ' </p></div>';

    // Prepare the paged query


$sentencia = "SELECT fichero, idFoto, a.titulo a_titulo, f.titulo f_titulo, f.fecha, nomPais FROM fotos f, albumes a, paises p WHERE f.album = '$id' and a.idAlbum=f.album and f.pais=p.idPais LIMIT $limit OFFSET $offset";
    if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    }
    // Do we have any results?
    while ($fila = mysqli_fetch_assoc($resultado)) {  
        $explode = explode("/",$fila["fichero"]);
        $rutathumb = $explode[2];             
        echo "<article class=foto>";
        echo '<a href="./detalle_foto.php?id=' . $fila['idFoto'] . '"><img id="cssvalid" id="' . $fila['idFoto'] . 
        '" src="./img/Thumbs/_thumb' . $rutathumb. '" alt="imagen no encontrada" /></a><br>';
        echo '<strong>Titulo: </strong> ' . $fila['f_titulo'] . '';
        echo '<br><strong>Fecha: </strong> ' . $fila['fecha'] . '';
        echo '<br><strong>Album: </strong> ' . $fila['a_titulo'] . '';
        echo '<br><strong>Pais: </strong> ' . $fila['nomPais'] . '';
        echo '</article>';
    }
    echo '</div>';
    mysqli_free_result($resultado);

} catch (Exception $e) {
    echo '<p>', $e->getMessage(), '</p>';
}

?>
<?php
}
require_once("footer.inc");
?>