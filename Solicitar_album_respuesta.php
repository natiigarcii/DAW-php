<?php
$title = "Solicitar álbum respuesta - Pickle";
require_once("cabecera.inc");
require_once("inicio.inc");
?>
<h3>Álbum solicitado con los siguientes datos:</h3>
<p>
Nombre álbum: <b><?php echo $_POST["nombre"];?></b>
</p>
<p>
Título: <b><?php echo $_POST["titulo"];?></b>
</p>
<p>
Texto adicional: <b><?php echo $_POST["texto-adicional"];?></b>
</p>
<p>
Email: <b><?php echo $_POST["email"];?></b>
</p>
<p>
Direccion:
</p>
<p>
Calle: <b><?php echo $_POST["direccion"];?></b> Número: <b><?php echo $_POST["numero"];?></b>  
</p>
<p>
Código postal: <b><?php echo $_POST["cp"];?></b>
</p>
<p>
Localidad: <b><?php echo $_POST["localidades"];?></b>
</p>
<p>
Provincia: <b><?php echo $_POST["provincias"];?></b>
</p>
<p>
Teléfono: <b><?php echo $_POST["telefono"];?></b>
</p>
<p>
Color de portada: <b><?php echo $_POST["color-portada"];?></b>
</p>
<p>
Cantidad de copias: <b><?php echo $_POST["cantidad"];?></b>
</p>
<p>
Resolución: <b><?php echo $_POST["resolucion"];?></b>
</p>
<p>
Álbum de PI: <b><?php echo $_POST["album-pi"];?></b>
</p>
<p>
Fecha de recepción: <b><?php echo $_POST["fecha-recepcion"];?></b>
</p>
<p>
Impresion en: <b><?php echo $_POST["color"];?></b>
</p>
<h4>Precio Final</h4>
<p>

</p>
 <?php
require_once("footer.inc");
?>
