<?php
$title = "Registro - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");

?>

<?php
 if(isset($_SESSION["nombre"])){
        $id = $_SESSION["id"];
  
    $sentencia = "SELECT * FROM usuarios WHERE idUsuario = '$id' ";
     if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    }
    $infor = $resultado->fetch_assoc();
    $usuario = $infor['nomUsuario'];
    $sexo = $infor['sexo'];
    if($sexo == 1){
        $sexo = "hombre";
    }else{
        $sexo = "mujer";
    }
    $fecha_n = $infor['fNacimiento'];
    $ciudad = $infor['ciudad'];
    $pais = $infor['pais'];
    $sentencia = "SELECT nomPais FROM paises WHERE idPais = '$pais'";
    if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
    }
    $aux = $resultado->fetch_assoc();
    $nomPais = $aux['nomPais'];

    $contrasenya = $infor['clave'];
    $correo = $infor['email'];
    $foto = $infor['foto'];
}
?>

<h1 class="cabecera">Tus datos son:</h1>
<form action="modificarDatos.php" class="formulario-vertical" method="post" id="cambio" enctype="multipart/form-data">
            <fieldset id="formulario_registro">
                <legend>Formulario de registro</legend>
                <?php
                if(isset($_GET["error"])){
                    echo $_GET["error"];
                }
                    echo '<p><label for="usuario">Usuario:</label>';
                    echo '<input type="text" name="usuario" id="usuario" value="'. $usuario .'"/></p>';                  
                    echo '<p><label for="sexo"">Sexo:</label>';
                    if($sexo == "Hombre"){
                        echo '<input type="radio" id="masculino" name="sexo" value="1" checked> Masculino';
                        echo '<input type="radio" id="femenino" value="2" name="sexo"> Femenino';
                    }else{
                        echo '<input type="radio" id="masculino" name="sexo" value="1" > Masculino';
                        echo '<input type="radio" id="femenino" name="sexo" value="2" checked> Femenino</p>';
                    }
                    echo '<p><label for="fecha_nacimiento">Fecha de nacimiento (dd/mm/aaaa):</label>';
                    echo '<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value = "'. $fecha_n .'" /></p>';

                    echo '<p><label for="ciudad" >Ciudad:</label>';
                    echo '<input type="text" name="ciudad" value="'. $ciudad .'" /></p>';

                    echo '<p><label for="pais">País:</label>';
                    echo '<input type="text" name="pais" value="'. $nomPais .'" /></p>';

                    echo '<p><label for="psw">Contraseña:</label>';
                    echo '<input type="password" name="psw" value="'. $contrasenya .'" /></p>';

                    echo '<p><label for="psw2">Repita la contraseña:</label>';
                    echo '<input type="password" name="psw2" /></p>';

                    echo '<p><label for="email">Correo electrónico:</label>';
                    echo '<input type="email" name="email" value="'. $correo .'" /></p>';

                    echo '<p><label for="foto_perfil">Foto:</label></p>';
                    echo' <p><img id="foto_detalle" src="'. $foto . '" alt="No tienes foto de perfil"/></p>';

                    echo '<p><label for="borrar_foto">Marca si desas borrar esta foto:</label>';
                    echo '<input type="checkbox" name="borrar_foto" /></p>';

                    echo '<p><input type="file" name="foto_perfil" value="'. $foto .'" /></p>';
      		
                ?>               
            </fieldset>
  		<input type="submit" class="modificarDatos.php" value="Enviar"> 
       </form>
<?php
require_once("footer.inc");
?>
	