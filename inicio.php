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

<!-- 
<div id="container-fotos">

	 <article id="primera-foto" class="foto">
		<a href="detalle_foto.php?id=2"><img src="img/foto1.jpg" alt="imagen no encontrada"  ></a>  		
		<p><strong>Titulo:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		<i class="material-icons">access_time</i>Subida hace 4 minutos		
	</article>

	<article class="foto">
		<a href="detalle_foto.php?id=1"><img src="img/foto2.jpg" alt="imagen no encontrada"  ></a>  		
		<p><strong>Titulo:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		<i class="material-icons">access_time</i>Subida hace 4 minutos		
	</article>

	<article class="foto">
		<a href="Detalle_foto.php?id=1"><img src="img/foto3.jpg" alt="imagen no encontrada"  ></a>  		
		<p><strong>Titulo:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		<i class="material-icons">access_time</i>Subida hace 4 minutos		
	</article>

	<article class="foto">
		<a href="Detalle_foto.php?id=13"><img src="img/foto4.jpg" alt="imagen no encontrada"  ></a>  		
		<p><strong>Titulo:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		<i class="material-icons">access_time</i>Subida hace 4 minutos		
	</article>

	<article class="foto">
		<a href="Detalle_foto.php?id=19"><img src="img/foto5.jpg" alt="imagen no encontrada"  ></a>  		
		<p><strong>Titulo:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		<i class="material-icons">access_time</i>Subida hace 4 minutos		
	</article>

	<article class="foto">
		<a href="Detalle_foto.php?id=6"><img src="img/foto6.jpg" alt="imagen no encontrada"  ></a>  		
		<p><strong>Titulo:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		<i class="material-icons">access_time</i>Subida hace 4 minutos		
	</article>

	<article class="foto">
		<a href="Detalle_foto.php?id=10"><img src="img/foto7.jpg" alt="imagen no encontrada"  ></a>  		
		<p><strong>Titulo:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		<i class="material-icons">access_time</i>Subida hace 4 minutos		
	</article>

	<article class="foto">
		<a href="Detalle_foto.php?id=17"><img src="img/foto8.jpg" alt="imagen no encontrada"  ></a>  		
		<p><strong>Titulo:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		<i class="material-icons">access_time</i>Subida hace 4 minutos		
	</article>

	<article class="foto">
		<a href="Detalle_foto.php?id=24"><img src="img/foto9.jpg" alt="imagen no encontrada"  ></a>  		
		<p><strong>Titulo:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		<i class="material-icons">access_time</i>Subida hace 4 minutos		
	</article>

	<article class="foto">
		<a href="Detalle_foto.php?id=13"><img src="img/foto10.jpg" alt="imagen no encontrada"  ></a>  		
		<p><strong>Titulo:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		<i class="material-icons">access_time</i>Subida hace 4 minutos		
	</article>

</div>
-->
<?php
require_once("footer.inc");
?>
	
