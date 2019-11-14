<?php   
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    $verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica

    $Paciente= $_GET["cedula_pacient"];//aqui se tiene almacenado la cedula desde RegistroPacientes.php, desde muestraHistoria.php  desde muestraHistoria_2.php desde cargarNuevaHistoria.php desde muestraHistoria.php desde diagnostico.php
    //echo $Paciente . "<br>";

    $_SESSION["cedulaIdentidad"] = $Paciente;//se crea una $_SESSION que contiene el Nº de cedula del paciente
?> 

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Historia Clinica Digital</title>
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

                //se configura el sistema para que trabaje con la hora nacional.
                date_default_timezone_set('America/Caracas');
                $fecha= date("d-m-Y");
            ?>      
    </head>	    
    <body>
        <div class="Principal" style="background-color: ">
            <header class="fixed_1" >
                <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="color: rgba(194, 245, 19,1); cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
                </div>
                <div style="float: right;  width: 25%;">
                    <?php
                        $consulta_1="SELECT ID_Doctor,nombre_doctor,apellido_doctor, especialidad,sexo FROM doctores INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE ID_Doctor= '$sesion' ";
                        $Recorset_1=mysqli_query($conexion,$consulta_1);
                        while($Doctor_Datos= mysqli_fetch_array($Recorset_1)){
                            if($Doctor_Datos["sexo"] == "M"){//mujer
                    ?>
                                <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                <?php } 
                            else{ ?>  
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                <?php
                            }
                        }                    
                    ?>

                </div>
                <nav class="n41">
                    <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="InicioSesion.php" >Consulta</a></div>
                    <div class="n44"><a href="RegistroPacientes.php" > Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual.php">Morbilidad</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php" class="activa">HCD</a></div>              
                </nav>
                    <div style="background-color:red; margin-top: 2%; width: 100%; display:; " >
                        <div id="mostrarTabla" onmouseleave="quitarFechas()" style="background-color:#F4FCFB; width: 70%; height: 530px; margin-left: 30%; margin-top: 1%; position: absolute;  display: none;">
                            <?php 
                                include("tablaFechaAntecedentes.php");
                            ?>
                        </div>
                    </div>
            </header>

            <section style="background-color: red; margin-top: 10%;">              
                <?php
                    $Consulta_2="SELECT * FROM pacientes_registrados LEFT JOIN historico_visitas ON pacientes_registrados.cedula_pacient=historico_visitas.cedula_paciente WHERE cedula_pacient='$Paciente' ";//en esta consulta se utilizo LEFT JOIN porque puede pasar que solo se registren los datos basicos del paciente en la tabla pacientes_registrados y no se anexe ningun valor semiologico en la tabla historico_visitas, por lo que no mostraria ningun dato en la planilla del paciente (HistoriasClinicass.php) si se utiliza INNER JOIN
                    $Recordset_2=mysqli_query($conexion,$Consulta_2);      
                    $MiPaciente= mysqli_fetch_array($Recordset_2);

                    //se cambia el formato de la fecha a d-m-Y
                    $fechaFormatoMySQL=$MiPaciente["fechaNacimiento_pacient"];
                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));
                ?>    
                <div style="background-color:; float: left; width: 25%; margin-left: 2.5%; margin-top: 0%; position: fixed;">
                    <div  id="" class=""  style="background-color:;">
                        <br>
                        <fieldset style="border-radius: 15px; padding: 2%">
                            <legend>Paciente</legend>
                            <label style="background-color:; float: left; width: 35%;">Nombre</label>
                            <input  style="margin-bottom: 1.5%;" type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $MiPaciente['nombre_pacient'];?>" > 
                            <br>
                            <label style="float: left; width: 35%">Apellido</label>
                            <input  style="margin-bottom: 1.5%;"  class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $MiPaciente['apellido_pacient'];?>" >
                            <br>
                            <label style="float: left; width: 35%">Cedula</label>
                            <input  style="margin-bottom: 1.5%;"  type="text" name="cedula_Paciente" readonly value="<?php echo $MiPaciente['cedula_pacient'];?>">
                            <br>
                            <label style="float: left; width: 35%">Fecha</label>
                            <input  style="margin-bottom: 1.5%;"  type="text" name="fecha_consulta" readonly value="<?php echo $fecha;?>">
                            <br>
                            <label style="float: left; width: 35%">Hora</label>
                            <input style="background-color: ; margin-bottom: 1.5%;"  type="text" name="" readonly  value="<?php echo $MiPaciente['hora_visita'];?>">
                            <br> 
                      
                    <div style="background-color: ; margin-top: 3%; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); display: flex; justify-content: center; ">
                        <a style="background-color: ; font-weight: bolder; width: 20%; font-size: 14px; border-radius: 10px; color: ;text-align: center;">Anamnesis</a>
                    </div>
                    <div style="background-color: ; margin-top: 3%;  display: flex; justify-content: space-between; ">

                        <?php
                        //Se realiza una consulta para selecconar el ultimo registro de la historia medica del paciente y enviar el ID del historico de esa visita a muestraHistoria.php, datosParaclinicos y diagnostico.php
                        $Consulta_3 ="SELECT MAX(ID_HV) FROM historico_visitas WHERE ID_Doctor ='$sesion' AND cedula_paciente ='$Paciente'";
                        $Recordset_3=mysqli_query($conexion,$Consulta_3); 
                        $Visita= mysqli_fetch_array($Recordset_3);
                        $IDHistoricoVisita=$Visita["MAX(ID_HV)"];
                        //echo "$IDHistoricoVisita" . "<br>";
                        
                        
                        //despues que se tiene el ID_HV se busca la fecha de ese indice
                        $Consulta_4 ="SELECT fecha_visita FROM historico_visitas WHERE ID_HV ='$IDHistoricoVisita'";
                        $Recordset_4=mysqli_query($conexion,$Consulta_4); 
                        $Fecha= mysqli_fetch_array($Recordset_4);
                        $FechaUltimaVisita=$Fecha["fecha_visita"];
                        //echo "fecha ultimo valor semiologico " . $FechaUltimaVisita . "<br>";
                        ?>

                        <a style="background-color:; margin-right: 0%; width: 30%;  font-size: 13px; text-align: center;" href="muestraHistoria.php?fecha=<?php echo $FechaUltimaVisita;?>&ID_HV=<?php echo $IDHistoricoVisita;?>">Valores semiologicos</a>

                        <?php
                        //Se realiza una consulta para selecconar el ultimo registro del valor paraclinico del paciente y enviar el ID de los valores paraclinico a a muestraHistoria.php, datosParaclinicos y diagnostico.php
                        $Consulta_3 ="SELECT MAX(ID_VP) FROM valores_paraclinicos WHERE ID_Doctor ='$sesion' AND CedulaPaciente ='$Paciente'";
                        $Recordset_3=mysqli_query($conexion,$Consulta_3); 
                        $Visita= mysqli_fetch_array($Recordset_3);
                        $IDUltimoValorParaclinico=$Visita["MAX(ID_VP)"];
                        //echo $IDUltimoValorParaclinico . "<br>";

                        //despues que se tiene el ID_VP se busca la fecha de ese indice
                        $Consulta_4 ="SELECT Fecha FROM valores_paraclinicos WHERE ID_VP ='$IDUltimoValorParaclinico'";
                        $Recordset_4=mysqli_query($conexion,$Consulta_4); 
                        $Fecha= mysqli_fetch_array($Recordset_4);
                        $FechaUltimoValorParaclinico=$Fecha["Fecha"];
                        //echo "fecha ultimo valor paraclinico " . $FechaUltimoValorParaclinico . "<br>";
                        ?>

                        <a style="background-color: ;  font-size: 13px; width: 24%; margin-right: 0%; text-align: center;" href="datosParaclinicos.php?fecha=<?php echo $FechaUltimoValorParaclinico;?>&ID_VP=<?php echo $IDUltimoValorParaclinico;?>">Valores paraclinicos</a>

                        <?php
                        //Se realiza una consulta para selecconar el ultimo registro de diagnosticos del paciente y enviar el ID del diagnostico a a muestraHistoria.php, datosParaclinicos y diagnostico.php
                        $Consulta_3 ="SELECT MAX(ID_D) FROM diagnostico WHERE ID_Doctor ='$sesion' AND Cedula_Paciente ='$Paciente'";
                        $Recordset_3=mysqli_query($conexion,$Consulta_3); 
                        $Visita= mysqli_fetch_array($Recordset_3);
                        $IDUltimoDiagnostico=$Visita["MAX(ID_D)"];
                        //echo "Código ID_D del ultimo diagnostico= " . $IDUltimoDiagnostico . "<br>";

                        //despues que se tiene el ID_D se busca la fecha de ese indice
                        $Consulta_4 ="SELECT Fecha FROM diagnostico WHERE ID_D ='$IDUltimoDiagnostico'";
                        $Recordset_4=mysqli_query($conexion,$Consulta_4); 
                        $Fecha= mysqli_fetch_array($Recordset_4);
                        $FechaUltimoDiagnostico=$Fecha["Fecha"];
                        //echo "fecha ultimo valor paraclinico= " . $FechaUltimoDiagnostico . "<br>";
                        ?>

                        <a style="background-color:; margin-right: 0%; width: 30%; vertical-align:middle; font-size: 13px; text-align: center;" href="diagnostico.php?fecha=<?php echo $FechaUltimoDiagnostico;?>&ID_D=<?php echo $IDUltimoDiagnostico;?>">Diagnostico</a>
                    </div>
                </fieldset>                
                    </div>
                    <div class=""  style="background-color:; margin-top: 10%; ">                                     
                            <a class="nuevoPaciente"  style="cursor: pointer;" onclick="agendarCita()">Agendar próxima cita</a> 
                            <a class="nuevoPaciente"  style="cursor: pointer;" onclick="mostrarFechas()">Buscar registro médico</a><!--la función mostrarFechas() se encuentra al final de este documento-->
                            <a class="nuevoPaciente" href="muestraHistoria_2.php?cedulaPaciente=<?php echo $MiPaciente['cedula_pacient'];?>">Nuevo registro médico</a>
                            <a class="nuevoPaciente" href="actualizarDatos.php?cedulaPaciente=<?php echo $MiPaciente['cedula_pacient'];?>">Actualizar registro médico</a>
                            <a class="nuevoPaciente" href="">Imprimir registro médico</a>
                            <!--<a class="nuevoPaciente" href="#bajarAntecedentesPersonalesPatológicos ">Antecedentes Personales Patológicos</a>
                            <a class="nuevoPaciente" href="#bajarHabitosPsicobiologicos ">Habitos Psicobiológicos</a>-->
                            <!--<a class="nuevoPaciente" href="#bajarHastaAntecedentes">Antecedentes clinicos</a>-->

                        <script src="../Javascript/menu_2.js"></script><!--si se coloca en el head no funciona.-->
                    </div>
                </div>

                <div style="background-color:; width: 65%; float: right; margin-right: 4%;  position: relative; top: 5%;">
                    <form action="" method="" name="formDoc">
                        <fieldset class="historia_2">
                            <legend>Datos del Paciente</legend>
                            <label class="etiqueta_5" >Nombre</label>
                            <input  type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $MiPaciente["nombre_pacient"];?>"> 
                            
                            <label class="etiqueta_6" >Apellido</label>
                            <input class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $MiPaciente["apellido_pacient"];?>">
                            <br>
                            <label class="etiqueta_5">Cedula</label>
                            <input type="text" name="cedula_Paciente" readonly="readonly"  id="CedulaPaciente" value="<?php echo $MiPaciente["cedula_pacient"];?>">

                            <label class="etiqueta_6">Lugar de Residencia</label>
                            <input type="text" name="residencia_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["lugarResidencia_pacient"];?>">
                            <br>
                            <label class="etiqueta_5">Sexo</label>
                            <input type="text" name="sexo_Paciente" readonly="readonly" id="SexoPaciente" value="<?php echo $MiPaciente["sexo_pacient"];?>">
                            
                            <label class="etiqueta_6">Nacionalidad</label>
                            <input type="text" name="nacionalidad_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["nacionalidad_pacient"];?>">
                            <br> 
                            <label class="etiqueta_5">Estado Civil</label>
                            <input type="text" name="estadoCivil_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["estadoCivil_pacient"];?>">
                                                     
                            <label class="etiqueta_6">Lugar Nacimiento</label>
                            <input type="text" name="origen_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["lugarNacimiento_pacient"];?>">
                            <br>

                            <label class="etiqueta_5">Fecha Nacimiento</label>
                            <input type="text" name="origen_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $fechaFormatoPHP;?>"> 
                             
                            <label class="etiqueta_6">Edad</label>
                            <input type="text" name="edad_Paciente" readonly="readonly" id="EdadPaciente" value="<?php echo $MiPaciente["edad_pacient"];?>">
                            <br> 
                            <label class="etiqueta_5">Grupo Sanguineo</label>
                            <input type="text" name="grupoSanguineo" readonly="readonly" id="Sangre" value="<?php echo $MiPaciente["grupoSanguineo_pacient"];?>">

                            <label class="etiqueta_6">Telefono</label>
                            <input type="text" name="telefono" readonly="readonly" id="Telefono" value="<?php echo $MiPaciente["telefono_pacient"];?>">
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
                                <select name="estado" id="Estado" style="margin-left: 1.5%; width: 20.5%;"> 
                                        <option value="<?php echo $MiPaciente["estado_pacient"];?>"><?php echo $MiPaciente["estado_pacient"];?></option>
                                </select>  

                                <select name="municipio" id="Municipio" style="margin-left: 3.2%; width: 20.5%;"> 
                                        <option value="<?php echo $MiPaciente["estado_pacient"];?>"><?php echo $MiPaciente["municipio_pacient"];?></option>
                                </select>                       


                                <select name="parroquia" id="Parroquia" style="margin-left: 3.2%; width: 20.5%;"> 
                                        <option value="<?php echo $MiPaciente["estado_pacient"];?>"><?php echo $MiPaciente["parroquia_pacient"];?></option>
                                </select> 


                                <textarea style="margin-left: 20%; margin-top: 0.5%;" rows="2" cols="60" name=direccion id="Direccion" readonly ><?php echo $MiPaciente["direccion_pacient"];?></textarea>
                            </div>
                            <br>
                            <label class="etiqueta_8">En caso de emergencia</label>
                            <textarea rows="2" cols="60" name="emergencia" id="Emergencia" readonly ><?php echo $MiPaciente["emergencia_pacient"];?></textarea>
                        </fieldset> 

                        <a name="bajarAntecedentesPersonalesPatológicos"></a>
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
                            <br>
                            
                            <label class="etiqueta_8">Qx</label>
                            <textarea rows="2" cols="60" name="tratamiento" id="Tratamiento"></textarea>
                            <br>  
                            <label class="etiqueta_8">Otros</label>
                            <textarea rows="2" cols="60" name="otros" id="Otros"></textarea>
                            <label class="etiqueta_8">Tratamiento habitual</label>
                            <textarea rows="2" cols="60" name="tratamiento" id="Tratamiento"></textarea>
                            <br>
                            <label class="etiqueta_8">Antecedentes familiares</label>
                            <textarea rows="2" cols="60" name="tratamiento" id="Tratamiento"></textarea>
                        </fieldset>

                        <a name="bajarHabitosPsicobiologicos"></a>
                        <fieldset class="historia_2" style="margin-top: 4%;">
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
                        
                            <label class="etiqueta_5">Drogas</label>
                            <input type="text" name="drogas" readonly="readonly"  id="CedulaPaciente" value="">
                            
                            <label class="etiqueta_6">Sexuales</label>
                            <input type="text" name="sexuales" readonly="readonly" id="NombrePaciente" value="">  
                        </fieldset>    
                        <br> 

                        <input type="text" hidden  id="Doctor" name="doctor" value="<?php echo $especialista=$_SESSION["UsuarioDoct"];?>"> <!--se envia el ID del doctor a Ajax_Cancelar.js para agendar cita-->
                    </form> 
                </div> 
            </section>         

            <div style="background-color: ; float: right; width: 65%; margin-right: 4%;">
                <a name="bajarHastaAntecedentes"></a>
                <fieldset class="historia_2" style="margin-top: 2%; margin-bottom: 7%;">
                    <legend>Registros en archivo</legend>
                <?php
                 include("evaluacionMensual.php"); 
                 //echo $Paciente;
                ?>  
                </fieldset>
            </div>   
            <footer>
                <nav class="n41">
                    <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="InicioSesion.php">Consulta</a></div>
                    <div class="n44"><a href="RegistroPacientes.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual.php">Estadisticas</a></div>   
                    <div class="n44"><a href="HCD.php" class="activa">HCD</a></div>              
                </nav>
                <br><br>
                <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela_(+58) 0424-516.59.38</p>
            </footer> 
        </div>   
    </body>
</html>

<script type="text/javascript">
        function agendarCita(){                
            window.open("agendarCita.php","Registro","width=400px,height=580px,location=no,directories=no,status=no,statusbar=no,resizable=no,scrollbars=no,left=120px");
        }

        function mostrarFechas(){
           // alert("cuidado");
           var A= document.getElementById("mostrarTabla");
           A.style.display = "block";
        }

        function quitarFechas(){
           // alert("cuidado");
           var A= document.getElementById("mostrarTabla");
           A.style.display = "none";
        }


    </script>

