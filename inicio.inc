

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

				
				$id = (isset($_GET['id']));			

				if($id==1){
					echo "<p>Hola, Bienvenido</p>";
					
			?>

					<a href="./album.php">Crear álbum</a>
					</br>
					<a href="./inicio.php">Ver perfil</a>
					</br>
					<a href="./cerrarsesionn.php">Cerrar sesión</a>
				
							
			<?php
					
				}
				
				else{

				
			?>
				<div id="container-usuario">
					<label for="nombre"><b>Usuario</b></label>		 
					<input type="text" placeholder="Introduce usuario" name="nombre" id="nombre" required>

					

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




