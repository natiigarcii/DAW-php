<?php
$title = "Inicio - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>


<h2>Resultado de búsqueda</h2>

<?php

	$sentencia = 'SELECT * from fotos where';
	$entra1 = false;
	$entra2 = false;
	$entra3 = false;
	if(($_POST['titulo']) != ""){
		echo "<b><p>Titulo:</b>" . $_POST["titulo"]. "</p>";
		$sentencia .= 'titulo like "' . $_POST["titulo"] - '"';
		$entra1 = true;
	}
	if(($_POST['fecha']) != ""){
		echo "<b><p>Fecha:</b>" . $_POST["fecha"]. "</p>";
		if ($entra1 == false){
			$sentencia .= 'fRegistro like "' . $_POST["fecha"] - '"';
		}
		else{
			$sentencia .= 'and fRegistro like "' . $_POST["fecha"] - '"';
		}
		$entra2 = true;
	}
	if(($_POST['pais']) != ""){
		echo "<b><p>País:</b>" . $_POST["pais"] . "</p>";
		if ($entra2 == false){
			$sentencia .= 'pais like "' . $_POST["pais"] - '"';
		}
		else{
			$sentencia .= 'and pais like "' . $_POST["pais"] - '"';
		}
		$entra3 = true;
	}

	if ($entra1 == false && $entra2 == false && $entra3 = false;){
		$sentencia = SELECT * from fotos;
	}


	$link = @mysqli_connect('localhost','root','admin', 'pibd'); 

	if(!$link) {
		echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
		echo '</p>';
	exit;
	} 
	// Ejecuta una sentencia SQL
	if(!($resultado = @mysqli_query($link, $sentencia))) {
		echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		echo '</p>';
	exit;

	}

	while($fila = mysqli_fetch_assoc($resultado)) {
		echo ' 
		<figure class="foto">
		<a href="Detalle_foto.php?id=11"><img src="' . $fila['fichero'] . '" alt="imagen no encontrada" style="width:175px;height:175px;" ></a>  		
		<p><strong>Título:</strong>'. $fila['titulo'] .'</p>
		<p><strong>Fecha:</strong>'. $fila['fRegistro'] .'</p>
		<p><strong>País:</strong>'. $fila['pais'] .'</p>
		Subida hace 4 minutos		
		</figure>
		';
	}



?>
	<a id="texto-registro" href="Busqueda_avanzada.php" > Atrás </a> 

<?php
require_once("footer.inc");
?>
	