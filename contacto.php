<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Inicio Sesión</title>
		<meta charset="utf-8"/>
		<meta name="description" content="contactar a viajes en carro particular pagando por puesto occupado entre las ciudades de Barquisimeto y Caracas"/>
		<meta name="keywords" content="viajes privados, Caracas, Barquisimeto, viaje particular, servicio de taxi, HOREBI diseños de web_site"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="css/EstilosCitasMedicas.css"/>  
        <link rel="shortcut icon" type="image/png" href="images/logo.png">
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_CitasMedicas.css"> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
        </style>         
    </head>	    
    <body>
    	<header>
            <a href="index.html" style="text-decoration: none"><h1>ConsultaMedica.com.ve</h1></a>
                <input type="checkbox" id="MenuRes">
                <label for="MenuRes" class="ComandoMenu">Menu</label>
                <nav class="menuResponsive" >
                    <ul>
                        <li><a href="Proposito.html" >Propósito</a></li>
                        <!--<li><a href="Noticias.html">Noticias</a></li>-->
                        <li><a href="Afiliacion.php">Afiliación</a></li>
                        <li><a href="Beneficios.html">Beneficios</a></li>
                        <li><a href="Viajes_3.html">Contacto</a></li>
                        <li><a href="Citas_2.php">Pedir Cita</a></li>
                        <li><a href="Cancelar.html">Cancelar Cita</a></li>
                        <li><a href="directorio.php">Directorio</a></li>
                        <li><a href="DoctorAfiliado.php">Registro</a></li>
                    </ul>
                </nav>
            <h3>Contáctenos</h3>
        </header> 
        <div class="Principal">
    	    <div id="AcuseContacto_01">    
                <?php
                    $nombre=$_POST["nombre"];
                    $apellido=$_POST["apellido"];
                    $correo=$_POST["correo"];
                    $Asunto=$_POST["asunto"];
                    $Contenido=$_POST["contenido"];

                    /*echo $nombre . "<br>";
                    echo $apellido . "<br>";
                    echo $correo . "<br>";
                    echo $Contenido . "<br>";*/

                    echo "<p class='Inicio_1'><b class='Inicio_1'>$nombre.</b> Recibimos su mensaje, en breve estaremos respondiendo su solicitud.</p>";
                ?>   
        	</div>
        	<div class="Doctores_2">
                <h6>Gracias por confiar en nosotros.</h6>
                <h3>ConsultaMedica.com.ve</h3>
            </div>
        </div>    
        <footer>
                <p class="p_2">Sitio web desarrollado por HOREBI, San Felipe_Yaracuy_Venezuela_(+58) 0424-516.59.38</p>
        </footer> 

<?php

if(isset($_POST["correo"])) {
 
    // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados
 
    $email_to = "pc@consultamedica.com.ve";
 
    $email_subject = $Asunto;  

    $email_message = $Contenido;

    $headers = 'From: '.$correo."\r\n".
 
    'Reply-To: '.$correo."\r\n" .
     
    'X-Mailer: PHP/' . phpversion();
     
    @mail($email_to, $email_subject, $email_message, $headers); 

    $email_message = "Nombre: ". clean_string($nombre) . "\n";
 
    function died($error) {
         // si hay algún error, el formulario puede desplegar su mensaje de aviso
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
        echo "Detalle de los errores.<br /><br />";  
        echo $error."<br /><br />";
        echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulario estén llenos
 
    if(!isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['correo']) || !isset($_POST['telefono']) || !isset($_POST['asunto'])){
            died('Lo sentimos pero parece haber un problema con los datos enviados.');       
    }

 

    //En esta parte se verifica que la dirección de correo sea válida 
    
    /* $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email_from)) {
 
        $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
    }

    //En esta parte se validan las cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$nombre)) {
 
        $error_message .= 'El formato del nombre no es válido<br />';
    }
 
    if(!preg_match($string_exp,$apellido)) {
 
    $error_message .= 'el formato del apellido no es válido.<br />';
 
    }
 
    if(strlen($message) < 2) {
 
        $error_message .= 'El formato del texto no es válido.<br />';
 
    }
 
    if(strlen($error_message) > 0) {
 
        died($error_message);
 
    }*/
 
    //A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo

    $email_message = "Contenido del Mensaje.\n\n";
 
    function clean_string($string) {
 
        $bad = array("content-type","bcc:","to:","cc:","href");
 
        return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "Nombre: ".clean_string($nombre)."\n";
 
    $email_message .= "Apellido: ".clean_string($apellido)."\n";
 
    $email_message .= "Email: ".clean_string($correo)."\n";
 
    $email_message .= "Teléfono: ".clean_string($telefono)."\n";
 
    $email_message .= "Mensaje: ".clean_string($asunto)."\n";
  
    //Se crean los encabezados del correo
 
    //header("location:contactenos.php"); //me lleva a la pagina deseada 

} 
?>

