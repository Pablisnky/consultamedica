<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Medicamentos</title>
		<meta http-equiv="content-type"  content="text/html";  charset="utf-8"/>
		<meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
		<meta name="keywords" content="consulta, medico, doctor, directorio"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="stylesheet" type="text/css" href="../iconos/icono_lupa_carga_descarga/lupa_carga_descarga.css"/><!--galeria de icomoon.io--> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
    </head>	    
    <body onload="llamar_todosMedicamentoOfertado(); mostrarLupa_2();"><!--mostrarLupa_2() esta al final de este archivo-->
        <?php   
            include("../Clases/muestraError.php");
            include("../conexion/Conexion_BD.php"); 
        ?> 

        <div style="min-height: 85%;">
            <header class="fixed_1">
                <?php 
                    include("../header/headerPrincipal_2.php");
                ?>
            </header>
            <div class="ocultarMenu" onclick="ocultarMenu()"><!-- contenedor se hace click y se oculta el menu responsive; ocultarMenu() se encuentra en Funciones_varias.js-->                      
                <h3>Medicinas ofertadas</h3> 
                <div class="medicinas_2">
                    <p class="Inicio_1">Si usted posee medicamentos que quisiera poner a disposición de otros usuarios que lo requieran, puede publicar en nuestra plataforma las especificaciones del mismo</p> 
                </div>
                <div id="Perfil_05_B">
                    <div id="Perfil_07">
                        <a style='margin: auto; display: block; margin: auto;' href='cargar_Oferta.php' class='buttonCuatro'>Ofertar</a>
                    </div>
               </div>
                <form>
                    <input type="text" id="MarcaParaAjax" value="MarcaParaAjax" hidden><!--marca para enviar a Ajax-->
                </form>                
                <div id="Lupa_2" onclick="mostrarMedicinasOfertadas()" style="background-color: ; width: 100%; display: none;">
                    <hr style="margin-bottom:3% "><!--mostrarMedicinasOfertadas() esta al final de este archivo-->
                    <label style="display: block; margin:auto; text-align: center;"><span class="icon-search"></span></label>   
                </div>
                <div id="MedicinasOfertadas" style="width: 100%; display: none; clear: left;">
                    <form>                  
                        <label class="etiqueta_27">Nombre medicamento</label>
                        <br class="ocultar">
                        <input class="etiqueta_28" type="text" onkeyup="llamar_OfertadosNombre(this.value)"><!--llamar_MedicamentoNombre esta en ajaxBuscador.js-->
                        <br class="ocultar">
                        <label class="etiqueta_27">Principio activo</label>
                        <input class="etiqueta_28" type="text"  onkeyup="llamar_OfertadosPrincipio(this.value)"><!--llamar_MedicamentoPrincipio esta en ajaxBuscador.js-->  
                        <br class="ocultar">            
                        <br>     
                        <input type="text" id="ID_Paciente" hidden value="<?php echo $sesion; ?>"> 
                        <br>
                    </form>
                </div>
                <div id="carga_4" class="Carga_4"></div><!-- Recibe la respuesta de las busquedas solicitas por medio de las funciones llamar_MedicamentoNombre(); llamar_MedicamentoPrincipio(); llamar_todosMedicamento() llamar_todosMedicamentoOfertado() ubicadas en ajaxBuscador.js y procesadas en buscarMedicamentoNombre.php, buscarTodosMedicam.php, buscarMedicamentoPrincipio.php y medicamentosBuscar.php-->
                <p class="Inicio_21A">ConsultaMedica.com.ve no tiene injerencia y no interviene en el intercambio de medicinas que realizen nuestros usuarios, la plataforma solo plantea la posibilidad de enlazar personas con los mismos intereses; su publicación estará en linea por 15 dias, de ser necesario puede volver a publicar.</p>
                <div id="Perfil_05_B">
                    <div id="Perfil_07">
                        <a style='margin: auto; display: block; margin: auto;' href='javascript:history.back(1)' class='buttonCuatro'>Regresar</a>
                    </div>
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

<!--   ////////   SCRIPT JAVASCRIPT   /////////   SCRIPT JAVASCRIPT   ////////   SCRIPT JAVASCRIPT   /////////   SCRIPT JAVASCRIPT   //////// -->
<!--   ////////   SCRIPT JAVASCRIPT   /////////   SCRIPT JAVASCRIPT   ////////   SCRIPT JAVASCRIPT   /////////   SCRIPT JAVASCRIPT   //////// -->

<script src="../Javascript/Funciones_varias.js"></script>
<script src="../Javascript/ajaxBuscador.js"></script>
<script src="../Javascript/validar_Campos.js"></script>
<script type="text/javascript">
    function mostrarLupa_2(){
        var A= document.getElementById("Lupa_2");
        var C= document.getElementById("Lupa_1");
        var B= document.getElementById("Imag_06");
            if(A.style.display == "none"){
                A.style.display = "block";
                B.style.display = "none";
                C.style.display = "none";
            }
    }

    function mostrarMedicinasOfertadas(){
        var A= document.getElementById("MedicinasOfertadas");
        var C= document.getElementById("Lupa_1");
        var B= document.getElementById("Imag_06");
            if(A.style.display == "none"){
                A.style.display = "block";
                B.style.display = "none";
                C.style.display = "none";
            }
    }
</script>