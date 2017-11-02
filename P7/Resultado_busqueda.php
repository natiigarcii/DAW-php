<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>


<h2>Resultado de búsqueda</h2>

<?php
	if(($_POST['titulo']) != ""){
		echo "<b><p>Titulo:</b>" . $_POST["titulo"]. "</p>";
	}
	if(($_POST['fecha']) != ""){
		echo "<b><p>Fecha:</b>" . $_POST["fecha"]. "</p>";
	}
	if(($_POST['pais']) != ""){
		echo "<b><p>País:</b>" . $_POST["pais"] . "</p>";
	}
?>
	<figure class="foto">
		<a href="Detalle_foto.php?id=11"><img src="img/foto6.jpg" alt="imagen no encontrada" style="width:175px;height:175px;" ></a>  		
		<p><strong>Título:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		Subida hace 4 minutos		
	</figure>

	<figure class="foto">
		<a href="Detalle_foto.php?id=20"><img src="img/foto7.jpg" alt="imagen no encontrada" style="width:175px;height:175px;" ></a>  		
		<p><strong>Título:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		Subida hace 4 minutos			
	</figure>

	<figure class="foto">
		<a href="Detalle_foto.php?id=3"><img src="img/foto8.jpg" alt="imagen no encontrada" style="width:175px;height:175px;" ></a>  		
		<p><strong>Título:</strong> inserte</p>
		<p><strong>Fecha:</strong> 22/4/2017 </p>
		<p><strong>País:</strong> inserte </p>
		Subida hace 4 minutos			
	</figure>
	<a id="texto-registro" href="Busqueda_avanzada.php" > Atrás </a> 

<?php
require_once("footer.inc");
?>
	