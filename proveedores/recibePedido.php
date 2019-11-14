<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Pedidos</title>
        <meta http-equiv="content-type"  content="text/html";  charset="utf-8"/>
        <meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
        <meta name="keywords" content="consulta, medico, doctor, directorio"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 800px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Funciones_varias.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
        </style> 
    </head>    
    <body>
        <?php   
    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);

    include("../conexion/Conexion_BD.php"); 

            
                // recibe datos del cliente desde pedidoProveedores_Basico.php
                $AleatorioCliente= $_POST["aleatorio"];
                $NombreCliente= $_POST["nombre_Cliente"];
                $ApellidoCliente= $_POST["apellido_Cliente"];
                $TelefonoCliente= $_POST["telefono_Cliente"];
                $CorreoCliente= $_POST["correo_Cliente"];
                $EstadoCliente= $_POST["estado_Cliente"];
                
                // echo "Aleatorio del Cliente: " . $AleatorioCliente . "<br>";
                // echo "Nombre del Cliente: " . $NombreCliente . "<br>";
                // echo "Apellido del Cliente: " . $ApellidoCliente . "<br>";
                // echo "Telefono del Cliente: " . $TelefonoCliente . "<br>";
                // echo "Correo del Cliente: " . $CorreoCliente . "<br>";
                // echo "Estado del Cliente: " . $EstadoCliente . "<br>";


                $insertar= "INSERT INTO cliente_pedido(aleatorioPedido, nombreCliente, apellidoCliente, telefonoCliente, correoCliente, estadoCliente) VALUES('$AleatorioCliente','$NombreCliente','$ApellidoCliente','$TelefonoCliente','$CorreoCliente','$EstadoCliente')"; 
                mysqli_query($conexion,$insertar);
                
                $Actualizar= "UPDATE medicamentos_pedido SET confirmacion= 1 WHERE aleatorioPedido= '$AleatorioCliente'";
                mysqli_query($conexion,$Actualizar);
            ?>


            <div style="min-height: 85%;">
                <header class="fixed_1">
                    <?php 
                        include("../vista/headerPrincipal_3.php");
                    ?>
                </header>
                <div class="ocultarMenu" onclick="ocultarMenu()"><!-- contenedor se hace click y se oculta el menu responsive; ocultarMenu() se encuentra en Funciones_varias.js-->  
                    <h3>Su pedido</h3>
                    <div id="Pacientes_3">
                        <?php echo "<b class= Inicio_10>$NombreCliente</b>";?> 
                        <p class="Inicio_8" style="clear: right; margin-top: 10%; margin-bottom: -5%;">Estaremos comunicandole a la brevedad posible el status de su orden.</p>
                    </div>
                    <div class="Pacientes_2">
                        <h6>Gracias por confiar en nosotros.</h6>
                        <h3>ConsultaMedica.com.ve</h3>
                    </div>
                </div>
      





        

            


        

                    
                