<?php
$title = "Registro - Pickle";
$pag = 2;
require_once("cabecera.inc");
require_once("inicio.inc");
require_once("filtro.inc");

?>




<?php
if($_SESSION["insertar_modificar"] == 1){ 

$msgError = array(0 => "No hay error, el fichero se subió con éxito",
        1 => "El tamaño del fichero supera la directiva
        upload_max_filesize el php.ini",
        2 => "El tamaño del fichero supera la directiva
        MAX_FILE_SIZE especificada en el formulario HTML",
        3 => "El fichero fue parcialmente subido",
        4 => "No se ha subido un fichero",
        6 => "No existe un directorio temporal",
        7 => "Fallo al escribir el fichero al disco",
        8 => "La subida del fichero fue detenida por la extensión");
        if($_FILES["foto_perfil"]["error"] > 0)
        {
        // echo "Error: " . $msgError[$_FILES["foto_perfil"]["error"]] . "<br />";
        }
        else
        {

        /*
        echo "Nombre original: " . $_FILES["foto_perfil"]["name"] . "<br />";
        echo "Tipo: " . $_FILES["foto_perfil"]["type"] . "<br />";
        echo "Tamaño: " . ceil($_FILES["foto_perfil"]["size"] / 1024) . " Kb<br />";
        echo "Nombre temporal: " . $_FILES["foto_perfil"]["tmp_name"] . "<br />";
        */

        if(file_exists('img/'.$_FILES["foto_perfil"]["name"])){
            $i = 1;
            while(file_exists('img/'.$i."_".$_FILES["foto_perfil"]["name"])){
            $i++;
            }
            $_FILES["foto_perfil"]["name"] = $i."_".$_FILES["foto_perfil"]["name"];
            move_uploaded_file($_FILES["foto_perfil"]["tmp_name"],
            "img/" . $_FILES["foto_perfil"]["name"]);
            //echo'El fichero contiene un nombre ya en uso <br/>';
            //echo 'Almacenado con el nombre '. $_FILES["foto_perfil"]["name"];
             
        }
        else
        {
        move_uploaded_file($_FILES["foto_perfil"]["tmp_name"],
        "img/" . $_FILES["foto_perfil"]["name"]);
        //echo "Almacenado en: " . "img/" . $_FILES["foto_perfil"]["name"];
        }
        }

        if($_FILES["foto_perfil"]["name"] == ""){
            $sentencia = "SELECT foto FROM usuarios WHERE idUsuario = '". $_SESSION["id"]  . "' ";
            if (!($resultado = @mysqli_query($link, $sentencia))) {
              echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
              echo '</p>';
              exit;
            }

            $infor = $resultado->fetch_assoc();
            $foto= $infor['foto'];

        }
        else{
           $foto = "./img/" . $_FILES["foto_perfil"]["name"]; 
        }

        
//significa que todo es correcto y debe modificar
//aqui iria lo de insertar

   // Sentencia SQL: inserta un nuevo libro

	$sentencia = 'SELECT idPais FROM paises WHERE nomPais like "' . $_POST["pais"] . '"'; 
	$idPais = 0;
	if(!($resultado = @mysqli_query($link, $sentencia))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                echo '</p>';
              exit;
    } 
              
              // Recorre el resultado
    while($fila = mysqli_fetch_assoc($resultado)) {
    	$idPais = $fila['idPais'];
    }
    mysqli_free_result($resultado);
    

  $sentencia = 'UPDATE usuarios SET nomUsuario = "' . $_POST["usuario"] . '", clave = "'. $_POST["psw"] .'", email = "'. $_POST["email"] . '", 
  sexo = "'. $_POST["sexo"] .'", fNacimiento = "'. $_POST["fecha_nacimiento"] .'",ciudad = "'. $_POST["ciudad"] .'",
  pais = "'. $idPais . '", foto = "'. $foto . '" where idUsuario = "' . $_SESSION["id"]. '"';

  if(!mysqli_query($link, $sentencia)){
    echo "Error: no se pudo realizar el UPDATE";
  }
}

if(isset($_POST["borrar_foto"]) == true){

        $sentencia3 = 'SELECT foto FROM usuarios WHERE idUsuario="' . $_SESSION["id"] . '"';
        if(!($resultado3 = @mysqli_query($link, $sentencia3))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                echo '</p>';
              exit;
        } 

         $info2 = $resultado3->fetch_assoc();

        $file = $info2["foto"];


          unlink($file);
          $sentencia2 = 'UPDATE usuarios SET foto="" where idUsuario = ' . $_SESSION["id"]; 
          
          if(!mysqli_query($link, $sentencia2)){
            echo "Error: no se pudo realizar el UPDATE";
          }
           mysqli_free_result($resultado3);


}

 $sentencia4 = 'SELECT foto FROM usuarios WHERE idUsuario="' . $_SESSION["id"] . '"';
        if(!($resultado4 = @mysqli_query($link, $sentencia4))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                echo '</p>';
              exit;
        } 

         $info4 = $resultado4->fetch_assoc();

        $file4 = $info4["foto"];




?>



<h1 class="cabecera">Tus datos modificados son:</h1>
<form class="formulario-vertical" method="post" action="respuesta_registro.php">      
        <p><label for="usuario"> Nombre de usuario: </label>
          <input type="text" name="usuario" id="usuario" disabled value="<?php echo $_POST["usuario"];?>">
        </p>

        <p><label for="psw">Contraseña:</label> 
          <input type="password" name="psw" id="psw" disabled value="<?php echo $_POST["psw"];?>">
        </p>

        <p><label for="email">Email:</label>
          <input type="email" name="email" id="email" disabled value="<?php echo $_POST["email"];?>">
        </p>

        <p>
          <label for="sexo-respuesta">Sexo:</label>
          <input type="text" name="sexo-respuesta" id="sexo-respuesta" disabled value="<?php echo $_POST["sexo"];?>">
        </p>

        <p>
         <label for="fecha_nacimiento">Fecha de nacimiento:</label>
         <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" disabled value="<?php echo $_POST["fecha_nacimiento"];?>">
        </p>

        <p>
        <label for="ciudad">Ciudad:</label>
         <input type="text" name="ciudad" id="ciudad"  disabled value="<?php echo $_POST["ciudad"];?>">
        </p>

        <p>
          <label for="pais">País de residencia:</label>
          <input type="text" name="pais" id="pais" disabled value="<?php echo $_POST["pais"];?>">
        </p>

        <p>
          <label for="foto_perfil">Foto de perfil:</label>
   <?php echo'<img id="foto_detalle" src="'. $file4 . '" alt="imagen no encontrada" />';?>

        </p>
     
  </form>



<?php
require_once("footer.inc");
?>
