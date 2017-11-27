<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>


<h2>Resultado de búsqueda</h2>

<?php

	$link = @mysqli_connect('localhost','root','admin', 'pibd'); 
	if(!$link) {
		echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
		echo '</p>';
	exit;
	} 


	$sentencia = 'SELECT * from fotos f , paises p where p.idPais = f.pais ';
	
	if(($_POST['titulo']) != ""){
		echo "<b><p>Titulo:</b>" . $_POST["titulo"]. "</p>";
		$sentencia = $sentencia . 'and f.titulo like "%' . $_POST["titulo"] . '%"';
	}
	if(($_POST['fecha']) != ""){
		echo "<b><p>Fecha:</b>" . $_POST["fecha"]. "</p>";
		$sentencia = $sentencia . 'and f.fRegistro like "%' . $_POST["fecha"] . '%"';
	}
	if(($_POST['pais']) != ""){
		echo "<b><p>País:</b>" . $_POST["pais"] . "</p>";
		$sentencia = $sentencia . 'and p.nomPais like "%' . $_POST["pais"] . '%"';
	}

	// Ejecuta una sentencia SQL
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
	exit;

	}

	$numrows = mysqli_num_rows($resultado);
	
	if ($numrows == 0){
		echo '<p>No se han encontrado coincidencias con los datos solicitados</p>';
	}

	while($fila = mysqli_fetch_assoc($resultado)) {
		echo ' 
		<figure class="foto">
		<a href="Detalle_foto.php?id=11"><img src="' . $fila['fichero'] . '" alt="imagen no encontrada" style="width:175px;height:175px;" ></a>  		
		<p><strong>Título:</strong>'. $fila['titulo'] .'</p>
		<p><strong>Fecha:</strong>'. $fila['fRegistro'] .'</p>
		<p><strong>País:</strong>'. $fila['nomPais'] .'</p>
		Subida hace 4 minutos		
		</figure>
		';
	}



?>
	<a id="texto-registro" href="Busqueda_avanzada.php" > Atrás </a> 

<?php
require_once("footer.inc");
?>
	