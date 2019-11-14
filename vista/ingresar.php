<!DOCTYPE html>
<html lang="es">
	<head>
		<title>ConsultaMedica_Login</title>

		<meta charset="utf-8"/>
		<meta name="description" content="login al sistema de historia médica digital"/>
		<meta name="keywords" content="login, historia medica, paciente, diagnostico, tratamiento farmacológico"/>
        <meta http-equiv="Last-Modified" content="0"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="rating" content="General" /><!-- indica si el contenido es apropiado para menores-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1001px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", autofocusMiembro, false);//funcion se encuentra en Funciones_varias.js
        </script>
    </head>	
    <body>
        <div>
            <header class="fixed_1">
                <?php
                    include("../header/headerPrincipal.php");
                ?>
            </header>
            <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, la función ocultarMEnu e encuentra en Funciones_varias.js-->
                <h3>Ingresar al sistema</h3>
                <div class="Afili_3">
                    <form action="../Sesiones_Cookies/validarSesion.php" method="POST" name="AbrirSesion" autocomplete="off" class="Afiliacion_0">
                        <fieldset>
                            <label>Usuario</label>
                            <input type="text" name="usuario" id="Usuario"/>
                            <br/>
                            <label>Contraseña</label>
                            <input type="password" name="clave" id="Clave"/>
                           
                            <a href="CambiarClave.php" id="cambiar">Cambiar contraseña</a> 
                            <br>                           
                            <input style="color:rgba(194, 245, 19,1);" type="submit" id="entrarSesion" value="Ingresar" onclick="return validarDoctor()"/><!--esta funcion se encuentre en validar_Campos.js-->
                            <hr>
                            <a class="Inicio_23" href="Afiliacion.php">¿No tiene cuenta en ConsultaMedica.com.ve?</a>
                        </fieldset>                         
                    </form>      
                    <div class="DocAfiliado_2">
                        <form action="../Sesiones_Cookies/validarSesion.php" method="POST">
                            <input type="text" hidden name="usuario" value="Pab">
                            <input type="text" hidden name="clave" value="0110">
                            <input type="submit" class="btnDemo" value="Ver Demo"/>
                        </form>
                    </div>
                    <p class="Inicio_6" style="width: 95%; margin: auto;">El Demo, muestra la interfaz de una cuenta de pago del plan básico, los nombres de los pacientes, sus diagnosticos y tratamiento farmacológico son fictisios; al igual que el nombre del Dr.</p> 
                </div>          
            </div>
        </div>
        <footer>                        
            <?php
                include("../header/footer.php");
            ?>
        </footer>  
    </body>
</html>

    	