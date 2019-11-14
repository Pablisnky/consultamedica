<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Inicio Sesión</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
		<meta name="keywords" content="consulta, medico, doctor, directorio"/>
		<meta name="author" content="Pablo Cabeza"/>
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script>  
        <script src="../Javascript/CalendarioJQwery_2.js"></script>
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="../Javascript/Ciudades.js"></script> 

        <style>
            th{
                font-size: 0.9vw;
            }
            td{
               font-size: 0.85vw;
               box-sizing: border-box;
            }
            .a2{
               font-size: 0.88vw; 
               font-weight:bolder;
               color: #040652;
            }
            .a2:hover{
                color: white;
            }
            tr:hover{background-color:#BEBFDD; }
        </style>         
    </head>	    
    <body>
        <header>
            <?php
                include("../header/headerDoctor.php")
            ?>
        </header>
    
        <div  class="encabezado_03" style="margin-top: 2%;">
            <h3 style="margin-bottom: 2.5%;">Editar publicaciones</h3>

            <?php
                $consulta_1="SELECT ID_Doctor, nombrePublicacion FROM publicacionesDoctor WHERE ID_Doctor= '$sesion' ";
                $Recorset_1=mysqli_query($conexion,$consulta_1);
                $Doctor= mysqli_fetch_array($Recorset_1);
            ?>
                
            <form action="publicacionesDoctor.php" method="POST" enctype="multipart/form-data" name="Afiliacion" autocomplete="off" id="afiliacion">
                <!--En este formulario se utilizo el enctype correspondiente porque se va a enviar una imagen-->
                <div id="Afili">
                    <fieldset style="border-radius: 15px; padding: 2%; margin-bottom:10%;">
                        <legend>Nombre de la publicación</legend>
                        <label class="etiqueta">Nombre Publicación:</label>
                        <input type="text" name="descripcionPublicacion" id="DescripcionPublicacion"/>
                        <br/>                            
                    </fieldset>

                    <fieldset style="border-radius: 15px; padding: 2%">
                        <legend>Buscar publicación</legend>
                        <label style="margin-left: -0.5%">Inserte un archivo no mayor de Kb</label><br><br>
                        <input name="publicacion" type="file" value="Seleccione un archivo"/>
                    </fieldset>      
                </div>

                <div id="Perfil_06" style=" background-color: ; margin-left: 18%; width: 20%;">            
                    <a style="font-size:15px; color:rgba(194, 245, 19,1);" href="mostrarPublicaciones.php">Volver</a>
                    <input type="submit" value= "Guardar" style="width: 30%; margin-left: 10%; color:rgba(194, 245, 19,1);">       
                </div> 
            </form>                 
        </div> 

        <footer style="clear: left; margin-top: 35%;">
            <?php
                include("../header/footer.php");
            ?>
        </footer> 
    </body>
</html>