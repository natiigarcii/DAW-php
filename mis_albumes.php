<?php
$title = "Mis álbumes - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
if (isset($_SESSION["nombre"])) {
?>

<h2 id="h2-registro">Mis albumes:</h2>

<?php
    $aux = $_SESSION["nombre"];
    
    
    
    $sentencia = 'SELECT * FROM albumes a, usuarios u WHERE u.nomUsuario = "' . $aux . '" and u.idUsuario = a.usuario';
    
    
    if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    }

    echo '<table><tr>';
    echo "<th>Última Foto</th><th>Id Album</th><th>Título</th><th>Descripcion</th>";
    echo "<th>Fecha</th><th>Pais</th><th>Usuario</th><th>Opciones</th>";
    echo '</tr>';
    
    
    
    
    //Recorre el resultado
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $sentencia2 = 'SELECT fichero FROM fotos WHERE album ='. $fila["idAlbum"] .' ORDER BY fRegistro LIMIT 1';

         if (!($resultado2 = @mysqli_query($link, $sentencia2))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
        }

        $fila2 = mysqli_fetch_assoc($resultado2);
        if($fila2 != null){
            $explode = explode("/",$fila2["fichero"]);
            $rutathumb = './img/Thumbs/_thumb'.$explode[2]; 
        }

        else{

            $rutathumb = './img/albumv';
            
        }
         
        echo '<tr>';
        echo '<td><img id="foto_detalle" src="' . $rutathumb.'" alt="imagen no encontrada" /></td>';
        echo '<td>' . $fila['idAlbum'] . '</td>';
        echo '<td>' . $fila['titulo'] . '</td>';
        echo '<td>' . $fila['descripcion'] . '</td>';
        echo '<td>' . $fila['fecha'] . '</td>';
        echo '<td>' . $fila['pais'] . '</td>';
        echo '<td>' . $aux . '</td>';
        echo '<td><a href="./veralbum.php?id=' . $fila['idAlbum'] . '&idA=' . $fila['usuario'] . '">Ver</a></td>';
        echo '</tr>';
    }
    
    echo "</table>";
    mysqli_free_result($resultado);
}
else{
    header('Location: acceso_denegado.php');
}
require_once("footer.inc");
?>
   