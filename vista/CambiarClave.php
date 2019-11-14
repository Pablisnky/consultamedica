<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Cambio de clave</title>
		<meta charset="utf-8"/>
		<meta name="description" content="contactar a viajes en carro particular pagando por puesto occupado entre las ciudades de Barquisimeto y Caracas"/>
		<meta name="keywords" content="viajes privados, Caracas, Barquisimeto, viaje particular, servicio de taxi, HOREBI diseños de web_site"/>
        <meta http-equiv="Last-Modified" content="0"/>
		<meta name="author" content="Pablo Cabeza"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>  
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/Funciones_varias.js"></script>
    </head>	
    <body onload="autofocusMiembro()"><!--La función autofocusMiembro se encuentra en validar_Campos.js-->
        <div class="Principal">
        	<header class="fixed_1">           
                <?php
                    include("../header/headerPrincipal.php");
                ?>
    		</header>
            <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive--> 
                <h3>Cambiar contraseña</h3>
                <p class="Inicio_8">Los valores A y B son necesarios para identificarlo, los mismos fueron enviados a su correo al registrarse en la plataforma, sino los posee <a href="contactenos.php">contactenos</a> para reestablecer su cuenta.</p>
                <div class="Clave_3">
                    <form action="../recibe_CambiarClave.php" method="POST" name="cambio" class="Afiliacion_0">
                        <fieldset>
                            <legend>Valores de seguridad</legend>
                            <label>Valor A</label>
                            <input type="password" name="valor_A" id="Valor_A" onclick="limpiar_A()" onblur="validarFormatoValorA(this.value)"/>
                            <br><br>
                            <label>Valor B</label>                            
                            <input type="password" name="valor_B" id="Valor_B" onclick="limpiar_B()" onblur="validarFormatoValorB(this.value)"/>

                            <div style=" width: 100%;">
                                <a class='buttonCuatro' style=' margin:auto; margin-top: 5%; width: 25%; line-height: 17px; cursor: pointer;'  onclick="llamar_Valor_AB(); setTimeout(mostrarCambiarClave,200);">Enviar</a>
                            </div>

                            <div id="RespuestaAjax"></div><!--recibe respuesta de llamar_Valor_AB() que se encuentra en Ajax_Cancelar.js-->
                            
                            <input style="visibility: hidden;" type="text" id="ClaveOculta" name="claveOculta"><!--Se traslada el valor de RespuestaAjax a este input -->

                            <div class="clave_5" id="Clave_5">  
                                <hr>
                                <br>                                         
                                <p>Sus datos han sido confirmados, introduzca una nueva contraseña</p>
                                <input style=" margin:3% auto;  display: block;" type="password" name="nuevaCLave" id="NuevaCLave"/>
                                <input style="color:rgba(194, 245, 19,1); display: block;" type="submit" onclick="return validar_09()" value="Cambiar"/>
                    
                            </div>

                            <div class="clave_6" id="Clave_6">   
                                <h3>Acceso negado</h3>
                                <a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Reintentar</a>
                            </div>
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
        
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!--Se pasa el valor del DIV Clave_4 a un input-->
    <script type="text/javascript">
        function mostrarCambiarClave(){
            var Mostrar_A= document.getElementById("Clave_5");
            var Mostrar_B= document.getElementById("Clave_6");
            document.getElementById("ClaveOculta").value= document.getElementById("RespuestaAjax").innerHTML;

            if(document.getElementById("ClaveOculta").value == "mostrarDoctor"){
                Mostrar_A.style.display= "block"; 
                Mostrar_C.style.display= "none";                                       
            }
            else if(document.getElementById("ClaveOculta").value == "no mostrar"){                                       
                Mostrar_B.style.display= "block";
                Mostrar_C.style.display= "none";
            }
        }   

//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//Validar el formato del valor A y valor B
        avisado=false;
        function validarFormatoValorA(campo){
            var RegExPattern = /^[0-9a-zA-Z]{4}$/;
            if((campo.match(RegExPattern)) && (campo!='')){
                return true;
            }
            else{
                alert("Solo números o letras hasta, 4 caracteres");
                document.getElementById("Valor_A").value = "";
                document.getElementById("Valor_A").style.backgroundColor="red";
                return false; 
            }
        }


        function validarFormatoValorB(campo){
            var RegExPattern = /^[0-9a-zA-Z]{4}$/;//este if solo se hace para evitar el ciclo repetitivo que hace el evento onblur cuando existen más de dos en un formulario
            if(document.getElementById("Valor_A").style.backgroundColor=="red"){//este if solo se hace para evitar el ciclo repetitivo que hace el evento onblur cuando existen más de dos en un formulario
                if(avisado== false){
                    avisado= true; 
                    setTimeout("avisado= false",50);  
                    document.getElementById("Valor_B").blur();//Quita el foco, si se hace click en el elemento                
                    return false;             
                }
            }
            else{
                if((campo.match(RegExPattern)) && (campo!='')){
                    return true;
                }
                else{
                    alert("Solo números o letras hasta, 4 caracteres");
                    document.getElementById("Valor_B").value = "";
                    document.getElementById("Valor_B").style.backgroundColor="red";
                    //document.getElementById("Valor_B").focus();
                    return false; 
                }
            }
        }

        
        function limpiar_A(){
            document.getElementById("Valor_A").value = "";        
            document.getElementById("Valor_A").style.backgroundColor = "white";
        }
        function limpiar_B(){
            document.getElementById("Valor_B").value = "";        
            document.getElementById("Valor_B").style.backgroundColor = "white";
        }
    </script>