<?php
$title = "Registro - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
require_once("filtro.inc");
?>



<h1 class="cabecera">Tus datos son:</h1>
<p> 
Usuario: <b><?php echo $_POST["usuario"];?></b>
</p>
<p> 
Sexo: <b><?php if(isset($_POST["sexo"])){ echo $_POST["sexo"]; }?></b>
</p>
<p> 
Fecha de nacimiento: <b><?php echo $_POST["fecha_nacimiento"];?></b>
</p>
<p> 
Ciudad: <b><?php echo $_POST["ciudad"];?></b>
</p>
<p> 
País: <b><?php echo $_POST["pais"];?></b>
</p>
<p> 
Contraseña: <b><?php echo $_POST["psw"];?></b>
</p>
<p> 
Correo: <b><?php echo $_POST["email"];?></b>
</p>
<p> 
Foto : <b>
</p>
 
</p>




<?php
if($_SESSION["insertar_modificar"] == 1){ //significa que todo es correcto y debe modificar
//aqui iria lo de insertar
   // Sentencia SQL: inserta un nuevo libro
  $sentencia = 'UPDATE usuarios SET 
  nomUsuario =  $_POST["usuario"] . '","' . $_POST["psw"] . '","' . $_POST["email"] . '","' . $_POST["sexo"] . '",
    "' . $_POST["fecha_nacimiento"] . '","' . $_POST["ciudad"] . '","'. $_POST["pais"] .'",
    "", CURRENT_TIME())';
  // Ejecuta la sentencia SQL
  if(!mysqli_query($link, $sentencia)){
    echo "Error: no se pudo realizar la inserción";
  }



}


require_once("footer.inc");
?>
