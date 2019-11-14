<?php   
    session_start();  
    $verifica_2 = $_SESSION["verifica_2"];    
    //echo "Variable sesion_2=" . $verifica_2;
    if($verifica_2 == 1906){// Anteriormente en registroPaciente.php se generó la variable $_SESSION["verfica_2"] con un valor de 1906; aqui se constata que se halla pasado por la pagina validarSesio.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica_2']);//se borra la variable verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; */

        //se genera un codigo numerico aleatorio de 5 digitos numericos para el Valor_A
        function generarValor_A($longitud) {
         $key = '';
         $pattern = '1234567890';//$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';si se desease numeros y letras
         $max = strlen($pattern)-1;
         for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
         return $key;
        }
        $Valor_A= generarValor_A(5); // genera un código de 5 caracteres de longitud.
        //echo "Valor_A= " . $Valor_A . "<br>";

        //se genera un codigo numerico aleatorio de 5 digitos numericos para el Valor_B
        function generarValor_B($longitud) {
         $key = '';
         $pattern = '1234567890';//$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';si se desease numeros y letras
         $max = strlen($pattern)-1;
         for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
         return $key;
        }
        $Valor_B= generarValor_B(5); // genera un código de 5 caracteres de longitud.
        //echo "Valor_B= " . $Valor_B . "<br>";

       
        //se reciben los datos de actualización desde este mismo formulario.
        $NombrePacient= $_POST["nombre_Paciente"];
        $ApellidoPacient= $_POST["apellido_Paciente"];
        $CedulaPacient= $_POST["cedula_Paciente"];
        $Telefono= $_POST["telefono"];
        $FechaNacimiento= $_POST["fechaNacimiento_Paciente"];
        $Edad= $_POST["edadOculta"];
        $Correo= $_POST["correo"];
        $Estado_Res= $_POST["estadoResidencia"];
        $Municipio_Res= $_POST["municipioResidencia"];
        $Parroquia_Res= $_POST["parroquiaResidencia"];

        $Usuario= $_POST["usuario"];
        $Password= $_POST["password"];

         //echo $NombrePacient ."<br>";
         //echo $ApellidoPacient ."<br>";
         //echo $CedulaPacient ."<br>";
         //echo $Telefono ."<br>";
         //echo $FechaNacimiento ."<br>";
         //echo $Edad ."<br>";
         //echo $Correo ."<br>";
         //echo $Estado_Res ."<br>";
         //echo $Municipio_Res ."<br>";
         //echo $Parroquia_Res ."<br>";
         //echo $Usuario ."<br>";
         //echo $Password ."<br>";

        //se cambia el formato de la fecha a Y-m-d antes de insertarlo en la BD
            $fechaFormatoMySQL = date("Y-m-d", strtotime($FechaNacimiento));

            include("../conexion/Conexion_BD.php");

        //Se guardan los datos recibidos en la tabla pacientes registrados
        $Insertar_1=" INSERT INTO pacientes_registrados(nombre_pacient, apellido_pacient, cedula_pacient, telefono_pacient,  fechaNacimiento_pacient, edad_pacient, correo_pacient, estado_Residencia, municipio_Residencia, parroquia_Residencia) VALUES('$NombrePacient','$ApellidoPacient','$CedulaPacient','$Telefono','$fechaFormatoMySQL','$Edad','$Correo','$Estado_Res','$Municipio_Res','$Parroquia_Res')";    
        mysqli_query($conexion,$Insertar_1);

        //Se guardan los datos recibidos en la tabla usuario_paciente
        $Insertar_2="INSERT INTO usuario_paciente(ID_PR, usuarioPaciente, clavePaciente, valorA, valorB) VALUES('0', '$Usuario','$Password', '$Valor_A', '$Valor_B')";
        mysqli_query($conexion,$Insertar_2);

        //Se busca en la BD el ID_PR que se acaba de crear. 
        $Consulta = "SELECT ID_PR FROM pacientes_registrados ORDER BY ID_PR DESC LIMIT 1";
        $Recordset =mysqli_query($conexion,$Consulta);      
        $Resultado= mysqli_fetch_array($Recordset);
        $ID_PR= $Resultado["ID_PR"];
        //echo "El ID_PR= " . $ID_PR;

        //Se actualiza el ID_PR para igualarlo con el de la tabla pacientes_registrados
            $Update="UPDATE usuario_paciente SET ID_PR ='$ID_PR' WHERE ID_PR= 0 ";
            mysqli_query($conexion,$Update);
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
                            <?php echo "<p><b>$NombrePacient</b></p>"?> 
                            <p> Hemos recibido su solicitud.</p>              
                            <p>Puede acceder con su Usuario y Contraseña.</p>
                            <br><br>
                            <a class="btn_publicaciones" name="boton_Publicaciones" href="../ingresar.php">Entrar</a>
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
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=registroPaciente.php'>";  
    } ?>