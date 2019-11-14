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
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_CitasMedicas.css"/> 


        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
        </style>         
    </head>     
    <body>
        <div class="Principal">
            <header>
                <a href="index.html"><h1>ConsultaMedica.com.ve</h1></a>
                <input type="checkbox" id="MenuRes">
                <label for="MenuRes" class="ComandoMenu">Menu</label>
                <nav class="menuResponsive">
                    <ul>
                        <li class="listaMostrar"><a href="index.html">Inicio</a>
                        <li><a href="Proposito.html">Propósito</a></li>
                        <li><a href="Noticias.html">Noticias</a></li>
                        <li><a href="Afiliacion.html">Afiliación</a></li>
                        <li class="listaOculta"><a href="Beneficios.html">Beneficios</a></li>
                        <li><a href="Viajes_3.html">Contacto</a></li>
                        <li class="listaOculta"><a href="Citas_2.php">Pedir Cita</a></li>
                        <li><a href="Cancelar.html">Cancelar Cita</a></li>
                        <li><a href="directorio.php">Directorio</a></li>
                        <li><a href="DoctorAfiliado.php">Membresía</a></li>
                    </ul>
                </nav>
                <h3>Afiliación</h3>
            </header>
            <div id="Doctores_1">
                <?php
                //---------------------------------------------------------------------------------------------------------------    
                   // captura todos los campos del formulario.
                    $Nombre=$_POST["nombre"];//se recibe desde Afiliacion.php
                    $Apellido=$_POST["apellido"];
                    $Cedula=$_POST["cedula"];
                	$Telefono=strip_tags(trim($_POST["telefono"]));
                    $email_to=$_POST["correo"];
                    $Licencia=$_POST["licencia"];
                    $Especialidad=$_POST["especialidad"];
                    $Estado=$_POST["estado"];
                    $Ciudad=$_POST["ciudad"];
                    $Direccion=$_POST["direccion"];


                   /* echo $Nombre ."<br>";
                    echo $Apellido ."<br>";
                    echo $Cedula ."<br>";
                    echo $Telefono ."<br>";
                    echo $email_to ."<br>";
                    echo $Licencia ."<br>";
                    echo $Especialidad ."<br>";
                    echo $Estado ."<br>";
                    echo $Ciudad ."<br>";
                    echo $Direccion ."<br>";*/

                    //Configuración de envio de correo de afiliación ConsultaMedica.com.ve
                    $Correo = "ConsultaMedica";//correo de quien responde a la solicitud de afiliación, es lo que le va a llegar al solicitante
                    $email_subject = "Afiliación ConsultaMedica.com.ve";//asunto que llega a la bandeja del solicitante
                    $email_message = 

                    '<html>'.
                        '<div>'.
                            '<img src="http://www.consultamedica.com.ve/images/logo.jpg" alt="Logotipo"/>'.
                        '</div>'.
                        '<h1>Confirmación de afiliación</h1>'. 
                            '<p>Se ha aperturado una cuenta a su nombre en ConsultaMedica.com.ve. Para continuar con el proceso de afiliación se han generado un nombre de usuario y una contraseña, los cuales se recomienda cambiar por datos de su preferencia una vez que haya iniciado sesión.</p>'.
                            
                            '<p>Una vez que haya entrado en su cuenta seleccione la opcion Mi Perfil del menu principal e introduzca su información personal y profesional que será mostrada en el directorio, al igual que podrá modificar los datos de acceso a su cuenta'.

                            '<hr>'.

                            '<p>Los pagos mensuales por membresía tienen un costo de 300.000 Bs y cubren la carga de 100 pacientes y la petición ilimitada de citas médicas, cabe aclarar que si su cartera de pacientes sobrepasa los 100, se registrarán cargos adicionales por 2.000 Bs. por cada paciente adicional</p>'. 
                            
                            '<p>Su pago queda agendado para los dias xx de cada mes, y se realizarán por medio de la siguiente cuenta bancaria</p>'.
                    
                            '<div style="background-color: ; width: 80%;">'.
                                '<table>'.
                                        '<tr>'.
                                            '<td style="font-weight: bold;">Banco</td>'.
                                            '<td style="padding: 1% 0%;text-align: left;">Mercantil</td>'.
                                        '</tr>'. 
                                        '<tr>'.
                                            '<td style="font-weight: bold;">Cuenta Corriente</td>'.
                                            '<td style="padding: 1% 0%;text-align: left;">0105-0062-101062261763</td>'.
                                        '</tr>'.  
                                        '<tr>'.
                                            '<td style="font-weight: bold;">Titular</td>'.
                                            '<td style="padding: 1% 0%;text-align: left;">Pablo Cabeza</td>'.
                                        '</tr>'. 
                                        '<tr>'.
                                            '<td style="font-weight: bold;">Cedula</td>'.
                                            '<td style="padding: 1% 0%;text-align: left;">12.728.036</td>'.
                                        '</tr>'.  
                                        '<tr>'.
                                            '<td style="font-weight: bold;">Correo</td>'.
                                            '<td style="padding: 1% 0%;text-align: left;">pc@consultamedica.com.ve</td>'.
                                        '</tr>'.
                                '</table>'. 
                            '</div>'.

                            '<p>Una vez realizado el pago de afiliación, envie a pc@consultamedica.com.ve los datos de su deposito o transferencia..</p>'.

                             '<p>No dude en contactarnos si le surgen dudas o tiene algun aporte que nos ayude a mejorar la dinamica de nuestro sitio web. </p>'.
                 


                        '</body>'.
                    '</html>';                      



                    //para el envío en formato HTML 
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=utf-8\r\n";
//$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
                    $headers .= 'From: ConsultaMedica' . "\r\n";/*quien envia el correo, en este caso consultamedica*/
 
                    $envio= mail($email_to, $email_subject, $email_message, $headers);
                    
                    /*if($envio){
                        echo "Mensaje enviado";
                    }
                    else{
                        echo "Mensaje no enviado" . "<br>";
                        echo $Correo;
                    }*/

                echo "<b><p class='Inicio_1'>$Nombre,</p></b>" . "<p class='Inicio_1'> Hemos recibido su solicitud de afiliación.
         Los términos y políticas de la membresía han sido enviados al correo que usted ha proporcionado. Si desea aclarar algun término puede escribirnos a pc@consultamedica.com.ve</p>";
//--------------------------------------------------------------------------------------------------------------------------------
//envio de correo automatico con Terminos y Condiciones.
                   
            ?>

            </div>
            
            <div class="Doctores_2">
                    <h6>Gracias por confiar en nosotros.</h6>
                    <h3>ConsultaMedica.com.ve</h3>
            </div> 
            </div>  

        <footer style=" background-color: ; position: relative; ">
            <div style="background-color:; bottom: 0pt; margin-left: 0%; position: absolute; width: 100%;">
                <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela (+58) 0424-516.59.38</p>
            </div> 
        </footer>
            
            <?php
            include("conexion/Conexion_BD.php");
            mysqli_query($conexion,"SET NAMES 'utf8'");
        
                $insertar2= "INSERT INTO afiliacion(nombre,apellido,cedula,telefono,correo,especialidad,licencia,estado,ciudad,direccion) VALUES('$Nombre','$Apellido','$Cedula','$Telefono','$email_to','$Especialidad','$Licencia','$Estado','$Ciudad','$Direccion')";
                
                mysqli_query($conexion,$insertar2);
            ?>
