<?php   
session_start();  //Se reaunada la sesion abierta en validarSesion.php
$verifica = 1906;  
$_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica*/
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
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/validar_Campos.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
        </style>   
         <?php
            if(!isset($_SESSION["UsuarioDoct"])){//sino hay nada almacenado en la variable superglobal $_SESSION devuelve a DoctorAfiliado.php
                header("location:../DoctorAfiliado.php");           
           }
               // echo ($_SESSION["UsuarioDoct"]);
                include("../conexion/Conexion_BD.php");
                mysqli_query($conexion,"SET NAMES 'utf8' ");
                $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION

                $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
                $UsDoctor= mysqli_fetch_row($NombreDoctor);
                $UsDoctor[1]; //se obtiene el nombre del doctor.
            ?>      
    </head>	    
    <body onload="autofocusHCD()"><!-- la funcion autofocusHCD esta en Funciones_varias.js
        <div class="Principal">
            <header class="fixed_1" >
                <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
                </div>
                <div style="float: right;  width: 25%;">
                    <?php
                        $consulta_1="SELECT ID_Doctor,nombre_doctor,apellido_doctor, especialidad,sexo FROM doctores INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE ID_Doctor= '$sesion' ";
                        $Recorset_1=mysqli_query($conexion,$consulta_1);
                        while($Doctor_Datos= mysqli_fetch_array($Recorset_1)){
                            if($Doctor_Datos["sexo"] == "F"){//mujer
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
                    <div class="n44"><a href="RegistroPacientes.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual.php">Estadisticas</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php" class="activa">HCD</a></div>              
                </nav>
        </header> 

        <section style="margin-top: 10%;">
            <h3 style="margin-bottom: 2.5%;">Historia Clinica Digital</h3>

            <p class="Inicio_1" >Introduzca el Nº de cedula de identidad o capture un dato biometrico de su paciente</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="formDoc" autocomplete="off">
                <input style="margin-left: 38%;" type="text" name="nombre_Paciente"  id="CedulaPaciente">
                <input type="submit"  name="Boton_buscar" value="Buscar" onclick="return validarCedula()">
            </form>

            <?php
            if(isset($_POST["Boton_buscar"])){//si Boton_buscar esta declarado, (se encuentra en este mismo archivo) se entra en el formulario. En caso contrario se utiliza se entra a la parte del codigo que inserta los datos en la base de datos, 
                $Paciente=$_POST["nombre_Paciente"];//se recibe desde este mismo archivo
                $Consulta_2="SELECT nombre_pacient, apellido_pacient, cedula_pacient, edad_pacient, sexo_pacient, nacionalidad_pacient, estadocivil_pacient, ocupacion_pacient, origen_pacient, residencia_pacient, religion_pacient, fecharegistro_pacient, gruposanguineo_pacient FROM pacientes_registrados WHERE cedula_pacient='$Paciente' ";
                $Recordset_2=mysqli_query($conexion,$Consulta_2);      
                if(mysqli_num_rows($Recordset_2)==0){
                    echo    "<script>
                                alert('No existe un paciente registrado con el número de cedula introducido');
                            </script>";
                }
                else{
                    $MiPaciente= mysqli_fetch_array($Recordset_2);
            ?>        
        <article>
            <div id="historia_1">
                <form action="SolicitudDoctor.php" method="POST" name="formDoc">
                    <fieldset id="historia_2">
                        <legend>Datos del Paciente</legend>
                        <label class="etiqueta_5" >Nombre</label>
                        <input  type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $MiPaciente["nombre_pacient"];?>"> 
                        
                        <label class="etiqueta_6" >Apellido</label>
                        <input class="" type="text" name="nombre_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $MiPaciente["apellido_pacient"];?>">
                        <br>
                        <label class="etiqueta_5">Cedula</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly"  id="CedulaPaciente" value="<?php echo $MiPaciente["cedula_pacient"];?>">
                        
                        <label class="etiqueta_6">Edad</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly" id="EdadPaciente" value="<?php echo $MiPaciente["edad_pacient"];?>">
                        <br>
                        <label class="etiqueta_5">Sexo</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly" id="SexoPaciente" value="<?php echo $MiPaciente["sexo_pacient"];?>">
                        
                        <label class="etiqueta_6">Nacionalidad</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["nacionalidad_pacient"];?>">
                        <br> 
                        <label class="etiqueta_5">Estado Civil</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["estadocivil_pacient"];?>">
                         
                        <label class="etiqueta_6">Ocupación</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $MiPaciente["ocupacion_pacient"];?>">
                        <br>
                        <label class="etiqueta_5">Lugar de Origen</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["origen_pacient"];?>"> 
                        
                        <label class="etiqueta_6">Lugar de Residencia</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["residencia_pacient"];?>">
                        <br>
                        <label class="etiqueta_5">Religion</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["religion_pacient"];?>">
                        
                        <label class="etiqueta_6">Fecha de registro</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["fecharegistro_pacient"];?>">
                        <br>
                        <label class="etiqueta_5">Grupo Sanguineo</label>
                        <input type="text" name="nombre_Paciente" readonly="readonly" id="NombrePaciente" value="<?php echo $MiPaciente["gruposanguineo_pacient"];?>">

                        <!--<input type="submit" name="" value="Agendar cita">-->
                    </fieldset>
                </form>    
               
                <form action="VisitasConsultorio.php" method="POST">
                <fieldset id="historia_3">
                    <legend>Historico de visitas al consultorio</legend>
                    <?php
                        $Paciente=$_POST["nombre_Paciente"];//se recibe desde este mismo archivo
                       //Se realiza una consulta para buscar la historia medica del paciente
                        $Consulta_3="SELECT * FROM historico_visitas WHERE cedula_paciente='$Paciente' ";
                        $Recordset_3=mysqli_query($conexion,$Consulta_3);      
                        while($Historico= mysqli_fetch_array($Recordset_3)){
                    ?>
                        <input type="text"  hidden name="cedula_Paciente" value="<?php echo $Historico["cedula_paciente"];?>">
                        <label class="etiqueta_6">Fecha</label>
                        <input type="text" name="fecha_consulta" readonly value="<?php echo $Historico["fecha_visita"];?>">
                        <label class="etiqueta_6">Nº de Registro</label>
                        <input type="text" name="codigo_historia" readonly value="<?php echo $Historico["ID_HV"];?>">
                        <br>
                        <label class="etiqueta_6">Observaciones</label>
                        <textarea row="4" cols="50" name="observacionesPaciente" readonly  id="Observaciones"> <?php echo $Historico["observaciones"];?>
                        </textarea>
                        <br>
                        <label class="etiqueta_6">Tratamiento</label>
                        <textarea row="4" cols="50" name="tratamiento" readonly  id="Tratamiento"> <?php echo $Historico["Tratamiento"];?>
                        </textarea>
                        <br><br><hr  color="#040652" size="10" width="97%" align="left" ><br>
                        <?php } ?>
                        <br>         
                    </fieldset>
                </form>
                
            </div>
        </article>
            <div id="historia_4">
                <p style=" background-color:; margin:auto; text-align: center;"><b>Agendar próxima cita</b></p>
                <br>
                <div id="InicioSesion_4">
                    <div id="n100_Historias">
                        <span class="medio" >Fecha de la cita</span>
                        <br><br><br>
                        <input style="position: relative; bottom: 49%; left: 2%; width: 60%" type="text" id="Calendario_CM" form="formDoc" name="fechaCita" tabindex="7">           
                        <span style="height: 30px; width: 100%; padding-top: 2%; box-sizing: border-box;" id="n1">Hora de la cita</span>
                        <br>
                        <br>
                        <br> 

                        <!-- se muestra el select en pantalla por medio de php,no por medio de html-->
                        <?php
                            mysqli_query($conexion,"SET NAMES 'utf8'");
                            $Consulta_3="SELECT turno  FROM horarios INNER JOIN doctores_horarios ON horarios.ID_Horario=doctores_horarios.ID_Horario WHERE ID_Doctor ='$sesion'";
                            $Resulset = mysqli_query($conexion,$Consulta_3);

                                echo '<select id="Tur_1"  name="tur_1" form="pacient">';//Captura, almacena el ID_Doctor
                                echo '<option value="0"> Seleccione Turno </option>';           
                                while($TurnoConsulta= mysqli_fetch_array($Resulset)){
                                    echo '<option value="'.$TurnoConsulta['turno'].'">  '.$TurnoConsulta['turno'].' </option>'; 
                                }
                                echo  '</select>';
                        ?>


                        <hr>
                            <span style="cursor: pointer; text-decoration: underline" onclick="llamar_DoctorReserva()">Verifique disponibilidad de cupos.
                            </span>
                            <div id="MostrarPacientes"></div>
                            <span style="cursor: pointer; text-decoration: underline" onclick="llamar_DoctorReserva()">Agregar cita.
                            </span>

                        <input type="text" hidden form="formDoc" id="Doctor" name="Doctor" value="<?php echo $especialista=$_SESSION["UsuarioDoct"];?>"> <!--se envia el ID del doctor a Ajax_Cancelar.js para agendar cita-->              
                    </div>
                </div>
            </div>
            <?php }} ?>
            
            
        </section>
        </div>
            <nav class="n41">
                <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                <div class="n44"><a href="InicioSesion.php">Consulta</a></div>
                <div class="n44"><a href="RegistroPacientes.php"> Mis pacientes</a></div>
                <div class="n44"><a href="ReporteMensual.php">Estadisticas</a></div>   
                <div class="n44"><a href="HCD.php" class="activa">HCD</a></div>              
            </nav>
        <footer>
            <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela_(+58) 0424-516.59.38</p>
        </footer>         
    
    </body>
</html>