<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Proposito</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Sistema para reservar citas medicas."/>
		<meta name="keywords" content="cita medica, consulta medica, doctor, paciente, consulta medica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="26 de julio de 2017"/>

		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script src="../Javascript/Funciones_varias.js"></script>  
	</head>	
	<body>		
		<div style="min-height: 70%;">	
			<header class="fixed_1">		
	        	<?php
	            	include("../header/headerPrincipal.php");
	        	?>	
	        </header>		
			<div class="ocultarMenu"  onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
				<h3>¿Que es ConsultaMedica.com.ve?</h3>
				<img class="imagen_1" src="../images/images_1.jpg" alt=" "/>
				<p class="Inicio_7">Es una plataforma orientada al sector salud, que ofrece a pacientes el acceso a su historia médica en modo de solo lectura; y a los especialista una poderosa herramienta de gestión donde pueden llevar un registro de sus pacientes con sus respectivos diagnosticos y tratamientos farmacológicos, un control en tiempo real de las citas reservadas a su consulta, asi como la capacidad de interconectar a pacientes, especialistas y centros de salud.</p>

				<p class="Inicio_7">Esta plataforma optimisa la gestión de la data generada en el acto médico, evitando la atención atomizada en la que cada profesional trabaja desde su especialidad de manera fragmentada, integrando al paciente, al especialista y al centro de salud en un solo lugar.</p>

				<img class="imagen_3" src="../images/images_4.jpeg" alt=" "/>

				<p class="Inicio_7">Nuestra plataforma pone las bases para unificar la data que el especialista ha ido agregando en cada consulta, en cada visita a la sala de emergencias y en cada entrada a la sala quirurgica, de recuperación o de cuidadados intensivos; de modo que en tiempo real, la información acerca de los antecedentes clínicos con que cuenta un paciente esté disponible en el momento que se requiera por personal pertinente y autorizado</p>  				
				<p class="Inicio_7" style=" background-color:  ; padding-bottom: 5%;">Si la información está en manos de los prestadores de salud y si esta se integra en los diferentes sitios de atención, se ayuda a reducir los atrasos por comunicación, los reingresos y los gastos hospitalarios, mejorando significativamente la atención en salud.</p>
			</div>
		</div>	
		<footer>	
	       	<?php
	           	include("../header/footer.php");
	       	?>
        </footer>  	
	</body>
</html>
		