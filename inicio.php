<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>

<h3 id="cabecera-fotos"> Últimas fotos </h3> 

<?php
    // Conecta con el servidor de MySQL
    $link = @mysqli_connect('localhost', 'root', 'admin', 'pibd');
    if (!$link) {
        echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
        echo '</p>';
        exit;
    }

     $sentencia = 'SELECT * FROM fotos ORDER BY fRegistro DESC LIMIT 5';
      if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    }

echo '<div id="container-fotos">';

    while ($fila = mysqli_fetch_assoc($resultado)) {
    	$id = $fila['idFoto'];
    	$sentencia2 = "SELECT * FROM paises,fotos WHERE idPais = pais AND idFoto = '$id'";
    	if (!($resultado2 = @mysqli_query($link, $sentencia2))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    	}

    	$fila2 = mysqli_fetch_assoc($resultado2); 
    						
    					echo "<article class=foto>";	
                        echo '<a href="./detalle_foto.php?id='. $fila['idFoto'].'"><img height="220" width="220" src="'. $fila['fichero'] .'" alt="imagen no encontrada" class="foto" /></a>';
                        
                        echo '<p><strong>Titulo: </strong> ' . $fila['titulo'] . '</p>';
                        echo '<p><strong>País: </strong>' . $fila2['nomPais'] . '</p>';
                        echo '<p><strong>Subida el: </strong>' . $fila['fRegistro'] . '</p>';
                        echo '<i class="material-icons">access_time</i>Subida hace 4 minutos';
                        echo '</article>';
                        
                        
                        

    }
    echo '</div>';

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
	
