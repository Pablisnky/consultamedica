<!DOCTYPE html>
<html lang="es">
	<head>
		<title>ConsultaMedica</title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="Directorio médico con servicio mejorado de reservas de citas en linea, y alojamiento de historias medicas.">
		<meta name="keywords" content="cita medica, consulta medica, doctor, paciente, consulta medica, directorio medico">
		<meta name="author" content="Pablo Cabeza">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="26 de julio de 2017">

		<meta name="MobileOptimized" content="width">
		<meta name="HandheldFriendly" content="true">

		<link rel="stylesheet" type="text/css" href="css/EstilosCitasMedicas.css">
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="css/MediaQuery_CitasMedicas.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="css/MediaQuery_CitasMedicas_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="css/MediaQuery_CitasMedicas_1280px.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1400px)" href="css/MediaQuery_CitasMedicas_Otras.css">
		<link rel="manifest" href="manifest.json">
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
		<link rel="shortcut icon" type="image/png" href="images/logo.png">
        
		<style>
       		@media screen and (max-width: 325px){
				#Inicio p{
					background-color: ;
					width: 95%;
					font-size:11px;
					text-align: center;
				}
				footer{
					border-top-color: #040652;
					border-top-style: solid;
					border-top-width: 2px;
					margin-top: 10% !important;
				}
			}

      		@media (min-width: 326px) and (max-width: 800px){/*aplicaría en cualquier medio con dimensiones entre 800 y 1300 píxeles.*/
				#Inicio p{
					background-color: ;
					width: 95%;
					font-size:11px;
					text-align: center;
				}
				footer{
					border-top-color: #040652;
					border-top-style: solid;
					border-top-width: 2px;
				}
			}
    	</style>

    	<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117655324-4"></script>
		<script>
		  	window.dataLayer = window.dataLayer || [];
		  	function gtag(){dataLayer.push(arguments);}
		  	gtag('js', new Date());

		  	gtag('config', 'UA-117655324-4');
		</script> 
	</head>	
	<body>
		<?php
	    if(!isset($_GET["V_1"])){//si no Hemos recibido V_1, porque venimos de afuera de la pagina se muestra la ventana modal
			  ?>
			<input type="checkbox" id="cerrar">
			<label class="modalEtiquetaCerrar" for="cerrar">Cerrar</label>
			<div class="modal" id="Modal_1" onclick="ocultar()">
				<br><br>
				<a href="index.php?V_1=<?php echo base64_encode($variableip);?>"><h2>ConsultaMedica.com.ve</h2></a>
				<div id="Inicio">
					<!-- <img class="imagen_2SF" src="images/efemeride/Osteosporosis.jpg" alt="ConsultaMedica.com.ve"/> -->
					<p>Los planes de pago para afiliaciónes estan suspendidos desde el 10/01/2019, solo el plan de inicio esta activo, y es totalmente gratuito.</p>
				</div>
			</div>
			<div class="modalFondo">
				<div class="ocultar_2">
					<nav class="menuResponsiveIndex">
						<ul>
	                		<li title="Registre una cuenta de usuario"><a href="vista/Afiliacion.php">Afiliacion</a></li>
							<li title="Busque o solicite medicamentos"><a href="vista/medicamentos.php">Medicinas</a></li>
							<li title="Solicite una cita médica"><a href="vista/directorio.php">Directorio médico</a></li>
							<li title="Inicie sesión en su cuenta de usuario"><a href="vista/ingresar.php">Ingresar</a></li>
	                	</ul>
					</nav>
				</div>	
				<img class="imagen_2" src="images/images_3.jpeg" alt="ConsultaMedica.com.ve"/>
				<a href="vista/Proposito.php"><h1 class="index_1">ConsultaMedica.com.ve</h1></a>				
				<a class="Inicio_4" href="vista/Afiliacion.php">Escale su consulta al siguiente nivel con nuestra aplicación.</a> 
			</div>
			<footer class="index_4"><!-- solo en dispositivos moviles -->	
				<div class="index_2">
                    <a class="Inicio_22" href="vista/medicamentos.php">Medicinas</a>
                    <a class="Inicio_22" href="vista/directorio.php">Directorio Médico</a>
                    <a class="Inicio_22" href="vista/ingresar.php">Ingresar</a>
                </div>
            </footer>	
	    	<?php
		} 
		else{//Si Hemos recibido Validar, porque venimos de adentro de la pagina no se muestra la ventana modal ?>
			<div class="modalFondo">
				<div class="ocultar_2">
					<nav class="menuResponsiveIndex">
						<ul>
	                		<li title="Registre una cuenta de usuario"><a href="vista/Afiliacion.php">Afiliacion</a></li>
							<li title="Busque o solicite medicamentos"><a href="vista/medicamentos.php">Medicinas</a></li>
							<li title="Solicite una cita médica"><a href="vista/directorio.php">Directorio médico</a></li>
							<li title="Inicie sesión en su cuenta de usuario"><a href="vista/ingresar.php">Ingresar</a></li>
	                	</ul>
					</nav>
				</div>	
				<img class="imagen_2" src="images/images_3.jpeg" alt="ConsultaMedica.com.ve"/>
				<a href="vista/Proposito.php"><h1 class="index_1">ConsultaMedica.com.ve</h1></a>
				<a class="Inicio_4" href="vista/Afiliacion.php">Escale su consulta al siguiente nivel con nuestra aplicación.</a><!-- <a class="Inicio_4" href="vista/Afiliacion.php">Escale su consulta al siguiente nivel con nuestra aplicación.</a>  
				<span id="Button"><a class="Inicio_4" href="video/promocion_1.mp4" target="video" controls onclick="handler_2()">¡Asi funcionamos!</a></span>  

				<div style="" >
					 <iframe style="position: absolute; top: 20%;left: 20%; display: ;" name="video"  id="Aparecer_1" width="60%" height="40%"></iframe> 
				</div>-->
			</div>
			<footer class="index_4"><!-- solo en dispositivos moviles -->	
				<div class="index_2">
                    <a class="Inicio_22" href="vista/medicamentos.php">Medicinas</a>
                    <a class="Inicio_22" href="vista/directorio.php">Directorio Médico</a>
                    <a class="Inicio_22" href="vista/ingresar.php">Ingresar</a>
                </div>
            </footer>		
       		<?php 
       	} ?>
	</body>
</html>

<script src="convoca_SW.js"></script>

<script type="text/javascript">	 
	function ocultar(){
		document.getElementById("Modal_1").style.display= "none";
		document.getElementsByTagName("label")[0].style.display= "none";		
	}

/*	function handler_1(){
		document.getElementById("Aparecer_2").style.display= "block";//Muestra el div que contiene el video		
	}

	//oculta elemento al hacer click por fuera del mismo
	document.addEventListener("click", function(e){
		//obtiendo informacion del DOM para  
		var clic = e.target;
		if(Aparecer_1.style.display == "block" && clic != Button){
			Aparecer_1.style.display = "none";
		}
	},
	false);
*/
</script>