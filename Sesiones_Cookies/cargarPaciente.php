<?php   
session_start();  //Se reaunada la sesion abierta en validarSesion.php
$verifica = 1906;  
$_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica
?> 

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Cargar Pacientes</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Historia clinica de pacientes en Venezuela"/>
		<meta name="keywords" content="reporte medico,historia clinica, "/>
		<meta name="author" content="Pablo Cabeza"/>
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script> 
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Municipios.js"></script> 
        <script src="../Javascript/parroquias.js"></script> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
        </style>   
         <?php
            if(!isset($_SESSION["UsuarioDoct"])){//sino hay nada almacenado en la variable superglobal $_SESSION devuelve a 
                header("location:../DoctorAfiliado.php");           
           }
                include("../conexion/Conexion_BD.php");
                mysqli_query($conexion,"SET NAMES 'utf8' ");
                $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION

                $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
                $UsDoctor= mysqli_fetch_row($NombreDoctor);
                $UsDoctor[1]; //se obtiene el nombre del doctor.

                $fecha= date("d-m-Y");
            ?>      
    </head>	    
    <body>
        <div class="Principal" style="background-color:">
            <header class="fixed_1" style="background-color:; padding-bottom: 1%; height: 10%;">
                <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
                </div>
                <div style="background-color: ; float: right;  width: 25%;">
                    <?php
                            //Consulta para para colocar el nombre y apellido del Dr que abre sesión
                            $consulta_1="SELECT nombre_doctor, apellido_doctor, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                            $Recorset_1=mysqli_query($conexion,$consulta_1);
                            $Doctor_Datos= mysqli_fetch_array($Recorset_1);
                                if($Doctor_Datos["sexo"] == "F"){//femenino
                        ?>
                                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php } 
                                else if($Doctor_Datos["sexo"] == "M"){ //Masculino 
                                 ?>  
                                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }
                                else if($Doctor_Datos["sexo"] == ""){ //No especificó
                                ?>
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }  
                    ?>
                </div>
                <nav class="n41"  style="background-color: ">
                    <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="InicioSesion.php" >Consulta</a></div>
                    <div class="n44"><a href="RegistroPacientes.php" > Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual.php">Estadisticas</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php">HCD</a></div> 
                    <div class="n44"><a href="mostrarPerfilDoctor.php">Mi perfil</a></div>               
                </nav>
                <div style="background-color: #B7B653; width: 31%; margin-left: 0%; text-align: center;">  
                    <p style="margin-top:0.5%;  background-color: ; font-weight: bolder;  border-bottom-style: solid; border-bottom-color: #040652; border-bottom-width: 2px; padding-bottom: 0.5%; margin-right: 5%; height: 40%;  display: inline-block;"><a  style="cursor: default;">Nuevo paciente</a></p> 
                </div> 
        </header>

        <section style="margin-top: 10%;">     
                    
            <?php

                if(!isset($_POST["botonActualizar"])){//sino se a pulsado el boton actualizar de este archivo se recibe la varible $Paciente y se entra en el formulario

                ?>    
            <div style="background-color:; float: left; width: 25%; margin-left: 2.5%; margin-top: 1.6%; position: fixed;">
                   
                    <div style="background-color:; width: 100%; margin-top: 3%; margin-left: -1.5%; display: flex; justify-content: center; ">
                        <a style="margin: auto; display: block;" class="buttonCuatro" onclick="return Advertencia()" href="RegistroPacientes.php">Volver</a><!--la función Advertencia() se encuentra al final del archivo-->

                        <label style="margin: auto; display: block;" for="BotonGuardar" class="buttonCuatro" >Guardar</label>   
                    </div>
            </div>
            <div style="background-color:; width: 65%; float: right; margin-right: 4%;  position: relative; margin-top: 1.6%;">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" id="FormDoc" name="formDoc" autocomplete="off">

                    <fieldset class="historia_2">
                        <legend>Datos del Paciente</legend>
                        <label class="etiqueta_5" >Nombre</label>
                        <input  type="text" name="nombre_Paciente"  id="NombrePaciente" value=""> 
                        
                        <label class="etiqueta_6" for="ApellidoPaciente" >Apellido</label>
                        <input class="" type="text" name="apellido_Paciente"  id="ApellidoPaciente" value="">
                        <br>
                        <label class="etiqueta_5">Cedula</label>
                        <input type="text" name="cedula_Paciente"  id="CedulaPaciente" value="">
                       
                        <label class="etiqueta_6">Lugar de Residencia</label>
                        <input type="text" name="residencia_Paciente" id="Residencia_Paciente" value="">
                        
                        <br>
                        <label class="etiqueta_5">Sexo</label>
                        <input type="text" name="sexo_Paciente" id="SexoPaciente" value="">
                        
                        <label class="etiqueta_6">Nacionalidad</label>
                        <input type="text" name="nacionalidad_Paciente" id="Nacionalidad_Paciente" value="">
                        <br> 
                        <label class="etiqueta_5">Estado Civil</label>
                        <input type="text" name="estadoCivil_Paciente" id="EstadoCivil_Paciente" value="">
                                                 
                        <label class="etiqueta_6">Lugar Nacimiento</label>
                        <input type="text" name="lugarNacimiento_Paciente" id="LugarNacimiento_Paciente" value=""> 
                        <br>

                        <label class="etiqueta_5">Fecha Nacimiento</label>   
                        <input type="text" name="fechaNacimiento_Paciente" id="FechaNacimiento_Paciente" onblur="llamar_calculaEdad(this.value)" placeholder="00-00-0000" autocomplete="off"><!-- la funcion llamar_calculaEdad() se encentra en Ajax_Cancelar.js-->
                         
                        <label class="etiqueta_6">Edad</label>
                        <!--se utiliza un div porque es un dato calcuo utlizando AJAX, y ajax devuelve el resultado a un div-->
                        <div id="Edad" name="edad"  style="background-color:white; border-style: solid; border-color: rgba(4,6,82,0.4); border-width: 1px; width: 20.2%; height: 21px; display: inline-block; text-align: center;">&nbsp;</div>
                        <input type="text" name="edadOculta" hidden id="EdadOculta">

                        <!--Se pasa el valor del DIV que contiene la edad a un INPUT oculto, este ultimo es quien manda la edad a la BD-->
                        <script type="text/javascript">
                            document.forms["FormDoc"].onsubmit = function(){
                                var texto = document.getElementById("EdadOculta").value = document.getElementById("Edad").innerHTML;
                                //alert(texto);
                            }  
                        </script>
                        <br> 

                        <label class="etiqueta_5">Grupo Sanguineo</label>
                        <select name="grupoSanguineo" id="Sangre" style="text-align: center; width: 20.5%;" >
                            <option></option>
                            <option>O -</option>
                            <option>O +</option>
                            <option>A -</option>
                            <option>A +</option>
                            <option>B -</option>
                            <option>B +</option>
                            <option>AB -</option>
                            <option>AB +</option>
                        </select>
                        <label class="etiqueta_6">Telefono</label>
                        <input type="text" name="telefono" id="Telefono" value="">
                        <br>
                            <label class="etiqueta_5">Grado de Instrucción</label>
                            <input type="text" name="nacionalidad_Paciente" readonly="readonly" id="NombrePaciente" value="">
                            
                            <label class="etiqueta_6">Ocupación</label>
                            <input type="text" name="estadoCivil_Paciente" readonly="readonly" id="NombrePaciente" value="">
                                                        
                            <label class="etiqueta_5">Religion</label>
                            <input type="text" name="nacionalidad_Paciente" readonly="readonly" id="NombrePaciente" value="">
                        
                        <hr style="margin-top: 1%; margin-bottom: 2%; width: 93%;">
                        <div style="background-color: ; margin-bottom: -2.5%;">
                            <label class="etiqueta_8">Dirección</label>
                            <select name="estado" id="Estado" style="margin-left: 1.5%; width: 20.5%;" onchange="SeleccionarMunicipio(this.form)"> 
                                    <option value=""></option>
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

                            <select name="municipio" id="Municipio" style="margin-left: 1.5%; width: 20.5%;" onchange="SeleccionarParroquia(this.form)" > 
                                    <option value=""></option>
                                    <option></option>
                            </select>                       


                            <select name="parroquia" id="Parroquia" style="margin-left: 1.5%; width: 20.5%;"> 
                                    <option value=""></option>
                                    <option></option>
                            </select> 


                            <textarea style="margin-left: 20%;" rows="2" cols="60" name=direccion id="Direccion" ></textarea>
                        </div>
                        <br>
                        <label class="etiqueta_8">En caso de emergencia</label>
                        <textarea rows="2" cols="60" name="emergencia" id="Emergencia" ></textarea>
                    </fieldset> 

                    <fieldset class="historia_2" style="margin-top: 4%;">
                        <legend>Antecedentes personales patológicos</legend>
                            <label class="etiqueta_7" for="diabete">Diabetes Mellitus</label>
                            <input type="checkbox" id="diabete">
                            <label class="etiqueta_7">Cardiopatía</label>
                            <input type="checkbox">
                            <label class="etiqueta_7">HTA</label>
                            <input type="checkbox">
                            <label class="etiqueta_7">Alergias</label>
                            <input type="checkbox">
                            <label class="etiqueta_7">ECV</label>
                            <input type="checkbox">
                            <label class="etiqueta_7">EPOC</label>
                            <input type="checkbox">
                            <label class="etiqueta_7">Asma</label>
                            <input type="checkbox">
                            <label class="etiqueta_7">Hepatopatías</label>
                            <input type="checkbox">
                            <label class="etiqueta_7 ">Nefropatías</label>
                            <input type="checkbox">
                            <hr style="margin-top: 1%; margin-bottom: 1%; width: 93%;">
                            <label class="etiqueta_8">QX</label>
                            <textarea rows="2" cols="60" name="qx" id="Qx"></textarea>
                            <br>
                            <label class="etiqueta_8">Otros</label>
                            <textarea rows="2" cols="60" name="otros" id="Otros"></textarea>
                            <label class="etiqueta_8">Tratamiento habitual</label>
                            <textarea rows="2" cols="60" name="tratamiento" id="Tratamiento"></textarea>
                            <br>
                            <label class="etiqueta_8">Antecedentes familiares</label>
                            <textarea rows="2" cols="60" name="antecedentes" id="Antecedentes"></textarea>

                    </fieldset>

                    <fieldset class="historia_2" style="margin-top: 4%; margin-bottom: 8%;">
                        <legend>Habitos Psicobiologicos</legend>
                         <div style="background-color: ; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); margin-bottom: 2%; " >
                                    <label style="background-color: ; font-weight: bolder; font-size: 16px; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Cafe</label>
                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -9%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%; margin-bottom: -10%;">Si</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%;">No</label><br>

                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: 0px; ">Frecuencia:</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -13%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">1 taza al dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">2 tazas al dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">3 tazas al dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width:15%; display: inline-block; font-size: 13px; margin-left: -8%; position: relative; top:8px;">mas de 5 tazas diarias</label>
                                </div>
                                <div style="background-color: ; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); margin-bottom: 2%; " >
                                    <label style="background-color: ; font-weight: bolder; font-size: 16px; margin-left: 0%; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Fuma</label>
                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -9%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%; ">Si</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%;">No</label><br>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -9%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%; ">Cigarrillo</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Tabaco</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Pipa</label><br>

                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: 0px; ">Frecuencia:</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -13.5%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">1 por dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">2 por dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">3 por dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width:15%; display: inline-block; font-size: 13px; margin-left: -8%; position: relative; top:0px;">mas de 5 por dia</label>

                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: 0px; ">Anteriormente fumaba:</label>
                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -9%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%; ">Si</label>
                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%;">No</label><br>
                                    <label class="" for="diabete" style="background-color: ; width: 25%; display: inline-block; font-size: 13px; margin-top: 1%; ">¿Cuantos cigarrilos al dia?</label>
                                    <input type="text" id="diabete"  style="background-color: ; margin-top: 1%; width: 5%; ">
                                    <label class="" for="diabete" style="background-color: ; width: 25%; display: inline-block; font-size: 13px; margin-top: 1%; margin-left: 5%; ">¿Años de consumo?</label>
                                    <input type="text" id="diabete"  style="background-color: ; margin-top: 1%; margin-left: -6%; width: 5%; ">
                                    <label class="" for="diabete" style="background-color: ; width: 25%; display: inline-block; font-size: 13px; margin-top: 1%; margin-left: 5%; ">Indice de consumo</label>
                                    <input type="text" id="diabete"  style="background-color: ; margin-top: 1%; margin-left: -8%; width: 5%;" readonly>
                                </div>
                                <div style="background-color: ; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); margin-bottom: 2%; " >
                                    <label style="background-color: ; font-weight: bolder; font-size: 16px; margin-left: 0%; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Alcohol</label>
                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -9%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%; ">Si</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%;">No</label><br>

                                    
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-top: 1%; ">¿Que tipo de bebida?</label>
                                    <input type="text" id="diabete"  style="background-color: ; margin-top: 1%;">

                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: 6.5%; margin-top: 1%; ">¿Cuanto por dia?</label>
                                    <input type="text" id="diabete"  style="background-color: ; margin-top: 1%;"><br>

                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: 0px; ">Frecuencia:</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -13.5%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">1 dia por semana</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -4%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">2 dias por semana</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -4%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">3 dias por semana</label><br>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: 7%">
                                    <label class="" for="diabete" style="background-color: ; width:25%; display: inline-block; font-size: 13px; margin-left: -8%; position: relative; top:0px;">mas de 4 dias por semana</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -9%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Diario</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -4%">
                                    <label class="" for="diabete" style="background-color: ; width:15%; display: inline-block; font-size: 13px; margin-left: -8%; position: relative; top:0px;">Ocasionalmente</label>
                                </div>
                                <div style="background-color: ; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); margin-bottom: 2%; " >
                                    <label style="background-color: ; font-weight: bolder; font-size: 16px; margin-left: 0%; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Chimo</label>
                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -9%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%; ">Si</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%;">No</label><br>

                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: 0px; ">Frecuencia:</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -13.5%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">1 por dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">2 por dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">3 por dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width:15%; display: inline-block; font-size: 13px; margin-left: -8%; position: relative; top:0px;">mas de 5 por dia</label>
                                </div>
                                <div style="background-color: ; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); margin-bottom: 2%; " >
                                    <label style="background-color: ; font-weight: bolder; font-size: 16px; margin-left: 0%; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Mastica tabaco</label>
                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -9%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%; ">Si</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%;margin-bottom: -10%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;margin-bottom: -10%;">No</label><br>

                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: 0px; ">Frecuencia:</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -13.5%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">1 por dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">2 por dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">3 por dia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                    <label class="" for="diabete" style="background-color: ; width:15%; display: inline-block; font-size: 13px; margin-left: -8%; position: relative; top:0px;">mas de 5 por dia</label>
                                </div>
                       
                        <br>
                        <label class="etiqueta_5">Drogas</label>
                        <input type="text" name="drogas"  id="Drogas" value="">
                        
                        <label class="etiqueta_6">Sexuales</label>
                        <input type="text" name="sexuales_Paciente" id="Sexuales_Paciente" value="">            
                    </fieldset>

                        <br> 
                        <input type="text" id="Doctor" name="doctor" hidden value="<?php echo $especialista=$_SESSION["UsuarioDoct"];?>"> <!--se envia el ID del doctor a Ajax_Cancelar.js para agendar cita-->
                        <input type="submit" value="Actualizar" hidden id="BotonGuardar" name="botonActualizar" onclick=" return validar_06();" >   
            </div>
        </form> 
       
        <footer>
            <nav class="n41">
                <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                <div class="n44"><a href="InicioSesion.php">Consulta</a></div>
                <div class="n44"><a href="RegistroPacientes.php"> Mis pacientes</a></div>
                <div class="n44"><a href="ReporteMensual.php">Estadisticas</a></div>   
                <div class="n44"><a href="HCD.php">HCD</a></div>              
            </nav>
            <br><br>
            <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela_(+58) 0424-516.59.38</p>
        </footer> 
        </div>        
    </div>
    </body>
</html>

<?php
    }
    else{//si se a pulsado el boton actualizar de este archivo se actualizan los datos
        //se reciben los datos  desde este mismo formulario.
            $NombrePacient= $_POST["nombre_Paciente"];
            $ApellidoPacient= $_POST["apellido_Paciente"];
            $CedulaPacient= $_POST["cedula_Paciente"];
            $Edad= $_POST["edadOculta"];
            $Sexo= $_POST["sexo_Paciente"];
            $Nacionalidad= $_POST["nacionalidad_Paciente"];
            $EstadoCivil=  $_POST["estadoCivil_Paciente"];
            $Nacimiento= $_POST["lugarNacimiento_Paciente"];
            $FechaNacimiento= $_POST["fechaNacimiento_Paciente"];
            $Residencia= $_POST["residencia_Paciente"];
            $Sangre= $_POST["grupoSanguineo"];
            $Telefono= $_POST["telefono"];
            $Estado= $_POST["estado"];
            $Municipio= $_POST["municipio"];
            $Parroquia= $_POST["parroquia"];
            $Direccion= $_POST["direccion"];
            $Emergencia= $_POST["emergencia"];

           // echo $NombrePacient ."<br>";
           // echo $ApellidoPacient ."<br>";
           // echo $CedulaPacient ."<br>";
           // echo $Edad ."<br>";
           // echo $Sexo ."<br>";
           // echo $Nacionalidad ."<br>";
           // echo $EstadoCivil ."<br>";
           // echo $Nacimiento ."<br>";
           // echo $FechaNacimiento ."<br>";
           // echo $Residencia ."<br>";
           // echo $Sangre ."<br>";
           // echo $Telefono ."<br>";
           // echo $Estado ."<br>";
           // echo $Municipio ."<br>";
           // echo $Parroquia ."<br>";= ==,=,=,=,
           // echo $Direccion ."<br>";=,=,=,=,=,=
           // echo $Emergencia ."<br>";===== 

            //se cambia el formato de la fecha a Y-m-d antes de insertarlo en la BD
            $fechaFormatoMySQL = date("Y-m-d", strtotime($FechaNacimiento));

    $Actualizar=" INSERT INTO pacientes_registrados(ID_Doctor, nombre_pacient, apellido_pacient, cedula_pacient, edad_pacient, sexo_pacient, nacionalidad_pacient, estadoCivil_pacient, lugarNacimiento_pacient, fechaNacimiento_pacient, lugarResidencia_pacient, grupoSanguineo_pacient, telefono_pacient, estado_pacient, municipio_pacient, parroquia_pacient, direccion_pacient, emergencia_pacient) VALUES('$sesion', '$NombrePacient','$ApellidoPacient','$CedulaPacient','$Edad','$Sexo','$Nacionalidad','$EstadoCivil','$Nacimiento','$fechaFormatoMySQL','$Residencia','$Sangre','$Telefono','$Estado','$Municipio','$Parroquia','$Direccion','$Emergencia')";

    mysqli_query($conexion,$Actualizar);

    unset($_SESSION["Cedula"]);//se borra la variable verifica.

    //se redirecciona a la pagina RegistroPacientes.php
   // echo "<meta http-equiv='Refresh' content='RegistroPacientes.php'>";
    
    //header("location:RegistroPacientes.php"); //en este caso no funcina esta sentencia porque hay echos en el codigo antes del header
    echo '<script type="text/javascript">window.location.href="RegistroPacientes.php";</script>'; 

}

?>

    <script type="text/javascript">
        function Advertencia(){
           if(confirm("No ha guardado los cambios, si sale de esta página perdera los datos introducidos")==true){
                    //alert('Salir');


                    return true;
           }
           else{
                //alert('Cancelo la salida');
                return false;
           }
        }
    </script>
