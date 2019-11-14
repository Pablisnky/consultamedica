<?php   
    session_start();  
    $verifica = $_SESSION["verifica"];
    if ($verifica == 1906){// Anteriormente en Citas_2Autofill.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina validarSesio.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica']);//se borra la variable verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;

        // include("validar_formulario.php");
        include("conexion/Conexion_BD.php");

        //--------------------------------------------------------------------------------------------------------------
        //se genera un numero aleatorio como código de usuario

           // $CodigoSolicitud=mt_rand(1,10000);
         //---------------------------------------------------------------------------------------------------------------    
        //captura todos los campos del formulario desde Citas_2.php y Citas_2Autofill.php
        $ID_Doctor= htmlspecialchars($_POST['captura_1']);//se recibe ID_Doctor desde Especialistas_AJAX.php.
        $fecha_cita=$_POST['fechaCita'];
        $turno=$_POST['tur_1'];
        $nombre=$_POST['nombre']; 
    	$apellido=strip_tags(trim($_POST['apellido']));
        $cedula=$_POST['cedula'];
        $edad=(int)$_POST["edad"];
        $telefono=$_POST['telefono'];

        //echo $ID_Doctor . "<br>";
        // echo "Fecha formato PHP: " . $fecha_cita . "<br>";
        //echo $turno . "<br>";
        //echo $nombre . "<br>";
        //echo $apellido . "<br>";
        //echo $cedula . "<br>";
        //echo $edad . "<br>";
        //echo $telefono . "<br>";
        //-------------------------------------------------------------------------------------------------------------------
        //se cambia el formato de la fecha antes de introducira a la base de datos para que mysql la pueda reconocer
           
                $fechaFormatoMySQL = date("Y-m-d", strtotime($fecha_cita));
                 // echo "Fecha formato MySQL: " . $fechaFormatoMySQL;
        //-------------------------------------------------------------------------------------------------------------------
        //insercion de los datos capturados del formulario en la base de datos

        $insertar1= "INSERT INTO citas(ID_Doctor, fecha, turno, nombre, apellido, cedula_identidad, edad, telefono) VALUES('$ID_Doctor','$fechaFormatoMySQL','$turno','$nombre','$apellido','$cedula','$edad','$telefono')";
        
        mysqli_query($conexion,$insertar1);

        //-----------------------------------------------------------------------------------------------------------------------    
        //pagina para mostar al cliente una vez realizada la reservación de la cita.

                //se cambia el formato de la fecha a d-m-Y
                $fechaFormatoPHP = date("d-m-Y", strtotime($fecha_cita));
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
                <link rel="shortcut icon" type="image/png" href="images/logo.png">
                <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="css/MediaQuery_CitasMedicas.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 800px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>  

                <script src="Javascript/Funciones_varias.js"></script> 

                <style>
                    @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower');
                </style>
            </head>
            <body>   
                <div style="min-height: 85%;">
                    <header class="fixed_1">         
                        <?php
                            include("header/headerPrincipal.php");
                        ?>
                    </header>
                    <div id="OcultarMenu" class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, ocultarMenu() se encuentra en funciones_varias.js-->
                        <div id="Pacientes_3">
                        	<?php echo "<b class= Inicio_10>$nombre</b>";?> 
                            <p class=Inicio_8> Hemos recibido su solicitud.</p>               
                            <p class= Inicio_8>Su consulta médica esta agendada para el <?php echo " $fechaFormatoPHP en la $turno.</p>"; ?>
                            <hr>
                            <?php echo "<p class= Inicio_6>Nombre: $nombre</p>";?>
                            <?php echo "<p class= Inicio_6>Apellido: $apellido</p>";?>
                            <?php echo "<p class= Inicio_6>Cedula: $cedula</p>";?>
                            <?php echo "<p class= Inicio_6>Telefono: $telefono</p></br>";?>   
                        </div>   
                        <div class="Pacientes_2">
                            <h6>Gracias por confiar en nosotros.</h6>
                            <h3>ConsultaMedica.com.ve</h3>
                        </div>
                    </div>
                </div>
                <footer>    
                    <?php
                        include("vista/footer.php");
                    ?>
                </footer>  
            </body>
        </html>
            <?php 
    }   
    else   
    {   
    // Si no viene del formulario Citas_2.php o trata de recargar página lo enviamos al formulario  
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=index.php'>";  
    } ?>