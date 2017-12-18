<?php 
    $fotosdia= array(
    0=> null,
    1 => null,
    2 => null,
    3 => null,
    4 => null,
    5 => null,
    6 => null);

    for($dia = 0; $dia < 7; $dia++){
        $sentencia ="SELECT count(idFoto) as fotis from fotos where CAST(fRegistro AS DATE) = (CAST(CURRENT_TIME AS DATE)- ".$dia.")";
        date('d.m.Y',strtotime("-1 days"));
        if (!($resultado = @mysqli_query($link, $sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
        echo '</p>';
        exit;
        }

    $fila = mysqli_fetch_assoc($resultado);
    $fotosdia[$dia] = $fila["fotis"];
    }

    mysqli_free_result($resultado);
    //Creating the Image 
    $im = imagecreate(320, 200); 

    //Defining colors 
    $black = imagecolorallocate($im, 0, 0, 0); 
    $white = imagecolorallocate($im, 255, 255, 255); 
    $blue = imagecolorallocate($im, 24, 40, 80); 
    $purple = imagecolorallocate($im, 94, 58, 255); 
    $green = imagecolorallocate($im, 104, 255, 122); 
    $yellow = imagecolorallocate($im, 229, 255, 104); 
    $red = imagecolorallocate($im, 255, 40, 40); 
    $orange = imagecolorallocate($im, 255, 161, 40); 
    $blueclaro = imagecolorallocate($im, 40, 255, 247); 
    //Drawing white background and black outline 
    imagefilledrectangle($im, 0, 0, 319, 199, $white); 
    imagerectangle($im, 0, 0, 319, 199, $black); 


    //Drawing Vertical Bars 
    imagefilledrectangle($im, 2,    140-5*$fotosdia[6], 46, 140, $red); 
    imagefilledrectangle($im, 48,   140-5*$fotosdia[5], 92, 140, $orange); 
    imagefilledrectangle($im, 94,   140-5*$fotosdia[4], 138, 140, $yellow); 
    imagefilledrectangle($im, 140,  140-5*$fotosdia[3], 184, 140, $green); 
    imagefilledrectangle($im, 186,  140-5*$fotosdia[2], 230, 140, $blueclaro); 
    imagefilledrectangle($im, 232,  140-5*$fotosdia[1], 276, 140, $blue); 
    imagefilledrectangle($im, 278,  140-5*$fotosdia[0], 320, 140, $purple);

    //Printing out vertical Strings beneath each bar 
    imagestringup($im, 5, 15, 195, date('d.m',strtotime("-6 days")), $black); 
    imagestringup($im, 5, 61, 195, date('d.m',strtotime("-5 days")), $black); 
    imagestringup($im, 5, 107, 195, date('d.m',strtotime("-4 days")), $black); 
    imagestringup($im, 5, 153, 195, date('d.m',strtotime("-3 days")), $black); 
    imagestringup($im, 5, 199, 195, date('d.m',strtotime("-2 days")), $black); 
    imagestringup($im, 5, 245, 195, date('d.m',strtotime("-1 days")), $black); 
    imagestringup($im, 5, 291, 195, date('d.m',strtotime("-0 days")), $black); 

    imagestring($im, 5, 20, 140-5*$fotosdia[6]-20, $fotosdia[6], $black); 
    imagestring($im, 5, 66, 140-5*$fotosdia[5]-20, $fotosdia[5], $black); 
    imagestring($im, 5, 112,140-5*$fotosdia[4]-20, $fotosdia[4], $black); 
    imagestring($im, 5, 158,140-5*$fotosdia[3]-20, $fotosdia[3], $black); 
    imagestring($im, 5, 204,140-5*$fotosdia[2]-20, $fotosdia[2], $black); 
    imagestring($im, 5, 250,140-5*$fotosdia[1]-20, $fotosdia[1], $black); 
    imagestring($im, 5, 296,140-5*$fotosdia[0]-20, $fotosdia[0], $black); 
 
   // Activa el almacenamiento en el buffer de salida 
   ob_start(); 
   imagepng($im); 
   // ob_get_contents() devuelve el contenido del buffer de salida 
   $img_src = "data:im/png;base64," . base64_encode(ob_get_contents()); 
   // Limpia y deshabilita el buffer de salida 
   ob_end_clean(); 
 
   // Libera los recursos utilizados 
   imagedestroy($im); 
?>