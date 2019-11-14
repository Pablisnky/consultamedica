<?php   
    session_start();  
    $verifica_2 = 1906;  
    $_SESSION["verifica_2"] = $verifica_2; 
    //Se crea esta sesion para impedir que se acceda a la pagina que procesa el formulario o se recargue mandadolo varias veces a la base de datos

    //
    include("../Clases/muestraError.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Solicitar medicinas</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Formulario para cargar medicinas al sistema."/>
		<meta name="keywords" content="medicina, medicamento, cargar"/>
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
        <script type="text/javascript" src="../Javascript/ajaxBuscador.js"></script>
        <script type="text/javascript" src="../Javascript/Ajax_Cancelar.js"></script>  
	</head>	
	<body onload= "autofocusRegistroGratis()">  <!--autofocusRegistroGratis() se encuentra en Funciones_varias.js-->
        <header class="fixed_1">
    		<?php 
    			include("../header/headerPrincipal_2.php");
    		?>
        </header>			
        <div id="A_1" class="ocultarMenu" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
			<h3>Solicitar medicamentos</h3>
            <p class="Inicio_1">LLene el formulario y solicite un medicamento.</p>
			<div id="A_2" class="Afili_3">
				<form action="recibeSolicitudMedicamento.php" method="POST" autocomplete="off" class="Afiliacion_0">
                    <fieldset class="Afiliacion_4">
                        <legend>Datos del medicamento</legend>
                            <label>Nombre medicamento:</label>
                            <input type="text" name="nombre_MedSol" id="NombreMedSol">
                            <br>
                            <label>Principio activo:</label>
                            <input type="text" name="principio_MedSol" id="PrincipioMedSol">
                            <br>                       
                            <label>Presentacion:</label>
                            <select name="presentacion_MedSol" id="PresentacionMedSol">
                                <option></option>
                                <option>Aerosol</option>
                                <option>Ampollas</option>
                                <option>Comprimido</option>
                                <option>Crema</option>
                                <option>Gotas</option>
                                <option>Jarabe</option>
                                <option>Loción</option>
                                <option>Pastilla</option>                                    
                                <option>Parche</option>                                   
                                <option>Tableta</option>
                            </select>
                            <br> 
                            <label>Laboratorio:</label>
                            <input type="text" name="laboratorio_MedSol" id="Laboratorio_MedSol">
                            <br>       
                            <label>Especificaciones:</label>
                            <input type="text" name="especificacion_MedSol" id="Especificacion_MedSol" placeholder="500 mg" /> 
                            <br>
                            <label>Cantidad:</label>
                            <input type="text" name="cantidad_MedSol" id="Cantidad_MedSol" placeholder="Caja de 5 unidades">
                            <br>                 
                    </fieldset> 
                    
                    <br class="ocultar">
                    <br class="ocultar">                    
                    <br class="ocultar">

					<fieldset class="Afiliacion_4">
                        <legend>Datos del solicitante</legend>
                        <label>Nombre:</label>
                        <input type="text" name="nombre_Solicitante" id="Nombre_Solicitante">
                        <br>
                        <label>Apellido:</label>
                        <input type="text" name="apellido_Solicitante"  id="Apellido_Solicitante">
                        <br>                     
                        <label>Telefono:</label>
                        <input type="text" name="telefono_Solicitante" id="Telefono_Solicitante" onblur="validarFormatotelefono(this.value)" onfocus="limpiar_4()""> <!--  se encentra al final de este archivo -->
                        <br>                      
                        <label>Estado:</label>
                        <select name="estado_Solicitante" id="Estado_Solicitante"> 
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

                    <input type="submit" id="Envio" class="btn_verTodo" style="margin:auto; " value="Solicitar" onclick="return validar_13()"/>
				</form>  

                <hr>

                <br>
                <br>
                <a style='margin: auto; display: block; margin: auto;'  href='javascript:history.back(1)' class='buttonCuatro'>Regresar</a>
            </div><!--Cierre A_2-->
        </div><!--Cierre A_1--> 

        <footer>
            <?php
                include("../header/footer.php")
            ?>
        </footer>
	</body>
</html>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<script type="text/javascript">
//Mascara de entrada para el telefono
    Telefono_Solicitante.addEventListener("input", function(){
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

//Validar el formato de telefono
    function validarFormatotelefono(campo){
        var RegExPattern = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
        if((campo.match(RegExPattern)) && (campo!='')){
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById("Telefono_Solicitante").value = "";
            document.getElementById("Telefono_Solicitante").style.backgroundColor="red"; 
            return false;
        }
    }

    function limpiar_4(){
        document.getElementById("Telefono_Solicitante").value = "";        
        document.getElementById("Telefono_Solicitante").style.backgroundColor = "white"; 
        document.getElementById("Telefono_Solicitante").style.color="black";
    }
</script>