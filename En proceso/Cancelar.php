<?php   
	include("conexion/Conexion_BD.php");

	//Se verifica si el usuario esta memorizado en las cookie de su computadora y las compara con la BD de ConsultaMedica, para recuperar sus datos y autorellenar el formulario de inicio de sesion, las cookies de registro de usuario se crearon en validarSesion.php
	if(isset($_COOKIE["id_paciente"]) AND isset($_COOKIE["marcaAleatoria"])){//Si la variable $_COOKIE esta establecida o creada se entra aqui para recuperar la informacion del usuario y autorellenar el formulario
		
		$Cookie_paciente = $_COOKIE["id_paciente"];
	    $Cookie_marca_aleatoria = $_COOKIE["marcaAleatoria"];

		if($_COOKIE["id_paciente"]!="" || $_COOKIE["marcaAleatoria"]!=""){
			$Consulta_1 = "SELECT * FROM usuario_paciente WHERE ID_PR= '$Cookie_paciente' AND Aleatorio='$Cookie_marca_aleatoria' ";
			$Recordset= mysqli_query($conexion,$Consulta_1);
			$Autorizado= mysqli_fetch_array($Recordset);
			$usuario = $Autorizado["usuarioPaciente"];
			$clave = $Autorizado["clavePaciente"];
			echo "Usuario= " . $usuario . "<br>";
			echo "Clave= " . $clave . "<br>";
		}
		
		?>

		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>ConsultaMedica</title>
				<meta charset="utf-8"/>
				<meta name="description" content="formulario para cancelar citas medicas"/>
				<meta name="keywords" content="cancelar citas, cancelar consulta medica"/>
		        <meta http-equiv="Last-Modified" content="0"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
		        
				<link rel="stylesheet" type="text/css" href="css/EstilosCitasMedicas.css"/> 
				<link rel="shortcut icon" type="image/png" href="images/logo.png">
		        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_CitasMedicas.css"> 

		        <script src="Javascript/Ajax_Cancelar.js"></script>
		        <script src="Javascript/validar_Campos.js"></script> 
		        <script src="Javascript/Funciones_varias.js"></script>

		        <style>
					@import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
				</style>

		    </head>	
		    <body onload="autofocusCancelar()"><!--La función autofocusCancelar se encuentra en Funciones_varias.js-->
				<div style="min-height: 81%;">	
			    	<header>
			        	<?php
			            	include("vista/headerPrincipal.php");
			        	?>
			        </header>
					<h3>Cancelar cita médica</h3>
					<div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
						<div id="cancelar_4">
					        <p class="Inicio_1">Debe contar con una cuenta en nuestra plataforma para poder cancelar una cita médica, sino posee datos de identificación registrese.</p>
		                	<a class="btn_3" href="registro/registroPaciente.php">Registrarse</a>
				        </div>
						<div class="Afili_3">
					    	<form action="" autocomplete="off" class="Afiliacion_0">
					            <fieldset  class="Afiliacion_4">
						            <legend>Cancelar Cita</legend>
						          	<label>Usuario</label>
						            <input type="text" name="usuario" id="Usuario" value="<?php echo $usuario;?>">
						            <br/><br/>
					                <label>Contraseña</label>
					                <input type="password" name="password" id="Password" value="<?php echo $clave;?>">
					                <br>
					                <input  type="checkbox" id="Recordar" name="recordar">
						            <label for="Recordar">Recordar usuario y contraseña en este equipo.</label>
						            <!--<a href="RecuperarClavePaciente.php" class="">Olvido su contraseña</a>-->
						            <br><br>
						            <input type="button" value="Buscar" class="buttonCancelar" onclick="llamar_Cancelar()";>
					                <!-- Funcion que se encuentra en Ajax_Cancelar.js -->	   
					            </fieldset> 	                
						    </form>
					    </div>	
					    <div id="Cancelar_5"></div><!-- recibe respuesta de Cancelar_AJAX por medio de llamar_Cancelar()-->
					</div>
				</div>
				<footer>	
			       	<?php
			           	include("vista/footer.php");
			       	?>
		        </footer>
		    </body>
		</html>
		<?php
	}
	else{ ?>     <!--Si el participante no esta recordado en el equipo entra aqui.-->
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>ConsultaMedica</title>
				<meta charset="utf-8"/>
				<meta name="description" content="formulario para cancelar citas medicas"/>
				<meta name="keywords" content="cancelar citas, cancelar consulta medica"/>
		        <meta http-equiv="Last-Modified" content="0"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
		        
				<link rel="stylesheet" type="text/css" href="css/EstilosCitasMedicas.css"/> 
				<link rel="shortcut icon" type="image/png" href="images/logo.png">
		        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_CitasMedicas.css"> 

		        <script src="Javascript/Ajax_Cancelar.js"></script>
		        <script src="Javascript/validar_Campos.js"></script> 
		        <script src="Javascript/Funciones_varias.js"></script>

		        <style>
					@import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
				</style>

		    </head>	
		    <body onload="autofocusCancelar()"><!--La función autofocusCancelar se encuentra en Funciones_varias.js -->
				<div style="min-height: 81%;">	
			    	<header>
			        	<?php
			            	include("vista/headerPrincipal.php");
			        	?>
			        </header>
					<h3>Cancelar cita médica</h3>
					<div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
						<div id="cancelar_4">
					        <p class="Inicio_1">Debe contar con una cuenta en nuestra plataforma para poder cancelar una cita médica, sino posee datos de identificación registrese.</p>

		                	<a class="btn_3" href="registro/registroPaciente.php">Registrarse</a>
				        </div>
						<div  class="Afili_3">
					    	<form action="" autocomplete="off" class="Afiliacion_0">
					            <fieldset class="Afiliacion_4">
						            <legend>Cancelar Cita</legend>
						          	<label>Usuario</label>
						            <input type="text" name="usuario" id="Usuario">
						            <br/>
					                <label>Contraseña</label>
					                <input type="password" name="password" id="Password">
					                <br>
					                <input  type="checkbox" id="Recordar" name="recordar">
						            <label for="Recordar"><span class="recordar">Recordar usuario y contraseña en este equipo.</span></label>
						            <!--<a href="RecuperarClavePaciente.php" class="">Olvido su contraseña</a>-->
						            <br><br>
						            <input type="submit" value="Buscar" class="buttonCancelar" onclick="llamar_Cancelar()";>
					                <!-- Funcion que se encuentra en Ajax_Cancelar.js -->	   
					            </fieldset> 	
					        </form>
					    </div>	
					    <div id="Cancelar_5"></div><!-- recibe respuesta de llamar_Cancelar()-->
					</div>
				</div>
				<footer>	
			       	<?php
			           	include("vista/footer.php");
			       	?>
		        </footer>
		    </body>
		</html> 
			


		<?php
	} ?>