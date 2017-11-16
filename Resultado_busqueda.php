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

	$entra1 = false;
	$entra2 = false;
	$entra3 = false;

	if(($_POST['titulo']) != ""){
		echo "<b><p>Titulo:</b>" . $_POST["titulo"]. "</p>";
		$entra1 = true;
	}
	if(($_POST['fecha']) != ""){
		echo "<b><p>Fecha:</b>" . $_POST["fecha"]. "</p>";
		$entra2 = true;
	}
	if(($_POST['pais']) != ""){
		echo "<b><p>País:</b>" . $_POST["pais"] . "</p>";
		$entra3 = true;
	}


	if ($entra1 == false && $entra2 == false && $entra3 == false){
		$sentencia = 'SELECT distinct * from fotos f , paises p where p.idPais = f.pais';
	}

	if ($entra1 == false && $entra2 == false && $entra3 == true){
		$sentencia = 'SELECT distinct * from fotos f , paises p where p.nomPais ="' . $_POST["pais"] . '" and p.idPais = f.pais and p.idPais = f.pais';
	}

	if ($entra1 == false && $entra2 == true && $entra3 == false){
		$sentencia = 'SELECT distinct * from fotos f , paises p where fecha ="' .  $_POST["fecha"] . '" and p.idPais = f.pais';
	}

	if ($entra1 == false && $entra2 == true && $entra3 == true){
		$sentencia = 'SELECT distinct * from fotos f , paises p where fecha ="' .  $_POST["fecha"] . '" and p.nomPais ="' . $_POST["pais"] . '" and p.idPais = f.pais';
	}



	if ($entra1 == true && $entra2 == false && $entra3 == false){
		$sentencia = 'SELECT distinct * from fotos f , paises p where titulo = "' . $_POST["titulo"] . '" and p.idPais = f.pais';
	}

	if ($entra1 == true && $entra2 == false && $entra3 == true){
		$sentencia = 'SELECT distinct * from fotos f , paises p  where titulo = "' . $_POST["titulo"] . '" and p.nomPais ="' . $_POST["pais"] . '" and p.idPais = f.pais';
	}

	if ($entra1 == true && $entra2 == true && $entra3 == false){
		$sentencia = 'SELECT distinct * from fotos f , paises p where titulo = "' . $_POST["titulo"] . '" and fecha ="' . $_POST["fecha"] . '" and p.idPais = f.pais';
	}

	if ($entra1 == true && $entra2 == true && $entra3 == true){
		$sentencia = 'SELECT distinct * from fotos f , paises p where titulo = "' . $_POST["titulo"] . ' and p.nomPais ="' . $_POST["pais"] . '" and p.idPais = f.pais';
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
	