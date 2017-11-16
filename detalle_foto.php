<?php
$title = "Registro - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

$id = $_GET['id'];

if(isset($_SESSION["nombre"])){

	if(($id % 2)!=0){
	?>
		<h2>Página detalle foto</h2>
		<figure class="foto_grande">
			<img src="img/foto1.jpg" alt="imagen no encontrada">  		
			<p><strong>Título:</strong> inserte</p>
			<p><strong>Fecha:</strong> 22/4/2017 </p>
			<p><strong>País:</strong> inserte </p>
			<p><strong>Álbum:</strong> inserte </p>
			<p><strong>Subida por:</strong> inserte </p>
			Subida hace 4 minutos		
		</figure>

	<?php
	}
	else{
	?>

	<h2>Página detalle foto</h2>
		<figure class="foto_grande">
			<img src="img/foto2.jpg" alt="imagen no encontrada">  		
			<p><strong>Título:</strong> inserte</p>
			<p><strong>Fecha:</strong> 22/4/2017 </p>
			<p><strong>País:</strong> inserte </p>
			<p><strong>Álbum:</strong> inserte </p>
			<p><strong>Subida por:</strong> inserte </p>
			Subida hace 4 minutos		
		</figure>



	?<?php
	}
}
else{

		header('Location: inicio.php');		
		exit;


}
	?>




 <?php
require_once("footer.inc");
?>
	
