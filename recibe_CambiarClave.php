<?php 
	include("conexion/Conexion_BD.php");
    
    //Se reciben todos los datos por medio de Ajax_Cancelar.js desde CambiarClave.php
	$Valor_A= $_POST["valor_A"];
	$Valor_B= $_POST["valor_B"];
	$Clave= $_POST["nuevaCLave"];

	//echo "Nueva Clave= " . $Clave . "<br>";
	//echo "Valor_A= " . $Valor_A . "<br>";
	//echo "Valor_B= " . $Valor_B . "<br>";
	//echo "Seleccion= " . $Seleccion . "<br>";

    //se cifra la contraseña con un algoritmo de encriptación
    $ClaveCifrada= password_hash($Clave,PASSWORD_DEFAULT);

//-------------------------------------------------------------------------------------------------------------------
//insercion de los datos capturados del formulario en la base de datos.
	    $Actualizar2= "UPDATE usuario_doctor SET claveDoctor= '$ClaveCifrada' WHERE valor_A= '$Valor_A' AND valor_B= '$Valor_B' ";
	    mysqli_query($conexion,$Actualizar2);

//----------------------------------------------------------------------------------------------------------------------- 
?>
<!DOCTYPE html/>
<html lang="es">
    <head>
        <title>Pacientes_Reservación</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Reservacion de citas medicas">
        <meta name="keywords" content="HOREBI, citas, reservacion, reservaciones, consulta, medico">
        <meta name="author" content="Pablo Cabeza">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css/EstilosCitasMedicas.css">
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="css/MediaQuery_CitasMedicas_movilModerno.css"/>  
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="shortcut icon" type="image/png" href="images/logo.png"> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower');
        </style>
    </head>
    <body>    
    	<header>        
	        <?php
	            include("vista/headerPrincipal.php");
	        ?>
	    </header>
	    <div class="Principal">
	     	<div class="RecibeClave">
	            <?php //echo "<b class= Inicio_5>$nombre</b>. <p class=Inicio_5> Su cambio de clave fue satisfactorio.</p>";?>
	            <!--con este codigo se pretende personalizar el mensaje-->

	            <p class=Inicio_13>Su cambio de clave fue satisfactorio.</p>              
	            <a class="btn_publicaciones" name="boton_Publicaciones" href="ingresar.php">Entrar</a>
	            <?php echo "<hr>";?>   
	        </div>   
	            
	        <div class="Pacientes_2">
	            <h6>Gracias por confiar en nosotros.</h6>
	            <h3>ConsultaMedica.com.ve</h3>
	        </div>
	    </div>
	    <footer>
            <?php
                include("vista/footer.php");
            ?>
	    </footer>     
    </body>