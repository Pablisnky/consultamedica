<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");
?> 

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Inicio Sesión</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
		<meta name="keywords" content="consulta, medico, doctor, directorio"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
        
        <script src="../Javascript/Funciones_varias.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:700');
        </style>         
    </head>	    
    <body>
        <div id="sesion_8"> 
            <header class="fixed_1">
                <?php
                    include("../header/headerDoctor.php");
                ?>
            </header>            
            <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
                <section style="margin-top: 15%;"> 
                    <p class="promo">Usted a ingresado a su cuenta desde un telefono movil, por razones de seguridad no es posible ingresar registros de nuevos diagnosticos desde estos equipos; conectese por medio de un computador e ingrese la información requerida.</p>

                    <div class="Pacientes_2">
                        <h6>Gracias por confiar en nosotros.</h6>
                        <h3>ConsultaMedica.com.ve</h3>
                    </div>

                    <div id="Perfil_05_A">
                        <div id="Perfil_07">
                            <a style='margin: auto; display: block;'  href='javascript:history.back(1)' class='buttonCuatro'>Regresar</a> 
                        </div>
                   </div>
                </section>  
            </div>
        </div> 
        <footer>
            <?php
                include("../vista/footer.php")
            ?>
        </footer> 
    </body>
</html>

