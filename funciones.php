<?php
//
    function comprobarlong($text, $min, $max){
        $len = strlen($text);
        if($len<$min){
            return FALSE;
        }
        elseif ($len>$max) {
            return FALSE;
        }
        return TRUE;
    }
    function error($texto, $url){
        $urlLocal = "../";
        echo '<div class="card">
        <p class="pCentrado">
            ' . $texto . '
        </p>
        <div id="botones">
            <a class="button" href='. $urlLocal . $url .'> Atrás </a>
        </div>
        </div>';
        die();
    }
    function getthumb($nombreimg, $dirOrigen){
        // Obtenemos imagen a miniaturizar
	    $path = $dirOrigen . '/' . $nombreimg;
        $mime = getimagesize($path);
        // Mismos tamaños para todas
        $new_width = 200;
        $new_height = 100;
        // Obtenemos tipo img
        if($mime['mime']=='image/png') 
            $src_img = imagecreatefrompng($path); 
        if($mime['mime']=='image/jpg')
            $src_img = imagecreatefromjpeg($path); 
        if($mime['mime']=='image/jpeg')
            $src_img = imagecreatefromjpeg($path); 
        if($mime['mime']=='image/pjpeg')
            $src_img = imagecreatefromjpeg($path); 
        // Tamaños originales de la foto
        $x_origen = imageSX($src_img);
        //echo " <br> xorigen: " .$x_origen;
        $y_origen = imageSY($src_img);
        //echo " <br> yorigen: " .$y_origen;
        // Calcula tamaño foto mini
        if ($x_origen > $y_origen) {
            $calc_width = $new_width;
            $calc_height = intval($y_origen * $calc_width / $x_origen);
        } else {
            $calc_height = $new_height;
            $calc_width = intval($x_origen * $calc_height / $y_origen);
        }
        $dest_x = intval(($new_width - $calc_width) / 2);
        $dest_y = intval(($new_height - $calc_height) / 2);
        // Creamos thumbnail y copiamos la imagen
        //echo "<br>dst x: " . $dest_x;
        //echo "<br>dst y: " . $dest_y;
	    $dst_img = ImageCreateTrueColor($calc_width,$calc_height);
        imagecopyresampled($dst_img,$src_img,0,0,0,0,$calc_width,$calc_height,$x_origen,$y_origen);
        // La guardamos en la siguiente ruta
        $new_thumb_loc =  "../images/Thumbs/_thumb" . $nombreimg;
 
        if($mime['mime']=='image/png')
            $result = imagepng($dst_img,$new_thumb_loc,8); 
        if($mime['mime']=='image/jpg')
            $result = imagejpeg($dst_img,$new_thumb_loc,80);
        if($mime['mime']=='image/jpeg')
            $result = imagejpeg($dst_img,$new_thumb_loc,80);
        if($mime['mime']=='image/pjpeg')
            $result = imagejpeg($dst_img,$new_thumb_loc,80);
	    imagedestroy($dst_img);
        imagedestroy($src_img);
        // Se devuelve boolean
        return $result;
    }
    
    function uuid($prefix){
        $chars = md5(uniqid(mt_rand(), true));
        $uuid  = substr($chars,0,8)."-";
        $uuid .= substr($chars,8,4)."-";
        $uuid .= substr($chars,12,4)."-";
        $uuid .= substr($chars,16,4)."-";
        $uuid .= substr($chars,20,12);
        return $prefix.$uuid;
    }
    ?>