<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");

    $verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica
        
    date_default_timezone_set('America/Caracas');
    $fecha= date("d-m-Y");


    // se busca que tipo de plan tienen el Dr.
    $Consulta= "SELECT * FROM doctores INNER JOIN usuario_doctor ON doctores.ID_Doctor=usuario_doctor.ID_Doctor WHERE doctores.ID_Doctor='$sesion'";
    $Recordset= mysqli_query($conexion,$Consulta);
    $DatosDoctor= mysqli_fetch_array($Recordset);
    $PlanAfiliado= $DatosDoctor["planAfiliado"]; //se obtiene el plan afiliado del doctor.
    // echo "EL plan del Dr es: " . $PlanAfiliado . "<br>";

    switch($PlanAfiliado){
        case 'Ini':
            $Plan= "Ini";
        break;
        case 'Bas':
            $Plan= "Bas";
        break;
        case 'Esp':
            $Plan= "Esp";
        break;
    }

?> 

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Actualizar datos</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Historia clinica de pacientes en Venezuela"/>
		<meta name="keywords" content="reporte medico,historia clinica, "/>
		<meta name="author" content="Pablo Cabeza"/>
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Municipios.js"></script> 
        <script src="../Javascript/parroquias.js"></script>  
        <script src="../Javascript/Municipios_Nac.js"></script> 
        <script src="../Javascript/parroquias_Nac.js"></script> 
    </head>	    
    <body onload="llamar_calculaEdad_2(this.value)"><!-- Esta función se encuentra en en Ajax_Cancelar.js -->
        <div class="Principal">          
            <header class="fixed_1">
                <?php
                    include("../header/headerDoctor.php")
                ?>
                <div style="background-color: rgba(244, 248, 6, 0.7); width: 31%; margin-left: 0%; text-align: center;">  
                    <p style="margin-top:0.5%;  background-color: ; font-weight: bolder;  border-bottom-style: solid; border-bottom-color: #040652; border-bottom-width: 2px; padding-bottom: 0.5%; margin-right: 5%; height: 40%; display: inline-block;"><a style="cursor: default;">Actualizar registro médico</a></p> 
                </div>
            </header>
            <section style="background-color: red; margin-top: 8%;">     
                    
                <?php

                if(!isset($_POST["botonActualizar"])){//sino se a pulsado el boton actualizar de este archivo se recibe la varible $Paciente y se entra en el formulario

                    $Paciente= $_GET["cedulaPaciente"];//se recibe desde RegistroPacientes.php y HistoriasClinicas.php
                    // echo $Paciente . "<br>";

                    // $Variante= $_GET["variante"];//se recibe desde RegistroPacientes.php y HistoriasClinicas.php
                    // echo $Variante . "<br>";

                    $_SESSION["Cedula"]=$Paciente;//se crea para utilizarla en el else de este mismo archivo, debería destruirse de una vez esta sesion.
                    //echo $_SESSION["Cedula"];

                    $Consulta_2="SELECT * FROM pacientes_registrados WHERE cedula_pacient='$Paciente' ";
                    $Recordset_2=mysqli_query($conexion,$Consulta_2);      
                    $MiPaciente= mysqli_fetch_array($Recordset_2);

                    //se cambia el formato de la fecha a d-m-Y
                    $fechaFormatoMySQL=$MiPaciente["fechaNacimiento_pacient"];
                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));


    if($Plan == "Ini"){
        $Enviar_2= "Promo.php";
        $Enviar_3= "Promo.php";
        $Enviar_4= "actualizarDatos.php?cedulaPaciente=$Paciente";
        ?>
        <style>
            .NoAplica{
                color: #FE0202;
            }
        </style>
        <?php
    }
    else if($Plan == "Bas"){
        $Enviar_2= "Promo.php";
        $Enviar_3= "diagnostico.php?ultimoDiagnostico=$FechaUltimoDiagnostico";
        $Enviar_4= "actualizarDatos.php?cedulaPaciente=$Paciente";
    }
    else if($Plan == "Esp"){
        $Enviar_2 ="";
    }

                ?>    
            <div style="background-color:; float: left; width: 25%; margin-left: 2.5%; margin-top: 1.6%; position: fixed;">
                    <div>
                        <br>
                        <fieldset style="border-radius: 15px; padding: 2%">
                            <legend>Paciente</legend>
                            <label class="etiqueta_19">Nombre</label>
                            <input  style="margin-bottom: 1.5%;" type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $MiPaciente['nombre_pacient'];?>" > 
                            <br>
                            <label class="etiqueta_19">Apellido</label>
                            <input  style="margin-bottom: 1.5%;"  class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $MiPaciente['apellido_pacient'];?>" >
                            <br>
                            <label class="etiqueta_19">Cedula</label>
                            <input  style="margin-bottom: 1.5%;"  type="text" name="cedula_Paciente" readonly="readonly" value="<?php echo $MiPaciente['cedula_pacient'];?>">
                            <br>
                            <label class="etiqueta_19">Fecha</label>
                            <input  style="margin-bottom: 1.5%;"  type="text" name="fecha_consulta" readonly value="<?php echo $fecha;?>">
                        </fieldset>                
                    </div>

                    <div style="background-color:; width: 100%; margin-top: 3%; margin-left: -1.5%; display: flex; justify-content: center; "> 
                            <a style="margin: auto; display: block;" class="buttonCuatro" onclick="return Advertencia()"  href="RegistroPacientes.php">Volver</a><!--la función Advertencia() se encuentra al final del archivo-->
                            <label style="margin: auto; display: block;" for="BotonActualizar" class="buttonCuatro">Guardar</label>  
                    </div>
            </div>

            <div style="background-color:; width: 65%; float: right; margin-right: 4%;  position: relative; margin-top: 1.6%;">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="formDoc" id="FormDoc">
                    <fieldset class="historia_2">
                        <legend>Datos del Paciente</legend>                        
                        <label class="etiqueta_5" >Nombre</label>
                        <input  type="text" name="nombre_Paciente"  id="NombrePaciente" value="<?php echo $MiPaciente['nombre_pacient'];?>">
                        <br class="ocultar">
                        <label class="etiqueta_6" for="ApellidoPaciente" >Apellido</label>
                        <input class="" type="text" name="apellido_Paciente"  id="ApellidoPaciente" value="<?php echo $MiPaciente['apellido_pacient'];?>">
                        <br>
                        <label class="etiqueta_5">Cedula</label>
                        <input type="text" name="cedula_Paciente"  id="CedulaPaciente" value="<?php echo $MiPaciente['cedula_pacient'];?>">
                        <br class="ocultar">                        
                        <label class="etiqueta_6">Telefono</label>
                        <input type="text" name="telefono" id="TelefonoPaciente" value="<?php echo $MiPaciente['telefono_pacient'];?>">
                        <br>                 
                        <label class="etiqueta_5">Nacionalidad</label>
                        <input type="text" name="nacionalidad_Paciente" id="NacionalidadPaciente"  value="<?php echo $MiPaciente['nacionalidad_pacient'];?>">
                        <br class="ocultar"> 
                        <label class="etiqueta_6">Estado Civil</label>
                        <select class="registro_01" name="estadoCivil_Paciente" id="EstadoCivilPaciente" >
                            <option ><?php echo $MiPaciente['estadoCivil_pacient'];?></option>
                            <option>Soltero</option>
                            <option>Casado</option>
                            <option>Divorciado</option>
                            <option>Viudo</option>
                        </select>
                        <br class="ocultar"> 
                        <label class="etiqueta_5">Fecha Nacimiento</label>
                        <input type="text" name="fechaNacimiento_Paciente" id="FechaNacimientoPaciente" onblur="llamar_calculaEdad_2(this.value)" placeholder="00-00-0000" autocomplete="off" value="<?php echo $fechaFormatoPHP;?>"> <!-- la funcion llamar_calculaEdad() se encuentra en Ajax_Cancelar.js-->
                         
                        <label class="etiqueta_6">Edad</label>
                        <div id="Edad" class="edad_2"></div><!--recibe desde calculoEdad.php la edad del paciente-->              
                        <!--Se pasa el valor del DIV que contiene la edad a un INPUT oculto, este ultimo es quien manda la edad a la BD-->
                        <script type="text/javascript">
                            document.forms["formDoc"].onsubmit = function(){
                                var texto = document.getElementById("EdadOculta").value = document.getElementById("Edad").innerHTML;
                                //alert(texto);
                            }  
                        </script>
                        <input type="text" name="edadOculta" hidden id="EdadOculta" value="<?php echo $MiPaciente['edad_pacient'];?>">
                        <br> 
                        <label class="etiqueta_5">Grupo Sanguineo</label>
                        <select class="registro_01" name="grupoSanguineo" id="Sangre">
                            <option><?php echo $MiPaciente['grupoSanguineo_pacient'];?></option>
                            <option>O -</option>
                            <option>O +</option>
                            <option>A -</option>
                            <option>A +</option>
                            <option>B -</option>
                            <option>B +</option>
                            <option>AB -</option>
                            <option>AB +</option>
                        </select>
                        <br class="ocultar">
                        <label class="etiqueta_6">Sexo</label>
                        <select class="registro_01" name="sexo_Paciente" id="SexoPaciente">
                            <option><?php echo $MiPaciente['sexo_pacient'];?></option>
                            <option>Femenino</option>
                            <option>Masculino</option>
                        </select>
                        <br>       
                        <label class="etiqueta_5">Grado de Instrucción</label>
                        <select class="registro_01"  name="gradoInstruccion" id="GradoInstruccion">
                            <option><?php echo $MiPaciente['gradoInstruccion'];?></option>
                            <option>Primaria</option>
                            <option>Bachiller</option>
                            <option>Universitario</option>
                            <option>Maestría</option>
                            <option>Doctorado</option>                            
                            <option>Sin estudio</option>
                        </select>
                        <br class="ocultar">    
                        <label class="etiqueta_6">Ocupación</label>
                        <input type="text" name="ocupacion" id="Ocupacion" value="<?php echo $MiPaciente['ocupacion'];?>">
                        <br>                            
                        <label class="etiqueta_5">Religion</label>
                        <input type="text" name="religion"  id="Religion" value="<?php echo $MiPaciente['religion'];?>">
                        <br class="ocultar">    
                        <label class="etiqueta_6">Correo electronico</label>
                        <input type="text" name="correo" id="Correo" value="<?php echo $MiPaciente['correo_pacient'];?>">
                        <label class="etiqueta_5">Nº Hijos</label>
                        <input type="text" name="hijos" id="Hijos" value="<?php echo $MiPaciente['hijos'];?>">

                        <hr style="margin: 1% auto;">
                        
                        <div style="background-color: ; width: 45%; float: left;">
                            <label class="etiqueta_5" style="width: 45%;">Lugar de Residencia</label>
                            <br><br>
                                <label class="etiqueta_23">Estado</label>
                                <select class="etiqueta_24" name="estadoResidencia" id="EstadoResidencia" onchange="SeleccionarMunicipio(this.form)"> 
                                        <option><?php echo $MiPaciente['estado_Residencia'];?></option>
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
                            <label class="etiqueta_23">Municipio</label>
                            <select  class="etiqueta_24" name="municipioResidencia" id="MunicipioResidencia" onchange="SeleccionarParroquia(this.form)"> <!--esta funcion se encuentra en Municipios.js-->
                                    <option><?php echo $MiPaciente['municipio_Residencia'];?></option>      
                            </select>                       
                            <br>
                            <label class="etiqueta_23">Parroquia</label>
                            <select  class="etiqueta_24" name="parroquiaResidencia" id="ParroquiaResidencia"> 
                                <option><?php echo $MiPaciente['parroquia_Residencia'];?></option>                        
                            </select>
                        </div>
                        <div class="registro_4">
                            <label class="etiqueta_5" style="width: 40%;">Lugar Nacimiento</label> 
                            <br><br>
                            <label class="etiqueta_25">Estado</label>
                            <select class="etiqueta_26" name="estadoNacimiento" id="EstadoNacimiento" onchange="SeleccionarMunicipio_Nac(this.form)"> 
                                    <option><?php echo $MiPaciente['estado_Nacimiento'];?></option>
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
                            <label class="etiqueta_25">Municipio</label>
                            <select  class="etiqueta_26" name="municipioNacimiento" id="MunicipioNacimiento" onchange="SeleccionarParroquia_Nac(this.form)"> <!--esta funcion se encuentra en Municipios.js-->
                                    <option><?php echo $MiPaciente['municipio_Nacimiento'];?></option>      
                            </select>                      
                            <br>
                            <label class="etiqueta_25">Parroquia</label>
                            <select  class="etiqueta_26" name="parroquiaNacimiento" id="ParroquiaNacimiento"> 
                                <option><?php echo $MiPaciente['parroquia_Nacimiento'];?></option>
                            </select>
                        </div>
                        <label class="etiqueta_12">Especifique dirección actual</label>                    
                        <textarea  class="etiqueta_11" rows="3"  name=direccionActual id="DireccionActual" ><?php echo $MiPaciente['direccion_Actual'];?></textarea>
                        
                        <br>
                        <label class="etiqueta_12">En caso de emergencia</label>
                        <textarea  class="etiqueta_11" rows="3" name="emergencia" id="Emergencia" ><?php echo $MiPaciente['emergencia_pacient'];?></textarea>
                    </fieldset>             
                        <input style="visibility:hidden" type="submit"  id="BotonActualizar" name="botonActualizar" onclick="return validar_06();" > 
                        <input type="text" hidden  id="Doctor" name="doctor" value="<?php echo $especialista=$_SESSION["UsuarioDoct"];?>"> <!--se envia el ID del doctor a Ajax_Cancelar.js para agendar cita-->
                          
                </div>
            </form>  
        </div>        
    </div>
    </body>
