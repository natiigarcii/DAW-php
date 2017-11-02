<?php
session_start();
?>

<body>
	<header id="cabecera-global">
		<div id="container-logo">
			<a id="logo" href="inicio.php" title="Logo de la web. Si haces clic sobre el, irás a inicio">
			<img id="img-logo" src="img/logo.png">
			<img id="home" src="img/home.png">

			</a>
		</div>	

		<div id="container-busqueda">			
			<form action="./resultado_busqueda.html" method="get">
				<label for="busqueda"><i class="material-icons cosa">search</i></label>
				<input type="text" name="busqueda" id="busqueda" placeholder="Fotos, personas o grupos">
  				<input type="submit" id="enviar" value="Buscar" />
  			</form>
  			<a id="avanzada" href="./busqueda_avanzada.php">Búsqueda avanzada</a>
		</div>

		<div id="container-registro">
			<form  action="control_acceso.php" method="POST">

			<?php
				
				if((isset($_SESSION["nombre"]) && $_SESSION["nombre"] == "natalia" && $_SESSION["psw"] == "natalia") || isset($_COOKIE["nombre"])){
					
					if(isset($_SESSION["remember"]) || isset($_COOKIE["remember"])){
						$nombre = $_COOKIE["nombre"];
						if(isset($_COOKIE["fechaUltimaVisita"])){
							$fecha =  $_COOKIE["fechaUltimaVisita"];
							echo "<p>Hola " . $nombre . ", su última visita fue el " . $fecha . "</p>";
						}else{
							echo "<p>Hola " . $nombre . ", es tu primera visita. Bienvenido </p>";
						}
						?>	
							<a href="./crear_album.php">Crear álbum</a>
							</br>
							<a href="./usuario_registrado.php">Ver perfil</a>
							</br>
							<a href="./cerrarsesion.php">Cerrar sesión</a>
						<?php
					}else{
						echo "<p>Hola " . $_SESSION["nombre"] . ", usted ha elegido no guardar su sesión</p>";
						?>
							<a href="./crear_album.php">Crear álbum</a>
							</br>
							<a href="./usuario_registrado.php">Ver perfil</a>
							</br>
							<a href="./cerrarsesion.php">Cerrar sesión</a>
						<?php
					}
				}
				
				else{
			?>
				<div id="container-usuario">
					<label for="nombre"><b>Usuario</b></label>		 
					<input type="text" placeholder="Introduce usuario" name="nombre" id="nombre" required>
					<?php
						if (isset($_SESSION['message'])){
	    					echo $_SESSION['message'];
	    					unset($_SESSION['message']);
						}
					?>
					
				</div>
				<div id="container-psw">					
				 	<label for="psw"><b>Contraseña</b></label>
					<input type="password" placeholder="Introduce contraseña" name="psw" id="psw" required>
					<label for="remember"  >	
						<input type="checkbox" checked="checked" name="remember" id="remember"> 
						<span id="remember-id">Remember me </span>
					</label>
					<a class="forgot" id="has-olvidado" href="#">¿Has olvidado tu Contraseña?</a>
				</div>

					<input type="submit" name="enviar-login" value="Login" id="login">
		    		
		    		<a id="texto-registro" id="registrarse-login" href="Registro.php" > Registro </a>
		    		 <?php
				}
			?>
		    	
			</form>
		</div>
		
		
	</header> 




