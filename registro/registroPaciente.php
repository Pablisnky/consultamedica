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
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script type="text/javascript" src="../Javascript/Funciones_varias.js"></script>
		<script type="text/javascript" src="../Javascript/validar_Campos.js"></script>
        <script type="text/javascript" src="../Javascript/ajaxBuscador.js"></script>
        <script type="text/javascript" src="../Javascript/Municipios.js"></script> 
        <script type="text/javascript" src="../Javascript/parroquias.js"></script>  
        <script type="text/javascript" src="../Javascript/Ajax_Cancelar.js"></script>

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
        <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
			<h3>Registro de pacientes</h3>
            <p class="Inicio_8">La información que suministrará a continuación es la necesaria para ser encontrado al publicar medicamentos en la plataforma.</p>
			<div class="Afili_3">
				<form action="recibePaciente.php" method="POST" name="registroGratis" onsubmit="" autocomplete="off"  class="Afiliacion_0">
					<fieldset class="Afiliacion_4">
                        <legend>Datos del Paciente</legend>
                        <!--<span class="obligatorio">*</span><label style="display: inline-block; margin-left: 1%;" >Campos obligatorios</label><br><br>-->
                        
                        <label>Nombre:</label>
                        <input type="text" name="nombre_Paciente" id="NombrePaciente">
                        <br>
                        <label for="ApellidoPaciente" >Apellido:</label>
                        <input type="text" name="apellido_Paciente"  id="ApellidoPaciente">
                        <br>
                        <label>Cedula:</label>
                        <input type="text" name="cedula_Paciente" id="CedulaPaciente" onfocus="limpiar()" onblur="llamar_validarCedula(this.value)"><!--  se encentra en ajaxBuscador.js-->
                        <br>                        
                        <label>Telefono:</label>
                        <input type="text" name="telefono" id="TelefonoPaciente" onblur="validarFormatotelefono(this.value)" onfocus="limpiar_4()"><!--  se encentra al final de este archivo-->
                        <br> 
                        <label>Fecha Nacimiento:</label>
                        <input type="text" name="fechaNacimiento_Paciente" id="FechaNacimientoPaciente" onblur="validarFormatoFecha(this.value); setTimeout(llamar_calculaEdad_2(this.value),200)" onfocus="limpiar_3()" autocomplete="off"> <!-- la funcion llamar_calculaEdad_2() se encuentra en ajax canxelar  y validarFormatoFecha se encuentra al final de este archivo-->
                                                 
                        <br>
                        <label>Correo electronico:</label><!-- llamar_validarCorreo(this.value)-->
                        <input type="text" name="correo" id="Correo" onfocus="limpiar_2()" onblur="correo_3();"><!--limpiar_2() y correo_3() se encuentran al final de este archivo-->
                        <br>
                        <hr style="margin: 1% auto;">
                    
                        <div class="registro_3" style="width: 100%;">
                            <label>Lugar de Residencia</label>
                            <br>
                            <label>Estado:</label>
                            <select name="estadoResidencia" id="Estado_Res" onchange="SeleccionarMunicipio(this.form)"> 
                                <option></option>
                                <option>Amazonas</option>
                                <option>Anzoátegui</option>
                                <option>Apure</option>
                                <option>Aragua</option>
                                <option>Barinas</option>
                                <option>Bolivar</option>
                                <option>Carabobo</option>
                                <option>Cojedes</option>
                                <option>Delta Amacuro</option>
                                <option>Distrito Capital</option>
                                <option>Falcon</option>
                                <option>Guárico</option>
                                <option>Lara</option>
                                <option>Mérida</option>
                                <option>Miranda</option>
                                <option>Monagas</option> 
                                <option>Nueva Esparta</option>
                                <option>Portuguesa</option>
                                <option>Sucre</option>
                                <option>Táchira</option>
                                <option>Trujillo</option>                           
                                <option>Vargas</option>
                                <option>Yaracuy</option>
                                <option>Zulia</option>
                            </select>
                            <br >
                            <label>Municipio</label>
                            <select  name="municipioResidencia" id="Municipio_Res" onchange="SeleccionarParroquia(this.form)"> <!--esta funcion se encuentra en Municipios.js-->
                                <option></option>      
                            </select>                       
                            <br>
                            <label>Parroquia</label>
                            <select  name="parroquiaResidencia" id="Parroquia_Res"> 
                                <option></option>                        
                            </select>
                        </div>                
                    </fieldset >  
                    <br>
                    <fieldset class="Afiliacion_4"> 
                        <legend>Datos de acceso al sistema</legend>
                        <label>Usuario</label>
                        <input type="text" name="usuario" id="Usuario">
                        <br>
                        <label>Contraseña</label>
                        <input type="password" name="password" id="Password"> 
                    </fieldset>

    				<input class="etiqueta_15" type="submit" value="Registrarse" onclick="return validar_05()"><!--validar_05() se encuentra en validar_Campos.js-->
                    <div id="Edad" hidden></div><!--recibe desde calculoEdad.php la edad del paciente-->              
                        <!--Se pasa el valor del DIV que contiene la edad a un INPUT oculto, este ultimo es quien manda la edad a la BD-->
                        <script type="text/javascript">
                            document.forms["registroGratis"].onsubmit = function(){
                                var texto = document.getElementById("EdadOculta").value = document.getElementById("Edad").innerHTML;
                                //alert(texto);
                            }  
                        </script>

                        <input type="text" hidden name="edadOculta" id="EdadOculta">
				</form>
            </div>    
            <div class="texto">
                <span class="Inicio_11">Toda la información suministrada esta protegida por las Leyes de protección de datos existentes en nuestro pais.</span> 
                <span class="Inicio_11">(Constitución de la República Bolivariana de Venezuela, Ley del Ejercicio de la Medicina, Código de Deontología Médica y Ley Especial Contra Los Delitos Informáticos.)</span>
            </div>
		</div>

        <footer>
            <?php
                include("../vista/footer.php")
            ?>
        </footer>
	</body>
