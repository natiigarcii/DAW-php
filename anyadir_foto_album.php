<?php
$title = "Añadir Foto - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

if(isset($_SESSION["nombre"])){
?>
	
 <h2> Añadir foto a álbum</h2>
 <form  method="post" action="anyadir_foto_album_respuesta.php">
 <fieldset id="formulario_vertical">
                <legend>Añadir foto </legend>
                <p>
                <label class="label"><b>Título:</b></label>
                <input type="text"  name="titulo"/>
                </p>

                <p>
                <label class="label" for="descripcion"><b>Descripcion:</b></label>
                <input type="text"  name="descripcion" id="descripcion"/>
                </p>

                <p>
         		<label for="fecha_nacimiento">Fecha:</label>
         		<input type="date" name="fecha" id="fecha" required>
        		</p>
                
               <p>
		          <label for="pais">País de residencia:</label>
		          <select id="pais" name="pais">

		            <?php
		            
		              // Ejecuta una sentencia SQL
		              
		              $sentencia = 'SELECT idPais , nomPais FROM paises order by nomPais asc';
		              if(!($resultado = @mysqli_query($link, $sentencia))) {
		                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		                echo '</p>';
		              exit;
		              } 
		              
		              // Recorre el resultado
		              while($fila = mysqli_fetch_assoc($resultado)) {
		              echo '<option value="' . $fila['idPais'] . '">' . $fila['nomPais'] . '</option>' ;   
		              }

		              	mysqli_free_result($resultado);
						
		            ?>
		          </select>
		        </p>

		      	 
		        <p>
		        <label class="label"><b>Albúm:</b></label>
                <select id="album" name="album">

                <?php
		            
		              // Conecta con el servidor de MySQL

		              $aux = $_SESSION["nombre"];
		              // Ejecuta una sentencia SQL
		              
		              $sentencia = 'SELECT * FROM albumes a, usuarios u WHERE u.nomUsuario = "' . $aux . '" and u.idUsuario = a.usuario';

		              if(!($resultado = @mysqli_query($link, $sentencia))) {
		                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		                echo '</p>';
		              exit;		              } 
		              
		              // Recorre el resultado
		             
		              while($fila = mysqli_fetch_assoc($resultado)) {
		              echo '<option value="' . $fila['idAlbum'] . '">' . $fila['titulo'] . '</option>' ;   
		              }
					mysqli_free_result($resultado);
		            ?>
		            	</select>
		           </p>

		   <p>

          <label for="foto_perfil">Foto:</label>
          <input type="file" name="foto" id="foto">
        </p>
 </fieldset>
 <p>
          <input type="submit" class="enviar-registro" value="Subir">
        </p>        </form>

<?php
}

else{
	header('Location: acceso_denegado.php');
}
require_once("footer.inc");
?>
	
