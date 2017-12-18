<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
 if( isset($_GET['borrado']) == 1){
   echo "<h2>Usuario borrado correctamente</h2>";
  }
?>



<h3 id="cabecera-fotos"> Últimas fotos </h3> 

<?php   

     $sentencia = 'SELECT * from fotos f, paises p where p.idPais = f.pais ORDER BY f.fRegistro DESC LIMIT 5';

      if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    }

echo '<div id="container-fotos">';

    while ($fila = mysqli_fetch_assoc($resultado)) {
    	$id = $fila['idFoto']; 
    	echo "<article class=foto>";	
        echo '<a href="./detalle_foto.php?id='. $fila['idFoto'].'"><img src="'. $fila['fichero'] .'" alt="imagen no encontrada" class="foto" /></a>';                        
        echo '<p><strong>Titulo: </strong> ' . $fila['titulo'] . '</p>';
        echo '<p><strong>País: </strong>' . $fila['nomPais'] . '</p>';
        echo '<p><strong>Subida el: </strong>' . $fila['fRegistro'] . '</p>';
        echo '<i class="material-icons">access_time</i>Subida hace 4 minutos';
        echo '</article>';
                        
                        
                        

    }
    echo '</div>';
mysqli_free_result($resultado);
?>


<h3 id="cabecera-fotos"> Fotos seleccionadas </h3> 

<?php
 $fichero = file('./fotosseleccionadas.txt');


 $fotoElegida = explode('/',$fichero[rand(1 ,count($fichero)-1)]); //convierte string en array
 																//y me selecciona una foto random
 $sentencia = "SELECT * FROM fotos WHERE IdFoto=".$fotoElegida[0];
 if (!($resultado = @mysqli_query($link, $sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
    echo '</p>';
   	exit;
 }
 $foto = $resultado->fetch_assoc();



echo "<article class=foto>";	
       echo '<a href="./detalle_foto.php?id='. $foto['idFoto'].'"><img src="'. $foto['fichero'] .'" alt="imagen no encontrada" class="recsubidas" /></a>';                       
  		echo '<p><strong>Usuario: </strong> '. $fotoElegida[1] .'</p>';
        echo '<p><strong>Descripción: </strong> '. $fotoElegida[2] .'</p>';      
        echo '</article>';


 ?>


<?php
require_once("grafo.inc");
?>
<img src="<?php echo $img_src; ?>" />
<?php
require_once("footer.inc");
?>
	
