<?php
$title = "Solicitar album - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
if(isset($_SESSION["nombre"])){
?>

<p>En este formulario se contienen los datos necesarios para realizar  un álbum impreso</p>

<table>
	<caption><h2>Tarifas</h2></caption>
	<tr>
		<th>Concepto</th>
		<th>Tarifa</th>
	</tr>
	<tr>
		<td>0-4 Páginas</td>
		<td>0.10€ x página</td>
	</tr>
	<tr>
		<td>5-10 Páginas</td>
		<td>0.08€ x página</td>
	</tr>
	<tr>
		<td>11+ Páginas</td>
		<td>0.07€ x página</td>
	</tr>
	<tr>
		<td>Blanco y negro</td>
		<td>0€</td>
	</tr>
	<tr>
		<td>Color</td>
		<td>0.05€ x foto</td>
	</tr>
	<tr>
		<td>Resolución 300+ dpi</td>
		<td>0.02€ x foto</td>
	</tr>
</table>

<form class="formulario-vertical" action="Solicitar_album_respuesta.php" method="post">
		  <p id="label-nombre"><label for="nombre" >Nombre:</label> 
		  <input type="text" maxlength="50" required name="nombre" id="nombre" placeholder="su nombre"></p>

		  <p id="label-titulo"><label for="titulo">Titulo del album</label> 
		  <input type="search" maxlength="200" required name="titulo" id="titulo" placeholder="que lo describa"></p>

		 <p> <label id="label-txt-adicional" for="texto-adicional">Texto adicional</label> 
		  <textarea maxlength="4000" cols="100" rows="5" name="texto-adicional" id="texto-adicional" placeholder="dedicatoria, descripción de su contenido, etc."> </textarea></p>

		  <p><label for="email">Correo electrónico</label> 
		  <input type="email" maxlength="200" required name="email" id="email" placeholder="tu email"></p>

		  <p><label for="direccion">Dirección</label> 
		  	<input type="text" name="direccion" id="direccion" placeholder="calle">
		  	<input type="text" name="numero" placeholder="numero" > 
		  	<input type="text" name="cp" placeholder="CP" >

		  	<select name="localidades" >
		  		<option value="Localidad">Localidad</option>
		  		<option value="Novelda">Novelda</option>
		  		<option value="Humanes">Humanes</option>
		  		<option value="Elche">Elche</option>
		  	</select>
		  	<select name="provincias" >
		  		<option value="Provincia">Provincia</option>
		  		<option value="Alicante">Alicante·</option>
		  		<option value="Madrid">Madrid</option>
		  		<option value="Albacete">Alicante·</option>
		  	</select>

		    </p>

		    <p><label for="telefono">Teléfono </label> 
		    	<input type="text" name="telefono" id="telefono"> 
		    </p>

		  	<p> <label for="color-portada">Color de portada</label> 
		 		 <input type="Color" name="color-portada" id="color-portada"></p>


		 	<p><label for="cantidad">Copias</label>

				<input type="number" name="cantidad" id="cantidad" min="1" max="20">
			</p>
		

     		<p><label for="resolucion">Resolución</label> 
     	 		<input type="number" name="resolucion" id="resolucion" min="150" max="900" step="150" value="150" >dpi
     		</p>

     		<p><label>Album de PI</label> 
     	 	<select id="album" name="pais">

                <?php

		              $aux = $_SESSION["nombre"];
		              // Ejecuta una sentencia SQL
		              
		              $sentencia = 'SELECT * FROM albumes a, usuarios u WHERE u.nomUsuario = "' . $aux . '" and u.idUsuario = a.usuario';

		              if(!($resultado = @mysqli_query($link, $sentencia))) {
		                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		                echo '</p>';
		              exit;		              } 
		              
		              // Recorre el resultado
		             
		              while($fila = mysqli_fetch_assoc($resultado)) {
		              echo '<option value="' . $fila['titulo'] . '">' . $fila['titulo'] . '</option>' ;   
		              }
		            mysqli_free_result($resultado);
		            ?>
		            	</select>
		           </p>

		   
     	 	

     	 	<p><label for="fecha-recepcion">Fecha de recepción</label> 
     	 		<input type="date" name="fecha-recepcion" id="fecha-recepcion">
     	 	</p>


     	 	<p><label>¿Impresión a color?</label>
     	 		<input type="radio" name="color" value="color" checked>Color 
  				<input type="radio" name="color" value="blancoynegro">Blanco y negro

     	 	</p>

     	 	<p>
       			<input type="submit" class="enviar-registro" value="Enviar">
       			<input type="submit" class="enviar-registro" value="Cancelar">
     		 </p>

		</form>	

<?php
		 }
	else{
		header('Location: acceso_denegado.php');
	}
require_once("footer.inc");
?>
	
