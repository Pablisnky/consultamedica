<!DOCTYPE html>
<html lang="es">
	<head>
		<title>ConsultaMedica</title>
		<meta charset="utf-8"/>
		<meta name="description" content="formulario para cancelar citas medicas"/>
		<meta name="keywords" content="cancelar citas, cancelar consulta medica"/>
        <meta http-equiv="Last-Modified" content="0"/>
		<meta name="author" content="HOREBI"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/>

        <script src="../Javascript/Funciones_varias.js"></script>

        <style>
			@import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
		</style>

    </head>	
    <body>
    	<div style=" min-height: 85%;">
	    	<header class="fixed_1">           
                <?php
                    include("../vista/headerPrincipal_2.php");
                ?>				
			</header>
            <div  class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive--> 
				<h3>Centros de Salud</h3>
			    <p class="Inicio_1">Publique el directorio médico y los servicios de su centro de salud y aproximece a los usuarios de ConsultaMedica.com.ve</p>
                <div class="comer_1" style=" background-color:  ; padding-bottom: 5%;">
                    <a href="../contactenos.php" class="btn_publicaciones">Contactenos</a>
                </div>
            </div>
		</div>
		<footer>          
            <?php
                include("../vista/footer.php");
            ?>  
        </footer>
    </body>