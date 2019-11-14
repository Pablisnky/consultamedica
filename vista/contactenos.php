<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Contacto</title>

		<meta charset="utf-8"/>
		<meta name="description" content="contacto con consultamedica.com.ve"/>
		<meta name="keywords" content="consultas medicas, citas medicas, consultorio, medicos."/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="expires" content="never" />
        <meta name="rating" content="General" /><!-- indica si el contenido es apropiado para menores-->
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/validar_Campos.js"></script>
        <script src="../Javascript/Funciones_varias.js"></script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", autofocusContacto, false);//autofocusContacto() se encuentra en Funciones_varias.js  
            document.addEventListener("keydown", contar, false);//contar() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", contar, false);//contar() se encuentra en Funciones_varias.js 
            document.addEventListener("keydown", valida_Longitud, false);//valida_Longitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_Longitud, false);//valida_Longitud() se encuentra en Funciones_varias.js            
        </script>
        
    </head> 

    <body style="height: 100%">
        <div style="min-height: 85%;">
            <header class="fixed_1">   
                <?php
                    include("../header/headerPrincipal.php");
                ?>
            </header>             
            <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, esta funcion esta en Funciones_varias.js-->
                <h3>Contáctenos</h3>
                <div class="contacto">
                    <p class="Inicio_8">Sugerencias, recomendaciones y cualquier inquietud que Usted pueda tener, hagala saber contactandos.</p>
                </div>
                <div class="Afili_3"> 
                    <form action="contacto.php" method="post" autocomplete="off" name="Contacto" class="Afiliacion_0" onsubmit=" return validar_01()">
                        <fieldset>
                            <legend>Contactenos</legend>
                            <label>Nombre</label>
                            <input type="text" name="nombre" id="Nombre"/>
                            <br/>
                            <label>Apellido</label>
                            <input type="text" name="apellido" id="Apellido"/>
                            <br/>
                            <label>Correo electrónico</label>
                            <input type="email"  name="correo" id="Correo"/>
                            <br/>
                            <label>Asunto</label>
                            <input type="text"  name="asunto" id="Asunto">
                            <br/>
                            <label>Contenido</label><br>
                            <textarea class="contenido" name="contenido" id="Contenido"></textarea>
                            <input class="contador" type="text" name="contador" id="Contador"  value="800">
                                    
                            <input type="submit" class="submitContacto" name="Enviar" value="Enviar"/>
                        </fieldset>        
                    </form>
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

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

<!--Con este script se ajusta el textarea según va creciendo el contenido del mismo-->
<script type="text/javascript">
    var textarea_A = document.querySelector('textarea');
    textarea_A.addEventListener('keydown', autosize);
             
    function autosize(){
      var el = this;
      setTimeout(function(){
        el.style.cssText = 'height:auto; padding:0';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
      },0);
}
</script>