<?php   
    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);

    session_start();  
    $verifica = 1906;  
    $_SESSION["verifica"] = $verifica; 

    //Sesion para impedir que se acceda a la pagina que procesa el formulario o se recargue mandadolo varias veces a la base de datos
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
        <script type="text/javascript" src="../Javascript/Municipios.js"></script> 
        <script type="text/javascript" src="../Javascript/parroquias.js"></script> 
        <script type="text/javascript" src="../Javascript/Municipios_2.js"></script> 
        <script type="text/javascript" src="../Javascript/parroquias_2.js"></script> 
        <script type="text/javascript" src="../Javascript/Ajax_Cancelar.js"></script> 

		<style>
      		@import url('https://fonts.googleapis.com/css?family=Lato|Raleway:400|Montserrat|Indie+Flower|Caveat');
    	</style> 
		
	</head>	
	<body onload= "autofocusRegistroGratis()">
            <!--titulo y menu principal-->
			<?php 
				include("../vista/headerPrincipal_2.php");
			?>
			
        <div class="Principal" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
            <br>
			<h3>Registro de pacientes</h3>

				<div id="registro_1">
					<form action="recibePaciente.php" method="POST" name="registroGratis" onsubmit="" autocomplete="off">

						<fieldset class="historia_2">
                        <legend>Datos del Paciente</legend>
                        <span class="obligatorio">*</span><label style="display: inline-block; margin-left: 1%;" >Campos obligatorios</label><br><br>
                        
                        <label class="etiqueta_5">Nombre</label>
                        <input type="text" name="nombre_Paciente"  id="NombrePaciente"><span class="obligatorio">*</span>
                        <br class="ocultar">
                        <label class="etiqueta_20" for="ApellidoPaciente" >Apellido</label>
                        <input type="text" name="apellido_Paciente"  id="ApellidoPaciente"><span class="obligatorio">*</span>
                        <br>
                        <label class="etiqueta_5">Cedula</label>
                        <input type="text" name="cedula_Paciente"  id="CedulaPaciente"><span class="obligatorio">*</span>
                        <br class="ocultar">                        
                        <label class="etiqueta_20">Telefono</label>
                        <input type="text" name="telefono" id="TelefonoPaciente"><span class="obligatorio">*</span>
                        <br class="ocultar"> 
                        <label class="etiqueta_5">Fecha Nacimiento</label>
                        <input type="text" name="fechaNacimiento_Paciente" id="FechaNacimientoPaciente" onblur="llamar_calculaEdad_2(this.value)" placeholder="00-00-0000" autocomplete="off"><span class="obligatorio">*</span> <!-- la funcion llamar_calculaEdad_2() se encentra en Ajax_Cancelar.js-->
                         
                        <label class="etiqueta_20">Edad</label>
                        <div id="Edad" class="edad">&nbsp;</div><!--recibe desde calculoEdad.php la edad del paciente-->              
                        <!--Se pasa el valor del DIV que contiene la edad a un INPUT oculto, este ultimo es quien manda la edad a la BD-->
                        <script type="text/javascript">
                            document.forms["registroGratis"].onsubmit = function(){
                                var texto = document.getElementById("EdadOculta").value = document.getElementById("Edad").innerHTML;
                                //alert(texto);
                            }  
                        </script>
                        <input type="text" hidden name="edadOculta"  id="EdadOculta">
                        <label class="etiqueta_5">Correo electronico</label>
                        <input type="text" name="correo" id="Correo"><span class="obligatorio">*</span>

                        <hr style="margin: 1% auto;">
                        
                        <div class="registro_3">
                            <label class="etiqueta_5" style="width: 45%;">Lugar de Residencia</label>
                            <br><br>
                                <label class="etiqueta_23">Estado</label>
                                <select class="etiqueta_24" name="estadoResidencia" id="Estado_Res" onchange="SeleccionarMunicipio(this.form)"> 
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
                                    </select><span class="obligatorio">*</span>
                                <br >
                                <label class="etiqueta_23">Municipio</label>
                                <select  class="etiqueta_24" name="municipioResidencia" id="Municipio_Res" onchange="SeleccionarParroquia(this.form)"> <!--esta funcion se encuentra en Municipios.js-->
                                        <option></option>      
                                </select><span class="obligatorio">*</span>                       
                                <br>
                                <label class="etiqueta_23">Parroquia</label>
                                <select  class="etiqueta_24" name="parroquiaResidencia" id="Parroquia_Res"> 
                                    <option></option>                        
                                </select><span class="obligatorio">*</span>
                            </div>                
                        </fieldset>  
                
                        <br><br>
                        <fieldset class="historia_2"> 
                            <legend>Datos de acceso al sistema</legend>
                            <label class="etiqueta_5">Usuario</label>
                            <input type="text" name="usuario" id="Usuario"><span class="obligatorio">*</span>
                            <br>
                            <label class="etiqueta_5">Contraseña</label>
                            <input type="password" name="password" id="Password"><span class="obligatorio">*</span>         
                        </fieldset>

    					<input class="etiqueta_15" type="submit"  value="Registrarse" onclick="return validar_05()"><!--validar_05() se encuentra en registroPaciente.js-->
					</form>
                    </div>
                    
            <div style="width: 80%; margin: auto; border-bottom-color: #040652; border-bottom-width: 1px; border-bottom-style: solid; margin-bottom: 5%;">
                <span class="Inicio_11">Toda la información suministrada esta protegida por las Leyes de protección de datos existentes en nuestro pais.</span> 
                <span class="Inicio_11">(Constitución de la República Bolivariana de Venezuela, Ley del Ejercicio de la Medicina, Código de Deontología Médica y Ley Especial Contra Los Delitos Informáticos.)</span>
            </div>
				</div>
			</div>
		</div>
        <?php
            include("../vista/footer.php")
        ?>
	</body>
</html>

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

</script>