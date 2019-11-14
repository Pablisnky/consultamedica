<?php   
    include("../Clases/muestraError.php");
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
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="stylesheet" type="text/css" href="../iconos/icono_lupa_carga_descarga/lupa_carga_descarga.css"/><!--galeria icomoon.io-->  
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/ajaxBuscador.js"></script>
 
    </head>	    
    <body>
        <div>
            <header class="fixed_1">
                <?php 
                    include("../header/headerPrincipal.php");
                ?>
            </header>
            <div style="max-height: ;" class="ocultarMenu" onclick="ocultarMenu()"><!-- contenedor se hace click y se oculta el menu responsive; ocultarMenu() se encuentra en Funciones_varias.js-->      
                <h3>Medicamentos</h3> 
                <div class="sesion_0">
                    <img class="medicam" src="../images/images_3.jpg" alt="ConsultaMedica.com.ve"/>
                    <br>
                    <div id="Perfil_11">
                        <div id="Perfil_12">
                            <a href="../registro/medicamentosBuscar.php"><span class="icon-search"></span></a>
                            <a class="Inicio_24" href="../registro/medicamentosBuscar.php">Ofertados.</a>
                        </div>
                        <div id="Perfil_12">
                            <a  href="../registro/medicamentosSolicitar.php"><span class="icon-search"></span></a>
                            <a class="Inicio_24" href="../registro/medicamentosSolicitar.php">Solicitados.</a> 
                        </div>
                    </div>
                    <p class="Inicio_27">Solicita o busca tus medicinas por medio de nuestra plataforma.</p>
                </div>
            </div>
        </div>
        <footer>
            <?php
                include("../header/footer.php");
            ?>
        </footer>
    </body>
</html>