<?php
    session_start();  
    $verifica_5 = $_SESSION["verifica_5"];
    if($verifica_5 == 1909){// Anteriormente en Afiliacion.php se generó la variable $_SESSION["verfica_5"] con un valor de 1909; aqui se constata que se halla pasado por la pagina Afiliacion.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica_5']);//se borra la variable verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;
    
    include("../Clases/muestraError.php");
   
        // captura todos los campos del formulario de afiliación; se recibe desde Afiliacion.php
        $Nombre=$_POST["nombre"];
        $Apellido=strip_tags(trim($_POST["apellido"]));
        $Cedula= $_POST["cedula"];
        $Telefono= $_POST["telefono"];
        $Correo=$_POST["correo"];
        $Registro=$_POST["registro"];
        $Afiliacion=$_POST["afiliacion"]; 
        if(!empty($_POST["especialidad"])){
            $Especialidad= $_POST["especialidad"];
        }
        else{
            $Especialidad= "No Aplica";//Para evitar que el campo quede vacio en la BD
        }
        if(!empty($_POST["especialidad_2"])){
            $Especialidad_2= $_POST["especialidad_2"];
        }
        else{
            $Especialidad_2= "No Aplica";//Para evitar que el campo quede vacio en la BD
        }
        $Estado=$_POST["estado"];

        //Verifica si los campo estan vacios y lo devuelve al formulario
        if(empty($Nombre) || empty($Apellido) || empty($Cedula) || empty($Telefono) || empty($Correo) || empty($Registro) || empty($Afiliacion) || empty($Estado)){
            echo "<script>
                    alert('Debe Llenar los campos vacios');
                    window.location.href='registroEspecialista.php';
                </script>";
        }

        include("conexion/Conexion_BD.php");

        //se almacena en la tabla afiliacion los Dr, que han solicitado información del servicio
        $insertar2= "INSERT INTO afiliacion(nombre, apellido, cedula, telefono, correo, registro, servicio, especialidad, especialidad_2, estado, F_solicitud) VALUES('$Nombre', '$Apellido', '$Cedula', '$Telefono', '$Correo', '$Registro', '$Afiliacion', '$Especialidad', '$Especialidad_2', '$Estado', CURDATE())";                
        mysqli_query($conexion,$insertar2); 
    
        //Se cargan los datos al sistema para generar la cuenta del Doctor que solicito el servicio de afliacion. 
        //(Paso Nº 1 de 10)En la tabla especialidades se debe insertar la especialidad del médico sino esta registrada en el sistema.
        $Consulta= "SELECT ID_Especialidad FROM especialidades WHERE especialidad= '$Especialidad' ";
        $Recordset=  mysqli_query($conexion,$Consulta);
        if(mysqli_num_rows($Recordset) != 1){
            $Insertar= "INSERT INTO especialidades(especialidad) VALUES('$Especialidad_2')";                        
            mysqli_query($conexion,$Insertar); 
        }
        //Se saca el ID_Especialidad del Dr a afiliar
        $Consulta_9= "SELECT ID_Especialidad FROM especialidades WHERE especialidad= '$Especialidad' ||  especialidad= '$Especialidad_2' ";
        $Recordset_9=  mysqli_query($conexion,$Consulta_9);
        $Resultado_9= mysqli_fetch_array($Recordset_9);
        $ID_Especialidad= $Resultado_9["ID_Especialidad"];

        //(Paso Nº 3 de 10) Se crea un nuevo registro en la tabla doctores de la base de datos, en este registro solo se llenarán los campos nombre, apellidor, cedula, ID_Especialidad, estado, correo, sexo y Nº de matricula(si el nombre predice el sexo del médico), con esto se  genera automaticamente el ID_Doctor; 
        $Insertar_1= "INSERT INTO doctores(nombre_doctor, apellido_doctor, cedula, estado, RegistroSanitario, correo) VALUES('$Nombre','$Apellido','$Cedula','$Estado','$Registro','$Correo')";                      
        mysqli_query($conexion,$Insertar_1);


        //(Paso Nº 4 de 10) Se relaciona la especialidad con el ID_Doctor.
        $Consulta_2= "SELECT ID_Doctor FROM doctores WHERE cedula= '$Cedula'";
        $Recordset_2=  mysqli_query($conexion,$Consulta_2);
        $Resultado= mysqli_fetch_array($Recordset_2);
        $ID_Doctor= $Resultado["ID_Doctor"];

        $Insertar_8= "INSERT INTO doctores_especialidades(ID_Doctor, ID_Especialidad) VALUES('$ID_Doctor','$ID_Especialidad')";
        mysqli_query($conexion,$Insertar_8);

        $Actualizar= "UPDATE doctores SET ID_Especialidad= '$ID_Especialidad' WHERE ID_Doctor= '$ID_Doctor'";
        mysqli_query($conexion,$Actualizar);


        //(Paso Nº 5 de 10) Luego se tiene que abrir un registro vacio, solo con el ID_Doctor en las tablas de la base de datos: horarios. perfil_doctor. direcciones.

        $Insertar_3= "INSERT INTO horarios(ID_Doctor) VALUES('$ID_Doctor')";                      
        mysqli_query($conexion,$Insertar_3);

        $Insertar_4= "INSERT INTO perfil_doctor(ID_Doctor) VALUES('$ID_Doctor')";                      
        mysqli_query($conexion,$Insertar_4);

        $Insertar_5= "INSERT INTO direcciones(ID_Doctor) VALUES('$ID_Doctor')";                      
        mysqli_query($conexion,$Insertar_5);

        //(Paso Nº 6 de 10)En la tabla ciudades se debe insertar la ciudad del Dr sino está registrada
        $Consulta_6= "SELECT ID_Ciudad FROM ciudades WHERE ciudad= '$Estado'";
        $Recordset_6=  mysqli_query($conexion,$Consulta_6);
        if(mysqli_num_rows($Recordset_6) != 1){
            $Insertar_6= "INSERT INTO ciudades(ciudad) VALUES('$Estado')";                        
            mysqli_query($conexion,$Insertar_6); 
        }

        //Se saca el ID_Ciudad del Dr a afiliar
        $Consulta_10= "SELECT ID_Ciudad FROM ciudades WHERE ciudad = '$Estado' ";
        $Recordset_10=  mysqli_query($conexion,$Consulta_10);
        $Resultado_10= mysqli_fetch_array($Recordset_10);
        $ID_Ciudad= $Resultado_10["ID_Ciudad"];

        //(Paso Nº 7 de 10)En la tabla ciudades_especialidades se debe relacionar el estado del Dr con la especialidad en caso de que no este la relacion realizada.
        $Consulta_7= "SELECT * FROM ciudades_especialidades WHERE ID_Ciudad= '$ID_Ciudad' AND ID_Especialidad= '$ID_Especialidad'";
        $Recordset_7=  mysqli_query($conexion,$Consulta_7);
        if(mysqli_num_rows($Recordset_7) != 1){
            $Insertar_7= "INSERT INTO ciudades_especialidades(ID_Ciudad, ID_Especialidad) VALUES('$ID_Ciudad','$ID_Especialidad')";            
            mysqli_query($conexion,$Insertar_7); 
        }

        //(Paso Nº 8 de 10)En la tabla usuario_doctor se inserta el ID_Doctor, se crea el usuario, la contraseña, el tipo de plan al cual el Doctor se está afiliando y los valores A y B (alfanumerico de 4 caracteres) para cambios de contraseña. (los planes de afiliacion son: gra(Gratis), bas(Basico), esp(Especial). 

        //se genera un numero aleatorio para identificar al solicitante, esto se hace para no pedir el numero de cedula al lenar el formulario
        $Usuario = mt_rand(999,9999);
        $Contraseña = mt_rand(1,99999999);
        $ValorA = mt_rand(999,9999);
        $ValorB = mt_rand(999,9999);

        //se cifran la contraseña con un algoritmo de encriptación
        $ClaveCifrada= password_hash($Contraseña, PASSWORD_DEFAULT);
        
        $Insertar_11= "INSERT INTO usuario_doctor(ID_Doctor, usuarioDoctor, claveDoctor, planAfiliado, valor_A, valor_B) VALUES('$ID_Doctor','$Usuario','$ClaveCifrada','$Afiliacion','$ValorA','$ValorB')";            
        mysqli_query($conexion,$Insertar_11);         

// -------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------

    //Configuración de envio de correo de afiliación ConsultaMedica.com.ve

    include("Clases/actualizar_precio.php");

    if($Afiliacion == "Ini"){

            $Envia= "ConsultaMedica@consultamedica.com.ve";//Quien envia                     

            $email_to = $Correo;//correo a quien se le envia

            $email_subject = "Afiliación ConsultaMedica.com.ve";//titulo que llega a la bandeja del solicitante

            $email_message = '
Saludos ' . $Nombre . ' ' . $Apellido . '
Su solicitud de afiliación al Plan de Inicio de ConsultaMedica.com.ve fue procesada exitosamente, su cuenta está activada  y los datos de acceso a la plataforma son:

Usuario: ' . $Usuario .  '
Contraseña: ' . $Contraseña .  ' 

Estos valores de acceso pueden ser modificados a su conveniencia en el momento que usted lo requiera, ConsultaMedica.com.ve nunca le solicitará sus datos de confidencialidad; cualquier información o requerimiento puede enviarnos un mensaje por el formulario de contacto de la plataforma o escribir un correo a pc@consultamedica.com.ve

Los valores para realizar cambios de usuario y contraseña son:
Valor A: ' . $ValorA . '
Valor B: ' . $ValorB . ' 
Estos últimos siempre serán exigidos para realizar los cambios de usuario y contraseña, por lo que se recomienda resguardarlos.

OBSERVACIÓN  IMPORTANTE:
La construcción de su perfil al igual que operaciones de edición y carga de datos sensibles personales o de sus pacientes, no son posibles realizarlas por medio de teléfonos, esto es así por motivos de seguridad de la información, mediante estos dispositivos solo es posible la consulta de  información que usted ha alojado en su cuenta (pacientes, diagnósticos, tratamientos, informes médicos, citas pendientes al consultorio, entre otros funcionabilidades.)
                              
                    ';
                    
            //cabecera para el envío en formato HTML 
            $headers = 'MIME-Version: 1.0' . "\r\n"; 
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";


            //-----------------------------------------------------------------------------------------------------------------
            $headers= 'From: ' . $Envia . "\r\n" .

            'Reply-To: ' . $Envia . "\r\n" .
    
            'Bcc: pcabeza7@gmail.com' . "\r\n" . //copia oculta utilizada para ser notificado cuando hay una afiliacion
         
            'X-Mailer: PHP/' . phpversion();
            
            $envio= mail($email_to, $email_subject, $email_message, $headers);
                            
        }
        else if($Afiliacion == "Bas"){
            $Envia= "ConsultaMedica@consultamedica.com.ve";//Quien envia                     

            $email_to = $Correo;//correo a quien se le envia

            $email_subject = "Afiliación ConsultaMedica.com.ve";//titulo que llega a la bandeja del solicitante

            $email_message = 
'Usted ha solicitado la información para formar parte del equipo que cambiará la forma de administrar la información médica en nuestro país; juntos, lograremos grandes cambios que nos permitirán ser más productivos y efectivos, asi como mejoraremos la atención en salud en lo que a manejo de informacón se refiere, crearemos una delicada red digital que tendrá disponible la información profesional especifica, en cualquier punto geografico de Venezuela.

               
                
Solicitud de afiliación al Plan de Pago Básico.

                            Banco: Mercantil
                            Cuenta: Corriente
                            Número: 0105-0062-10-1062261763
                            Monto: ' . $PrecioBasico . '
                            Titular: Pablo Cabeza
                            Cedula: 12.728.036
                            Correo: pc@consultamedica.com.ve


                             
Una vez realizado el pago de afiliación, ingrese a nuestro sitio web y registre el pago con el código de su deposito o transferencia.



                Atte. Pablo Cabeza.
                Director General 
                ConsultaMedica.com.ve
                    ';
                    
            //para el envío en formato HTML 
            $headers = "MIME-Version: 1.0"."\r\n"; 
            $headers .= "Content-type: text/html; charset=utf-8"."\r\n";
            //-----------------------------------------------------------------------------------------------------------------
            $headers= 'From:'.$Envia."\r\n".

            'Reply-To: '.$Envia."\r\n" .
         
            'X-Mailer: PHP/' . phpversion();

            $envio= mail($email_to, $email_subject, $email_message, $headers);
                            
        }     
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------

   ?>
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
                <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="css/MediaQuery_CitasMedicas.css"/>
                <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="css/MediaQuery_CitasMedicas_movilModerno.css"/>
                <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="css/MediaQuery_CitasMedicas_Tablet.css"/>
                <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="css/MediaQuery_CitasMedicas_1280px.css">
                <link rel="shortcut icon" type="image/png" href="images/logo.png">
                
                <script src="Javascript/Funciones_varias.js"></script>  


                <style>
                    @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
                </style>         
            </head>     
            <body>
                <div style="min-height: 85%;">
                    <header class="fixed_1">
                        <?php
                            include("vista/headerPrincipal.php");
                        ?>
                    </header>  
                    <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, ocultarMenu() se encuentra en funciones_varias.js-->
                        <div id="Pacientes_3">
                            <?php echo "<b class='Inicio_14'>$Nombre</b>";?>
                            <p class='Inicio_14'>Su solicitud fue procesada con exito, hemos enviado al correo que usted ha proporcionado un mensaje con los datos de acceso a su cuenta.</p>
                            <hr>
                            <p class='Inicio_14'><b class='Inicio_14'> Sino ve el correo en su bandeja de entrada, revise el correo SPAM.</b></
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
    else{   
        // Si no viene del formulario registroEspecialista.php o trata de recargar página lo enviamos al formulario  
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=registroEspecialista.php'>";  
    } ?>
            

