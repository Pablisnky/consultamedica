<?php   
    session_start();  
    $verifica_2 = $_SESSION["verifica_2"];    
    //echo "Variable sesion_2=" . $verifica_2;
    if($verifica_2 == 1906){// Anteriormente en registroDeCarga.php se generó la variable $_SESSION["verfica_2"] con un valor de 1906; aqui se constata que se halla pasado por la pagina validarSesio.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica_2']);//se borra la variable verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; */

        //Verifica si los campo que se van a recibir desde registroDeCarga.php estan vacios
        if(empty($_POST["nombre_Med"]) || empty($_POST["principio_Med"]) || empty($_POST["presentacion_Med"]) || empty($_POST["especificacion_Med"]) || empty($_POST["laboratorio"]) || empty($_POST["cantidad"]) || empty($_POST["nombre_Solicitante"]) || empty($_POST["apellido_Solicitante"]) || empty($_POST["telefono_Solicitante"]) || empty($_POST["estado_Solicitante"]) ){

            echo"<script>alert('Debe Llenar los campos vacios'); window.location.href='cargar_Oferta.php';</script>";
        }    
        else{
            // htmlentities(addslashes($_POST["usuario_Proveedor"]));
            // htmlspecialchars($_POST['captura_1']);
            // strip_tags(trim($_POST['apellido']));
            // mysqli_real_escape_string
            // str_replace()
            
            //sino estan vacios se sanitizan y se reciben
            $NombreME = filter_input(INPUT_POST, 'nombre_Med', FILTER_SANITIZE_STRING);
            $PrincipioMe = filter_input(INPUT_POST, 'principio_Med', FILTER_SANITIZE_STRING);
            $PresentacionMe = filter_input(INPUT_POST, 'presentacion_Med', FILTER_SANITIZE_STRING);
            $EspecifcacionMe = filter_input(INPUT_POST, 'especificacion_Med', FILTER_SANITIZE_STRING);
            $LaboratorioMe = filter_input(INPUT_POST, 'especificacion_Med', FILTER_SANITIZE_STRING);
            $CantidadMe = filter_input(INPUT_POST, 'especificacion_Med', FILTER_SANITIZE_STRING);
            $NombreOfer = filter_input( INPUT_POST, 'nombre_Solicitante', FILTER_SANITIZE_STRING);
            $ApellidoOfer = filter_input(INPUT_POST, 'apellido_Solicitante', FILTER_SANITIZE_STRING);
            $TelefonoOfer = filter_input(INPUT_POST, 'telefono_Solicitante', FILTER_SANITIZE_STRING);
            $EstadoOfer = filter_input(INPUT_POST, 'estado_Solicitante', FILTER_SANITIZE_STRING);
        }

        //echo $NombreOfer ."<br>";
        //echo $ApellidoOfer ."<br>";
        //echo $CedulaOfer . "<br>";
        //echo $TelefonoOfer ."<br>";
        //echo $EstadoOfer ."<br>";

         //echo $NombreME ."<br>";
         //echo $PrincipioMe ."<br>";
         //echo $PresentacionMe ."<br>";
         //echo $EspecifcacionMe ."<br>";
         //echo $LaboratorioMe ."<br>";
         //echo $CantidadMe ."<br>";


            include("../conexion/Conexion_BD.php");

        
        $Insertar_1=" INSERT INTO medicamentos_ofrecidos(nombre_Medic, principio_Activo, presentacion_Medic, especificaciones_Medic, laboratorio_Medic, unidades_Medic, nombre_solicitante, apellido_solicitante , telefono_solicitante, estado_solicitante) VALUES('$NombreME','$PrincipioMe','$PresentacionMe','$EspecifcacionMe','$LaboratorioMe','$CantidadMe','$NombreOfer','$ApellidoOfer','$TelefonoOfer','$EstadoOfer')";    
        mysqli_query($conexion,$Insertar_1);
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
                <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
                <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 800px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
                
                <script src="../Javascript/Funciones_varias.js"></script><!--Se llama a la función mostrarMenu() ubicada en el header-->

                <style>
                    @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower');
                </style>
            </head>
            <body>
                <div style="min-height: 85%;">
                    <header class="fixed_1">
                        <?php            
                            include("../header/headerPrincipal_2.php");
                        ?>
                    </header>
                        <div id="OcultarMenu" class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, se encuentra en funciones_varias.js-->
                            <div class="Pacientes_3">
                                <?php echo "<b><p class= Inicio_12>$NombreOfer</p></b>"?>               
                                <p class=Inicio_8>El medicamento ha sido agregado al listado de solicitudes.</p>
                                <br>
                                
                            </div> 
                           <!-- <div style=" text-align: center">
                                <a class="btn_solicitudes" name="boton_Publicaciones" href="medicamentosBuscar.php?desplegar=ValorExigido">Ver solicitudes</a>
                            </div>  -->
                                    
                            <div class="Pacientes_2">
                                <h6>Gracias por confiar en nosotros.</h6>
                                <h3>ConsultaMedica.com.ve</h3>
                            </div>
                        </div>
                </div>
                <footer>
                    <?php
                        include("../header/footer.php")
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