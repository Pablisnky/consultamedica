<?php   
    session_start();  
    $verifica_2 = 1906;  
    $_SESSION["verifica_2"] = $verifica_2; 
    //Se crea esta sesion para impedir que se acceda a la pagina que procesa el formulario o se recargue mandadolo varias veces a la base de datos

    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);
?>

<!--Formulario de registro de usuarios, aqui se cargan los datos de los nuevos participantes.-->
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>ConsultaMedica Registro</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 800px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script type="text/javascript" src="../Javascript/validar_Campos.js"></script>

        

		<style>
      		@import url('https://fonts.googleapis.com/css?family=Lato|Raleway:400|Montserrat|Indie+Flower|Caveat');
    	</style> 
		
	</head>	
	<body onload= "autofocusRegistroGratis()">
        <!--titulo y menu principal-->
        <header class="fixed_1">
    		<?php 
    			include("../vista/headerPrincipal_2.php");
    		?>
        </header>			
        <div id="A_1" class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
			<h3>Oferte medicamentos</h3>
			<div id="A_2" class="Afili_3">
				<form action="../proveedores/validarProveedor.php" method="POST" name="registroGratis" autocomplete="off"  class="Afiliacion_0">
					<fieldset class="Afiliacion_4">
                        <legend>Datos de acceso</legend>
                        <label>Usuario</label>
                        <input type="text" name="usuario_Proveedor" id="UsuarioProveedor"/>
                        <br/>
                        <label>Ingrese código de proveedor:</label>
                        <input type="text" name="codigo_Proveedor" id="CodigoProveedor">
                            <br> <hr>
                            <a class="Inicio_23" href="planesProveedor.php">¿No tiene código de proveedor en ConsultaMedica.com.ve?</a>
                    </fieldset >          

                    <input type="submit" id="Envio" class="btn_verTodo" style="margin:auto; margin-top: 4%;" value="Enviar" onclick="return validar_12()" />
				</form>    

                <hr>

                <br>
                <br>
                <a style='margin: auto; display: block; margin: auto;'  href='javascript:history.back(1)' class='buttonCuatro'>Regresar</a>
            </div><!--Cierre A_2-->
        </div><!--Cierre A_1--> 

        <footer>
            <?php
                include("../vista/footer.php")
            ?>
        </footer>
	</body>
</html>