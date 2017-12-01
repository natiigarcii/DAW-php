 
<?php
	

$usuario = $_POST["usuario"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["pais"];
    $psw = $_POST["psw"];
    $psw2 = $_POST["psw2"];
    $email = $_POST["email"];
    $email= filter_var($email, FILTER_SANITIZE_EMAIL);
    if(isset($_POST["sexo"])){
        $sexo = $_POST["sexo"]; //ESTO ES PARA EVITAR UNDEFINEDS POR PANTALLA
    }else{
        $sexo = "";
    }       

?>

 <?php
 	$insertar = true;
    $mensajeError = "";

 //VALIDO EL USUARIO
    if(!filter_var($usuario, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\d_]{3,15}$/")))){
        $mensajeError = $mensajeError. "<h4><bold>[ERROR] 'Usuario' carácter inválido o longitud no permitida (3-15 caracteres)</bold></h4>";
        $insertar = false;
    }
//VALIDO LA CONTRASEÑA
    if(!filter_var($psw, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/(?=^.{6,15}$)(?=.*\d)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/")))){
        $mensajeError = $mensajeError. "<h4><bold>[ERROR] 'Contraseña' carácter inválido o logitud no permitida (6-15 carácteres), debe incluir una minúscula, una mayúscula y un número</bold></h4>";
        $insertar = false;
    }
    //COMPRUEBO QUE EL USUARIO HA METIDO LA CONTRASEÑA BIEN LAS DOS VECES
    if($psw != $psw2){
        $mensajeError = $mensajeError. "<h4><bold>[ERROR] Las contraseñas no coinciden</bold></h4>";
        $insertar = false;
    }
//VALIDO EL CORREO
    if(!filter_var($email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^\w+([\.-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/")))){
        $mensajeError = $mensajeError. "<h4><bold>[ERROR] 'Correo electrónico' formato inválido</bold></h4>";
        $insertar = false;
    }
//COMPRUEBO QUE SE HA SELECCIONADO SEXO
    if($sexo != 1 && $sexo != 2){
        $mensajeError = $mensajeError. "<h4><bold>[ERROR] Por favor, seleccione un sexo</bold></h4>";
        $insertar = false;
    }


    echo $mensajeError;
    $_SESSION["insertar_modificar"] = $insertar;
    if($insertar!=1){
        if ($pag == 1){
            header('Location: Registro.php?error=' . $mensajeError); 
        }
        else{
            header('Location: mis_datos.php?error=' . $mensajeError); 
        }
     
    }



?>