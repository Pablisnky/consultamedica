<?php   
    session_start();  
    $verifica_2 = $_SESSION["verifica_2"];    
    //echo "Variable sesion_2=" . $verifica_2;
    if($verifica_2 == 1906){// Anteriormente en registroDeCarga.php se generó la variable $_SESSION["verfica_2"] con un valor de 1906; aqui se constata que se halla pasado por la pagina validarSesio.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica_2']);//se borra la variable verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; */

        //Verifica si los campo que se van a recibir desde registroDeCarga.php estan vacios
        if(empty($_POST["nombre_Solicitante"]) || empty($_POST["apellido_Solicitante"]) || empty($_POST["cedula_Solicitante"]) || empty($_POST["telefono_Solicitante"]) || empty($_POST["estado_Solicitante"]) || empty($_POST["nombre_Med"]) || empty($_POST["principio_Med"]) || empty($_POST["presentacion_Med"]) || empty($_POST["especificacion_Med"])){
            echo"<script>alert('Debe Llenar los campos vacios');window.location.href='registroDeCarga.php';</script>";
        }
        else{
            //sino estan vacios se sanitizan y se reciben
            $NombreSo = filter_input( INPUT_POST, 'nombre_Solicitante', FILTER_SANITIZE_STRING);
            $ApellidoSo = filter_input(INPUT_POST, 'apellido_Solicitante', FILTER_SANITIZE_STRING);
            $CedulaSo = filter_input(INPUT_POST, 'cedula_Solicitante', FILTER_SANITIZE_STRING);
            $TelefonoSo = filter_input(INPUT_POST, 'telefono_Solicitante', FILTER_SANITIZE_STRING);
            $EstadoSo = filter_input(INPUT_POST, 'estado_Solicitante', FILTER_SANITIZE_STRING);
            $NombreME = filter_input(INPUT_POST, 'nombre_Med', FILTER_SANITIZE_STRING);
            $PrincipioMe = filter_input(INPUT_POST, 'principio_Med', FILTER_SANITIZE_STRING);
            $PresentacionMe = filter_input(INPUT_POST, 'presentacion_Med', FILTER_SANITIZE_STRING);
            $EspecifcacionMe = filter_input(INPUT_POST, 'especificacion_Med', FILTER_SANITIZE_STRING);
        }

        //echo $NombreSo ."<br>";
        //echo $ApellidoSo ."<br>";
        //echo $CedulaSo . "<br>";
        //echo $TelefonoSo ."<br>";
        //echo $EstadoSo ."<br>";

         //echo $NombreME ."<br>";
         //echo $PrincipioMe ."<br>";
         //echo $PresentacionMe ."<br>";
         //echo $EspecifcacionMe ."<br>";


            include("../conexion/Conexion_BD.php");

        //Se guardan los datos recibidos en la tabla pacientes registrados
        $Insertar_1=" INSERT INTO medicamentoscargados(cedulaSolicitante, nombre, principioActivo, presentacion, especificaciones) VALUES('$CedulaSo','$NombreME','$PrincipioMe','$PresentacionMe','$EspecifcacionMe')";    
        mysqli_query($conexion,$Insertar_1);

        //Se guardan los datos recibidos en la tabla usuario_paciente
        $Insertar_2="INSERT INTO solicitantes(nombreSolicitante, apellido, cedula_Identidad, telefono, estado) VALUES('$NombreSo','$ApellidoSo','$CedulaSo','$TelefonoSo','$EstadoSo')";
        mysqli_query($conexion,$Insertar_2);

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
                
                <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css">
                <link rel="shortcut icon" type="image/png" href="../images/logo.png">
                <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"> 
                
                <script src="../Javascript/Funciones_varias.js"></script><!--Se llama a la función mostrarMenu() ubicada en el header-->

                <style>
                    @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower');
                </style>
            </head>
            <body>
                <header>
                    <?php            
                        include("../vista/headerPrincipal_2.php");
                    ?>
                </header>
                <div class="Principal">
                    <div id="OcultarMenu" class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, se encuentra en funciones_varias.js-->
                        <div class="Pacientes_3">
                            <?php echo "<p><b>$NombreSo</b></p>"?> 
                            <p> Hemos recibido su solicitud.</p>              
                            <p>El medicmaento ya esta disponible en el listado que publicamos en pro de su bienestar, le deseamos buena suerte.</p>
                            <br><br>
                            <a class="btn_publicaciones" name="boton_Publicaciones" href="medicamentos.php">Medicamentos</a>
                        </div>   
                                
                        <div class="Pacientes_4">
                            <h6>Gracias por confiar en nosotros.</h6>
                            <h3>ConsultaMedica.com.ve</h3>
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
       <?php  
    }   
    else{   
        // Si no viene del formulario registroPaciente.php o trata de recargar página lo enviamos al formulario  
        //echo "Error Papa, intentelo de nuevo";
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=medicamentos.php'>";  
    } ?>