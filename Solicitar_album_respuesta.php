<?php
$title = "Solicitar álbum respuesta - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>


<h3>Álbum solicitado con los siguientes datos:</h3>
<form class="formulario-vertical">
	<p>
		<label for="nombre-usuario">Nombre del álbum:</label> 
     	<input type="text" name="nombre-album" id="nombre-album" disabled value="<?php echo $_POST["nombre"];?>">
    </p>
    <p>
		<label for="titulo">Título:</label> 
     	<input type="text" name="titulo" id="titulo" disabled value="<?php echo $_POST["titulo"];?>">
    </p>
    <p>
		<label for="texto-adicional">Texto adicional:</label> 
     	<input type="text" name="texto-adicional" id="texto-adicional" disabled value="<?php echo $_POST["texto-adicional"];?>">
    </p>
    <p>
		<label for="email">Email:</label> 
     	<input type="text" name="email" id="email" disabled value="<?php echo $_POST["email"];?>">
    </p>
    <p>
		<label for="direccion">Calle:</label> 
     	<input type="text" name="direccion" id="direccion" disabled value="<?php echo $_POST["direccion"];?>">
    </p>
    <p>
     	<label for="numero">Número:</label> 
     	<input type="number" name="numero" id="numero" disabled value="<?php echo $_POST["numero"];?>">
    </p>
    <p>
		<label for="cp">Código postal:</label> 
     	<input type="number" name="cp" id="cp"disabled value="<?php echo $_POST["cp"];?>">
    </p>
    <p>
		<label for="localidades">Localidad:</label> 
     	<input type="text" name="localidades" id="localidades" disabled value="<?php echo $_POST["localidades"];?>">
    </p>
    <p>
		<label for="provincias">Provincia:</label> 
     	<input type="text" name="provincias" id="provincias" disabled value="<?php echo $_POST["provincias"];?>">
    </p>
    <p>
		<label for="telefono">Teléfono:</label> 
     	<input type="number" name="telefono" id="telefono" disabled value="<?php echo $_POST["telefono"];?>">
    </p>
    <p>
		<label for="color-portada">Color portada:</label> 
     	<input type="Color" name="color-portada" id="color-portada" disabled value="<?php echo $_POST["color-portada"];?>">
    </p>
    <p>
		<label for="cantidad">Número de copias:</label> 
     	<input type="number" name="cantidad" id="cantidad" disabled value="<?php echo $_POST["cantidad"];?>">
    </p>
    <p>
		<label for="resolucion">Resolucion:</label> 
     	<input type="text" name="resolucion" id="resolucion" disabled value="<?php echo $_POST["resolucion"] . "PI" ;?>">
    </p>
    <p>
		<label for="album-pi">Álbum de PI:</label> 
     	<input type="text" name="album-pi" id="album-pi" disabled value="<?php echo $_POST["album-pi"];?>">
    </p>
    <p>
		<label for="fecha-recepcion">Fecha de recepción:</label> 
     	<input type="date" name="fecha-recepcion" id="fecha-recepcion" disabled value="<?php echo $_POST["fecha-recepcion"];?>">
    </p>
    <p>
		<label for="color">Impresión en:</label> 
     	<input type="text" name="color" id="color" disabled value="<?php echo $_POST["color"];?>">
    </p>

</form>

<p>
<?php
$paginas = 10;
$fotos= 10;
$precio_final = 0;
if ($paginas < 4){
	$precio_final = $paginas * 0.10;
} 
if($paginas >= 5 && $paginas < 11){
	$precio_final = $paginas * 0.08;
}
if($paginas > 10){
	$precio_final = $paginas * 0.07;
}
if($_POST["color"] == "color"){
	$precio_final = $precio_final + $fotos * 0.05;
}
if ($_POST["resolucion"] >= 300) {
	$precio_final = $precio_final + $fotos * 0.02;
}
?>
<h3>Precio final:</h3> 
<form>
	<p>
     	<input type="text" name="precio_final" id="precio_final" disabled value="<?php echo $precio_final . "€";?>">
    </p>
</form>
</p>

<?php

if($_POST["color"] == "color"){
    $color =true;
}
if ($_POST["color"] == "blancoynegro") {
    $color = false;
}


$sentencia = 'INSERT INTO solicitudes
VALUES (NULL, "' . $_POST["album"] . '","' . $_POST["nombre"] . '","' . $_POST["titulo"] . '","' . $_POST["descripcion"] . '","' . $_POST["email"] .'", "' . $_POST["direccion"] .'","' . $_POST["color-portada"] .'","' . $_POST["cantidad"] .'","' . $_POST["resolucion"] .'","' . $_POST["fecha-recepcion"] .'","' . $color .'", CURRENT_TIME() 
,"' . $precio_final .'")';


  // Ejecuta la sentencia SQL
  if(!mysqli_query($link, $sentencia)){
    echo "Error: no se pudo realizar la inserción";
  }
  
?>

 <?php
require_once("footer.inc");
?>
