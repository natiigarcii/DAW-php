<?php
$title = "Resgistro respuesta - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>

<h3>Usuario registrado con los siguientes datos:</h3>

<p>
Usuario: <b><?php echo $_POST["usuario"];?></b>
</p>
<p>
Contraseña: <b><?php echo $_POST["pwd"];?></b>
</p>
<p>
Email: <b><?php echo $_POST["email"];?></b>
</p>
<p>
Sexo: <b><?php echo $_POST["sexo"];?></b>
</p>
<p>
Fecha de nacimiento: <b><?php echo $_POST["fecha_nacimiento"];?></b>
</p>
<p>
Ciudad: <b><?php echo $_POST["ciudad"];?></b>
</p>
<p>
País de residencia: <b><?php echo $_POST["pais"];?></b>
</p>
<p>
Foto de perfl: <b><?php echo $_POST["foto_perfil"];?></b>
</p>

 <?php
require_once("footer.inc");
?>
	
