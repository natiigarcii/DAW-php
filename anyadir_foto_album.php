<?php
$title = "Añadir Foto - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

if(isset($_SESSION["nombre"])){
?>
	
 <h2> Añadir foto a álbum</h2>
 <form action="/*" method="post" >
 <fieldset id="formulario_vertical">
                <legend>Añadir foto </legend>
                <p>
                <label class="rlabel"><b>Título:</b></label>
                <input type="text"  name="titulo"/>
                </p>

                <p>
                <label class="rlabel" for="descripcion"><b>Descripcion:</b></label>
                <input type="text"  id="descripcion"/>
                </p>

                <p>                
                <label for="fecha"><b>Fecha:</b></label>
                <input type="text"  id="fecha"/>
            	</p>
                
               <p>
		          <label for="pais">País de residencia:</label>
		          <select id="pais" name="pais">

		            <?php
		            
		              // Conecta con el servidor de MySQL
		              $link = @mysqli_connect('localhost','root','admin', 'pibd');
		              if(!$link) {
		                echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
		                echo '</p>';
		                exit;
		              } 
		              // Ejecuta una sentencia SQL
		              
		              $sentencia = 'SELECT nomPais FROM paises order by nomPais asc';
		              if(!($resultado = @mysqli_query($link, $sentencia))) {
		                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
		                echo '</p>';
		              exit;
		              } 
		              
		              // Recorre el resultado
		              while($fila = mysqli_fetch_assoc($resultado)) {
		              echo '<option value="' . $fila['nomPais'] . '">' . $fila['nomPais'] . '</option>' ;   
		              }

		              mysqli_free_result($resultado);
		              // Cierra la conexión
		              mysqli_close($link);
		            
		            ?>
		          </select>
		        </p>

		      	 
		        <p>
		        <label class="rlabel"><b>Albúm:</b></label>
                <select id="album">

                <?php
		            
		              // Conecta con el servidor de MySQL
		              $link = @mysqli_connect('localhost','root','admin', 'pibd');
		              if(!$link) {
		                echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
		                echo '</p>';
		                exit;
		              } 

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
		              // Cierra la conexión
		              mysqli_close($link);
		            
		            ?>
		            	</select>
		           </p>

		   <p>

          <label for="foto_perfil">Foto:</label>
          <input type="file" name="foto" id="foto">
        </p>
 </fieldset>
 <p>
          <input type="submit" class="enviar-registro" value="Enviar">
          <input type="submit" class="enviar-registro" value="Cancelar" onclick="window.location.href='Inicio.html'">
        </p>        </form>

<?php
}

else{
	header('Location: acceso_denegado.php');
}
require_once("footer.inc");
?>
	
