<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");

    include("../Clases/actualizar_precio.php");
        
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
                    include("../vista/headerDoctor.php");
                ?>
            </header>            
            <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
                <section style="margin-top: 10%;"> 
                    <p class="promo">Los datos de pago se decriben a continuación, realice una transferencia bancaria y envienos el código de la transferencia a la siguiente dirección: pc@consultamedica.com.ve</p>
                    <div class="promo_2">
                        <p class="Inicio_1">Banco Mercantil.</p>
                        <p class="Inicio_1">Cuenta Corriente.</p>
                        <p class="Inicio_1">0105-0062-10-1062261763</p>
                        <p class="Inicio_1"><?php echo $PrecioBasico?>;</p>
                        <p class="Inicio_1">Pablo Cabeza.</p>
                        <p class="Inicio_1">pc@consultamedica.com.ve</p>
                    </div>

                    <div class="Pacientes_2" style=" margin-top: 10%;">
                        <h6>Gracias por confiar en nosotros.</h6>
                        <h3>ConsultaMedica.com.ve</h3>
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