</html>

<?php
    }
    else{//si se a pulsado el boton actualizar de este archivo se actualizan los datos


            $Cpaciente= $_SESSION["Cedula"];
            //se reciben los datos de actualización desde este mismo formulario.
            $NombrePacient= $_POST["nombre_Paciente"];
            $ApellidoPacient= $_POST["apellido_Paciente"];
            $CedulaPacient= $_POST["cedula_Paciente"];
            $FechaNacimiento= $_POST["fechaNacimiento_Paciente"];
            $Edad= $_POST["edadOculta"];
            $Sexo= $_POST["sexo_Paciente"];
            $Correo= $_POST["correo"];
            $Nacionalidad= $_POST["nacionalidad_Paciente"];
            $EstadoCivil=  $_POST["estadoCivil_Paciente"];
            $Sangre= $_POST["grupoSanguineo"];
            $Telefono= $_POST["telefono"];
            $Hijos= $_POST["hijos"];
            $Estado_Res= $_POST["estadoResidencia"];
            $Municipio_Res= $_POST["municipioResidencia"];
            $Parroquia_Res= $_POST["parroquiaResidencia"];
            $Estado_Nac= $_POST["estadoNacimiento"];
            $Municipio_Nac= $_POST["municipioNacimiento"];
            $Parroquia_Nac= $_POST["parroquiaNacimiento"];
            $Direccion_Act= $_POST["direccionActual"];
            $Emergencia= $_POST["emergencia"];
            $GradoInstruccion= $_POST["gradoInstruccion"];
            $Ocupacion= $_POST["ocupacion"];
            $Religion=  $_POST["religion"];

           
            //echo "Cedula" . $CedulaPacient ."<br>";
            // echo $NombrePacient ."<br>";
            // echo $ApellidoPacient ."<br>";
            // echo $Edad ."<br>";
            // echo $Sexo ."<br>";
            // echo $Nacionalidad ."<br>";
            // echo $EstadoCivil ."<br>";
            // echo $Nacimiento ."<br>";
            // echo $FechaNacimiento ."<br>";
            // echo $Hijos
            // echo $Sangre ."<br>";
            // echo $Telefono ."<br>";
            // echo $Estado ."<br>";
            // echo $Municipio ."<br>";
            // echo $Parroquia ."<br>";
            // echo $Direccion ."<br>";
            // echo $Emergencia ."<br>";

            //se cambia el formato de la fecha a Y-m-d antes de insertarlo en la BD
            $fechaFormatoMySQL = date("Y-m-d", strtotime($FechaNacimiento));

    $Actualizar=" UPDATE pacientes_registrados SET nombre_pacient= '$NombrePacient', apellido_pacient= '$ApellidoPacient' , cedula_pacient='$CedulaPacient', fechaNacimiento_pacient='$fechaFormatoMySQL', edad_pacient='$Edad', sexo_pacient='$Sexo', correo_pacient= '$Correo', hijos='$Hijos', nacionalidad_pacient='$Nacionalidad', estadoCivil_pacient='$EstadoCivil', grupoSanguineo_pacient='$Sangre', telefono_pacient='$Telefono', estado_Residencia='$Estado_Res', municipio_Residencia='$Municipio_Res', parroquia_Residencia='$Parroquia_Res', estado_Nacimiento='$Estado_Nac', municipio_Nacimiento= '$Municipio_Nac', parroquia_Nacimiento= '$Parroquia_Nac', direccion_Actual='$Direccion_Act', emergencia_pacient='$Emergencia', gradoInstruccion= '$GradoInstruccion', ocupacion= '$Ocupacion', religion='$Religion'  WHERE cedula_pacient='$Cpaciente' ";

    mysqli_query($conexion,$Actualizar);

    unset($_SESSION["Cedula"]);//se borra la variable verifica.

    //se redirecciona a la pagina RegistroPacientes.php
    //header("location:RegistroPacientes.php");// en este caso no funcina esta sentencia porque hay echos en el codigo antes del header
    echo '<script type="text/javascript">window.location.href="RegistroPacientes.php?P=Ini";</script>'; 

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
