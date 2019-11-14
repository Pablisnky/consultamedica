<?php   
    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);

        include("../conexion/Conexion_BD.php");   
?> 

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Inicio Sesión</title>
		<meta http-equiv="content-type"  content="text/html";  charset="utf-8"/>
		<meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
		<meta name="keywords" content="consulta, medico, doctor, directorio"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/ajaxBuscador.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
        </style> 
    </head>	    
    <body>
        <div style="min-height: 85%;">
            <header>
                <?php 
                    include("../vista/headerPrincipal_2.php");
                ?>
            </header>
            <div onclick="ocultarMenu()"><!-- contenedor se hace click y se oculta el menu responsive; ocultarMenu() se encuentra en Funciones_varias.js-->  
                <h3 class="encabezadoSesion">Importante</h3>

                <div class="sesion_4">
                    <p class="Inicio_14">Debe estar registrado para poder cargar insumos a la plataforma.</p>
                    <div class="sesion_6">
                        <a class="btn_3" href="../ingresar.php">Ingresar</a>
                    </div>
                    <hr class="linea_2">     
                </div> 

                <div class="sesion_4">
                    <p class="Inicio_14">¿No tiene una cuenta registrada en ConsultaMedica.com.ve?</p>
                    <div class="sesion_6">
                        <a class="btn_3" href="registroPaciente.php">Registrarse</a>
                    </div>     
                </div>
            </div>
        </div>
        <footer>
            <?php
                include("../vista/footer.php")
            ?>
        </footer>
    </body>
</html>