</html>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<script type="text/javascript">
//Mascara de entrada para el telefono
    TelefonoPaciente.addEventListener("input", function(){
      if (this.value.length == 4){
          this.value += "-"; 
      }
      else if  (this.value.length == 8){
          this.value += ".";  
      }
      else if  (this.value.length == 11){
          this.value += ".";  
      }
    }, false);

//Mascara de entrada para la fecha
    FechaNacimientoPaciente.addEventListener("input", function(){
      if (this.value.length == 2){
          this.value += "-"; 
      }
      else if  (this.value.length == 5){
          this.value += "-";  
      }
    }, false);


//Validar el formato de telefono
    function validarFormatotelefono(campo){
        var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
        if((campo.match(RegExPattern)) && (campo!='')){
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById("TelefonoPaciente").value = "";
            document.getElementById("TelefonoPaciente").style.backgroundColor="red"; 
            return false;
        }
    }

//Validar el formato de la fecha
    avisado=false; 
    function validarFormatoFecha(campo){ 
        if(document.getElementById("TelefonoPaciente").style.backgroundColor=="red"){//este if solo se hace para evitar el ciclo repetitivo que hace el evento onblur cuando existen más de dos en un formulario
            if(avisado== false){
                avisado= true; 
                setTimeout("avisado= false",50);
                document.getElementById("TelefonoPaciente").focus();             
            }
        }
        else{
            var RegExPattern = /^\d{2}\-\d{2}\-\d{4}$/;
            if((campo.match(RegExPattern)) && (campo!='')){
                return true;
            }
            else{
                alert("Fecha con formato incorrecto");                
                document.getElementById("FechaNacimientoPaciente").style.backgroundColor="red";
                document.getElementById("FechaNacimientoPaciente").value = "";    
            }            
        } 
    }

//Validar el formato del correo
    function correo_3(){ 
        if(document.getElementById("FechaNacimientoPaciente").style.backgroundColor=="red"){//este if solo se hace para evitar el ciclo repetitivo que hace el evento onblur cuando existen más de dos en un formulario
            if(avisado== false){
                avisado= true; 
                setTimeout("avisado= false",50);
                document.getElementById("FechaNacimientoPaciente").focus();           
                 
            }
        }  
        else{
            campo = event.target;
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (emailRegex.test(campo.value)) {      
               return true;
            } 
            else{
              alert("Correo no valido");      
              document.getElementById("Correo").style.backgroundColor="red"; 
              document.getElementById("Correo").value = "";
            }
        }
  }


    function limpiar(){
        document.getElementById("CedulaPaciente").value = "";        
        document.getElementById("CedulaPaciente").style.backgroundColor = "white";
    }

    function limpiar_2(){
        document.getElementById("Correo").value = "";        
        document.getElementById("Correo").style.backgroundColor = "white"; 
        document.getElementById("Correo").style.color="black";
    }

    function limpiar_3(){
        document.getElementById("FechaNacimientoPaciente").value = "";        
        document.getElementById("FechaNacimientoPaciente").style.backgroundColor = "white"; 
        document.getElementById("FechaNacimientoPaciente").style.color="black";
    }

    function limpiar_4(){
        document.getElementById("TelefonoPaciente").value = "";        
        document.getElementById("TelefonoPaciente").style.backgroundColor = "white"; 
        document.getElementById("TelefonoPaciente").style.color="black";
    }
</script>