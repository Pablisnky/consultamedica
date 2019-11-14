<?php   
    session_start();  
    $verifica_5 = 1909;  
    $_SESSION["verifica_5"] = $verifica_5; 

    //Se crea una sesion para impedir que se acceda a la pagina que procesa el formulario o se recargue mandadolo varias veces a la base de datos; esta sesión se abre nuevamente en Doctores.php

    include("../Clases/muestraError.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>ConsultaMedica Registro</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Afiliación de Doctores a la plataforma de ConsultaMedica.com.ve."/>
		<meta name="keywords" content="Doctor, afiliación, registro."/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script type="text/javascript" src="../Javascript/Funciones_varias.js"></script>
		<script type="text/javascript" src="../Javascript/validar_Campos.js"></script>
        <script type="text/javascript" src="../Javascript/Ajax_Cancelar.js"></script>  
        <script>
            document.addEventListener("keydown", valida_LongitudTelefono, false);//validaLongitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_LongitudTelefono, false);//validaLongitud() se encuentra en Funciones_varias.js   
        </script>
	</head>	
	<body onload= "autofocusRegistroGratis()">
        <header class="fixed_1">
    		<?php 
				include("../header/headerPrincipal.php");
    		?>
		</header>
        <div class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
			<h3>Registrar cuenta.</h3>

			<div id="Afiliacion_1">
                <p class="Inicio_8" style="line-height: 160%;">Si es Doctor o Especialista en medicina debidamente acreditado y está ejerciendo legalmente en Venezuela, solicite la afiliación al sistema.</p>
            </div>
            <div class="Afili_3">
                <form action="../Doctores.php" method="POST" name="Afiliacion" autocomplete="off" class="Afiliacion_0">
                    <fieldset>
                        <legend>Datos personales</legend>
                        
                        <label>Nombre:</label>
                        <input type="text" name="nombre" id="Nombre" style="text-transform: capitalize;"/>
                        <br/>
                        <label>Apellido:</label>
                        <input type="text" name="apellido" id="Apellido" style="text-transform: capitalize;"/>
                        <br/>
                        <label>Cedula:</label>
                             <input type="text" name="cedula" id="Cedula" style="text-transform: lowercase;"/>
                        <br/>
                        <label>Teléfono:</label>
                             <input type="text" name="telefono" id="Telefono" onblur="validarFormatoTelefono(this.value)" onfocus="limpiarColorTelefono()" style="text-transform: lowercase;"/><!--validarFormatoTelefono() y limpiarColorTelefono() estan al final del archivo-->
                        <br/>
                        <label>Correo electronico:</label>
                             <input type="text" name="correo" id="Correo" onblur="validarFormatocorreo()" onclick="limpiarColorCorreo()" style="text-transform: lowercase;"/><!--validarFormatoCorreo() y limpiarColorCorreo() estan al final del archivo-->
                        <br/>
                        <label>Matricula MPPS:</label>
                             <input type="text" name="registro" id="Registro" style="text-transform: lowercase;"/>
                        <br/>
                        <label>Plan afiliacion:</label>
                            <select name="afiliacion" id="Afiliacion_3">  
                                <option></option>
                                <option value="Ini">Inicio</option>
                                <option value="Bas">Básico</option>
                                <option value="Esp">Especial</option>
                            </select>
                        <br/>
                        <label>Especialidad:</label>
                            <?php
                                include("../conexion/Conexion_BD.php");

                                $Consulta="SELECT * FROM especialidades ORDER BY especialidad ASC";
                                $Recordset=mysqli_query($conexion,$Consulta);
                            ?>
                                <select name="especialidad" id="Especialidad" onclick="habilitarEspecialidad()" /><!--La función habilitarEspecialidad() se encuentra en Funciones_varias.js-->
                                    <option></option>
                                        <?php
                                            while($especialista= mysqli_fetch_array($Recordset)){
                                            echo '<option value="'.$especialista['especialidad'].'">'.$especialista['especialidad'] .'</option>'; 
                                            }
                                        ?>  
                                </select>
                            <br/><hr><br/>
                            <span class="span_03">Introduzca su especialidad sino apareció en la lista, estos casos no aparecen de inmediato en el directorio médico.</span>
                            <input class="especial" type="text" name="especialidad_2" id="Especialidad_2" onblur="EvitarEspecialidad()" disabled style="text-transform: lowercase;" ><!--La función habilitarEspecialidad() se encuentra en Funciones_varias.js-->

                    
                    </fieldset>   
                    <br>                    
                    <fieldset class="Afiliacion_4">
                        <legend>Datos de Ubicacion Geografica</legend>
                        <label>Estado:</label>
                            <select class="etiqueta_24" name="estado" id="Estado"> 
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
                        <br>                        
                    </fieldset> 
                    <input id="AfiliacionSubmit" type="submit" value="Enviar" style="margin: 5% auto !important;" onclick="return validar_04();" /><!--validar_04() se encuentra en validar_Campos.js    -->
                </form>
            </div> 
                    
            <div class="texto">
                <span class="Inicio_11">Toda la información suministrada esta protegida por las Leyes de protección de datos existentes en nuestro pais.</span> 
                <span class="Inicio_11">(Constitución de la República Bolivariana de Venezuela, Ley del Ejercicio de la Medicina, Código de Deontología Médica y Ley Especial Contra Los Delitos Informáticos.)</span>
            </div>
				</div>
			</div>
		</div>
        <footer>
            <?php
                include("../header/footer.php")
            ?>
        </footer>
	</body>
</html>

<!--  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<script type="text/javascript">

    //Mascara de entrada para el telefono
    Telefono.addEventListener("input", function(){
        if(this.value.length == 4){
            this.value += "-"; 
        }
        else if(this.value.length == 8){
            this.value += ".";  
        }
        else if(this.value.length == 11){
            this.value += ".";  
        }
    }, false);


    //Validar el formato de telefono
    avisado=false;
    function validarFormatoTelefono(campo){
        var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
        if((campo.match(RegExPattern)) && (campo!='')){
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById("Telefono").value = "";
            document.getElementById("Telefono").style.backgroundColor = 'red'; 
            return false;
        }
    }

    //Validar el formato del correo
    function validarFormatocorreo(){ 
        if(document.getElementById("Telefono").style.backgroundColor == 'red'){//este if solo se hace para evitar el ciclo repetitivo que hace el evento onblur cuando existen más de dos en un formulario
            if(avisado== false){
                avisado= true; 
                setTimeout("avisado= false",50);
                document.getElementById("Correo").blur();           
            }
        }  
        else{
            campo = event.target;
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if(emailRegex.test(campo.value)){      
               return true;
            } 
            else{
                alert("Correo no aceptado");      
                document.getElementById("Correo").style.backgroundColor="red"; 
                document.getElementById("Correo").value = "";
                //document.getElementById("Registro").blur();
            }
        }
    }


        function limpiarColorTelefono(){
            document.getElementById("Telefono").value = "";        
            document.getElementById("Telefono").style.backgroundColor = "white";
        }

        function limpiarColorCorreo(){
            document.getElementById("Correo").value = "";        
            document.getElementById("Correo").style.backgroundColor = "white";
        }
</script>
