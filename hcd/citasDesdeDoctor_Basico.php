<?php   
//inserta los datos de la cita que agenda un Dr desde su sesión,pagina para mostar al Dr. una vez realizada la reservación de la cita.
   session_start();  
    $verifica = $_SESSION["verifica"];
    if ($verifica == 1906){// Anteriormente en Citas_2.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina validarSesio.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica']);//se borra la variable verifica.

    //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
    //echo $verifica;
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
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_CitasMedicas.css"> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower');
        </style>
    </head>    

<?php
   //include("validar_formulario.php");
    include("../conexion/Conexion_BD.php");

//--------------------------------------------------------------------------------------------------------------
//se genera un numero aleatorio como código de usuario

   // $CodigoSolicitud=mt_rand(1,10000);
 //---------------------------------------------------------------------------------------------------------------    
   //captura todos los campos del formulario desde agendarCita.php
    $ID_Doctor= htmlspecialchars($_POST['doctor']);
    $fecha_cita=$_POST['fechaCita'];
    $turno=$_POST['tur_1'];
    $nombre=$_POST['nombre']; 
	$apellido=strip_tags(trim($_POST['apellido']));
    $cedula=$_POST['cedula'];
    $edad=(int)$_POST["edad"];
    $telefono=$_POST['telefono'];

    //echo $ID_Doctor . "<br>";
    //echo $fecha_cita . "<br>";
    //echo $turno . "<br>";
    //echo $nombre . "<br>";
    //echo $apellido . "<br>";
    //echo $cedula . "<br>";
    //echo $edad . "<br>";
    //echo $telefono . "<br>";

//se cambia el formato de la fecha antes de introducira a la base de datos para que mysql la pueda reconocer
    $fechaFormatoMySQL = date("Y-m-d", strtotime($fecha_cita));
   
//-------------------------------------------------------------------------------------------------------------------
//insercion de los datos capturados del formulario en la base de datos

    $insertar1= "INSERT INTO citas(ID_Doctor, fecha, turno, nombre, apellido, cedula_identidad, edad, telefono) VALUES('$ID_Doctor','$fechaFormatoMySQL','$turno','$nombre','$apellido','$cedula','$edad','$telefono')";
    
    mysqli_query($conexion,$insertar1);

//-----------------------------------------------------------------------------------------------------------------------    
        
?>     
    <body>
        <div style="min-height: 85%;"> 
            <header class="fixed_1">
                <h1>ConsultaMedica.com.ve</h1>
            </header>  
            <div class="ocultarMenu"  onclick="ocultarMenu()">
                <h3 >Acuse de recibo</h3>
                <div id="Pacientes_1" style="margin-bottom: 5%;">
                	<?php echo "Se ha agendado una cita para el paciente:</b>";?>
                    <?php echo "<br><br>";?>
                    <?php echo "Nombre: $nombre</br>";?>
                    <?php echo "Apellido: $apellido</br>";?>
                    <?php echo "Cedula: $cedula</br>";?> 
                    <?php echo "<br>";?>
                    <?php echo "Para el $fecha_cita en la $turno.</br>"; ?> 
                </div>   

                <div class="Pacientes_2">
                    <h6>Gracias por confiar en nosotros.</h6>
                    <h3>ConsultaMedica.com.ve</h3>
                </div>
            </div>
            <input type='button' value='Cerrar' style="display: block; margin: auto;" onclick='window.close();' /> 
        </div>
             
    </body>

   <?php  }   
else   
{   
// Si no viene del formulario agendarCita.php o trata de recargar página se cierra el formulario   
echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
} 
?>