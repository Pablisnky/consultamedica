<?php
    //muestra un registro medico fecha, doctor y paciente.
    session_start(); 

    include("../conexion/Conexion_BD.php");//conexion a BD
    mysqli_query($conexion,"SET NAMES 'utf8' ");
    
    $Paciente= $_SESSION["cedulaIdentidad"];//se introduce la cedula mediante $_SESSION
    //echo $Paciente . "<br>";

    $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION
    //echo $sesion;

    $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
                $UsDoctor= mysqli_fetch_row($NombreDoctor);
                $UsDoctor[1]; //se obtiene el nombre del doctor.               

    $fechaHistoria= $_GET["fecha"];//se recibe desde evaluacionMensual.php la fecha de la historia medica a revisar y en otro caso desde HistoriaClinica.phh(la fecha de la ultima vez que el paciente estuvo en consulta) o tambien la fecha seleccionada previamente en cualquier archivo de los del panel de paciente.
    //echo "Fecha selecionada para mostrar historia médica =" . $fechaHistoria; 

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
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas_lista.css"/> 
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

            li{
                list-style: none;
            }
        </style> 
    </head>
            <header class="fixed_1" >
                <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
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
                    <div class="n44"><a href="RegistroPacientes.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual.php">Morbilidad</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php" class="activa">HCD</a></div>              
                </nav>
                
                <div style="background-color: ; display: inline; width: 11%; float: right;">
                        <ul style="display: inline;" class="ItemMenu">
                            <li>Semiología
                                <ul class="ListaDesplegable">
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_00">Piel</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#marcadorCabeza">Cabeza</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_1">Ojos</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_2">Fondo de ojos</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_3">Oidos</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_4">Nariz</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_5">Boca</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_6">Faringe</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_7">Cuello</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_8">Ganglios linfaticos</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_9">Torax</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_10">Mamas</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_11">Respiratorio</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_12">Cardiovascular</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_13">Pulso</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_14">Abdomen</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_15"">Genitales</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_16" style="font-size: 12px"<Osteoarticular</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_17">Extremidades</a></li>
                                    <li><a  style="font-size: 12px; font-weight: normal;" href="#bajar_18">Neurológico</a></li>   
                                </ul>
                            </li>
                        </ul>
                    </div>              
                    <div style="background-color:; margin-top: 2%; width: 10%; display: inline; " >
                        <div id="mostrarTabla" onmouseleave="quitarFechas()" style="background-color:#F4FCFB; width: 70%; height: 530px; margin-left: 30%; margin-top: 2%; position: absolute;  display: none;">
                            <?php 
                                include("tablaFechaAntecedentes.php");
                            ?>
                        </div>
                    </div>
        </header>

        <section style="background: ; margin-top: 10%;"> 
            <?php
            //consulta para llenar el panel de paciente
                $Consulta="SELECT * FROM pacientes INNER JOIN historico_visitas ON pacientes.cedula_Identidad=historico_visitas.cedula_paciente WHERE cedula_paciente ='$Paciente' AND fecha_visita= '$fechaHistoria'";
                $Resulset = mysqli_query($conexion,$Consulta);          
                $paciente= mysqli_fetch_array($Resulset);

                //se cambia el formato de la fecha
                $fechaFormatoMySQL = $paciente["fecha_visita"];//se obtiene la fecha en formato MySQL
                $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                //echo $fechaFormatoPHP;
            ?>
            <div style="background-color: ; float: left; width: 25%; margin-left: 2.5%; margin-top: 0%; position: fixed;">     
                <div  id="" class=""  style="background-color:;">
                    <!--<p style="margin-bottom: 2.5%; background-color: ;color:#040652; text-align: center; font-size: 22px; "> 
                        Historia Médica Digital (2/3)</p>-->
                        <br> 
                    <fieldset style="border-radius: 15px; padding: 2%">
                        <legend>Paciente</legend>
                        <label style="float: left; width: 35%">Nombre</label>
                        <input style="margin-bottom: 1.5%;" type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $paciente["nombre"];?>"> 
                        <br>
                        <label style="float: left; width: 35%">Apellido</label>
                        <input style="margin-bottom: 1.5%;"  class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $paciente["apellido"];?>">
                        <br>
                        <label style="float: left; width: 35%">Cedula</label>
                        <input style="margin-bottom: 1.5%;"  type="text" name="cedula_Paciente" value="<?php echo $paciente["cedula_Identidad"];?>">
                        <br>
                        <label style="float: left; width: 35%">Fecha</label>
                        <input style="margin-bottom: 1.5%;"  type="text" name="fecha_consulta" readonly value="<?php echo $fechaFormatoPHP;?>">
                        <br>
                        <label style="float: left; width: 35%">Nº de registro</label>
                        <input style="margin-bottom: 1.5%;"  type="text" name="codigo_historia" readonly value="<?php echo $paciente["ID_HV"];?>">
                        <br> 
                    
                <div style="background-color: ; margin-top: 3%; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); display: flex; justify-content: center; ">
                        <a href="HistoriasClinicas.php?cedula_pacient=<?php echo $Paciente;?>" style="background-color: ; width: 20%; font-size: 13px; border-radius: 10px; color: ;text-align: center;">Anamnesis</a>
                </div>
                <div style="background-color: ; margin-top: 3%;  display: flex; justify-content: space-between; ">
        
                        <a style="background-color: ;cursor: default; font-weight: bolder; margin-right: 0%;width: 30%; font-size: 14px; border-radius: 10px; color: ;text-align: center;">Valores semiologicos</a>

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

                        <a style="background-color: ;  font-size: 13px; width: 24%; margin-right: 0%; text-align: center;" href="datosParaclinicos.php?fecha=<?php echo $FechaUltimoValorParaclinico;?>&ID_VP=<?php echo $IDUltimoValorParaclinico;?>">Valores paraclínicos</a>

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
                            <a class="nuevoPaciente"  style="cursor: pointer;" onclick="mostrarFechas()">Buscar registro médico</a><!-- la funcion mostrarFechas() pone en pantalla la tabla con las fechas donde el paciente tiene registros en un su historia medica, la funcion se encuentra al final de este archivo-->  
                            <a class="nuevoPaciente" href="HistoriaOftalmologica_2.php">Nuevo registro médico</a><!--la función nuevoRegistro() se encuentra al final de este documento-->
                            <a class="nuevoPaciente" href="">Imprimir registro médico</a>
                            <!--<a class="nuevoPaciente" href="#bajarAntecedentesPersonalesPatológicos ">Antecedentes Personales Patológicos</a>
                            <a class="nuevoPaciente" href="#bajarHabitosPsicobiologicos ">Habitos Psicobiológicos</a>-->
                            <!--<a class="nuevoPaciente" href="#bajarHastaAntecedentes">Antecedentes clinicos</a>-->

                        <script src="../Javascript/menu_2.js"></script><!--si se coloca en el head no funciona.-->
                    </div>
            </div>        
                     
                </div>

           
                <div style="background-color:; width: 65%; float: right; margin-right: 4%;  position: relative; top: 0%;"> 

                <fieldset class="historia_2">
                    <legend>Historia médica</legend>
                        <?php

                        if(!empty($_GET["ID_HV"])){//sino esta vacia la variable del historico de visita se viene desde HistoriasClinicas.php sin haber seleccionado una fecha y se va a mostrar el utlimo registro del paciente

                            //Se realiza una consulta para buscar la ultima historia medica del paciente, donde ID_HV es el ID del historico de  la ultima visita
                            $ID_HistoricoVisita=$_GET["ID_HV"];
                            $Consulta_3="SELECT * FROM historico_visitas WHERE cedula_paciente='$Paciente' AND ID_HV='$ID_HistoricoVisita' AND ID_Doctor='$sesion' ORDER BY ID_HV DESC  ";
                            $Recordset_3=mysqli_query($conexion,$Consulta_3);                      
                            while($Historico= mysqli_fetch_array($Recordset_3)){

                        ?>
                        <label class="">Motivo de consulta
                            <textarea rows="3" cols="90" readonly><?php echo $Historico["motivo_consulta"];?>
                            </textarea>
                        </label>
                        <br>
                        <label class="">Enfermedad actual
                            <textarea rows="3" cols="90" readonly><?php echo $Historico["enfermedad_actual"];?>
                            </textarea>
                        </label>
                        <br>
                        <label style="background-color: ">Examen funcional
                            <textarea rows="3" cols="90" readonly><?php echo $Historico["examen_funcional"];?>
                            </textarea>
                        </label>
                        <br><a name="bajar_0"></a>
                        <label style="background-color: ">Examen fisico
                            <div style="background-color: ; margin-left: 5%;">

                                
                                <label style="background-color: ;">Piel</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["piel"];?>
                                </textarea>
                                
                                <a name="marcadorCabeza" class="ancla"></a>
                                <label>Cabeza</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["cabeza"];?>
                                </textarea>
                                       
                                <a name="bajar_2" class="ancla"></a>
                                <label>Ojos</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["ojos"];?>
                                </textarea>
                                
                                <a name="bajar_3"></a>
                                <label class="">Fondo de ojos</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["fondo_ojos"];?>
                                </textarea>
                                
                                <a name="bajar_4"></a>
                                <label class="">Oidos</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["oidos"];?>
                                </textarea>

                                <a name="bajar_5"></a>
                                <label class="">Nariz</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["nariz"];?>
                                </textarea>

                                <a name="bajar_6"></a>
                                <label class="">Boca</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["boca"];?>
                                </textarea>

                                <a name="bajar_7"></a>
                                <label class="">Faringe</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["faringe"];?>
                                </textarea>

                                <a name="bajar_8"></a>
                                <label class="">Cuello</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["cuello"];?>
                                </textarea>

                                <a name="bajar_9"></a>
                                <label class="">Ganglios linfaticos</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["ganglios"];?>
                                </textarea>

                                <a name="bajar_10"></a>
                                <label class="">Torax</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["torax"];?>
                                </textarea>

                                <a name="bajar_11"></a>
                                <label class="">Mamas</label><br><br>
                                <textarea rows="3" cols="85"   readonly><?php echo $Historico["mamas"];?>
                                </textarea>

                                <a name="bajar_12"></a>
                                <label class="">Respiratorio</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["respiratorio"];?>
                                </textarea>

                                <a name="bajar_13"></a>
                                <label>Cardiovascular</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["cardiovascular"];?>
                                </textarea>

                                <a name="bajar_14"></a>
                                <label class="">Pulso</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["pulso"];?>
                                </textarea>

                                <a name="bajar_15"></a>
                                <label class="">Abdomen</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["Abdomen"];?>
                                </textarea>

                                <a name="bajar_16"></a>
                                <label class="">Genitales</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["genitales"];?>
                                </textarea>

                                <a name="bajar_17"></a>
                                <label class="">Osteoarticular</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["osteoarticular"];?>
                                </textarea>

                                <a name="bajar_18"></a>
                                <label class="">Extremidades</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["extremidades"];?>
                                </textarea>

                                <a name="bajar_19"></a>
                                <label>Neurológico</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["neurologico"];?>
                                </textarea>                   
                            </div>
                        </label>

                        <br><br><hr  color="#040652" size="5" width="97%" align="left" ><br>
                        
                        <br>         
                    </fieldset>
                </div>
        </section>
                </div>
            <?php } }

                
                else{//si la variable $_GET["ID_HV"] esta vacia se viene desde HistoriasClinicas seleccionando una fecha en particular y se va a mostrar el registro de la historia medica seleccionado por fecha

                      //Se realiza una consulta para buscar la historia medica del paciente segun una fecha seleccionada
                            $Consulta_3="SELECT * FROM historico_visitas WHERE cedula_paciente='$Paciente' AND fecha_visita='$fechaHistoria' ORDER BY ID_HV DESC  ";
                            $Recordset_3=mysqli_query($conexion,$Consulta_3);                      
                            while($Historico= mysqli_fetch_array($Recordset_3)){

                        ?>
                        <label class="">Motivo de consulta
                            <textarea rows="3" cols="90" readonly><?php echo $Historico["motivo_consulta"];?>
                            </textarea>
                        </label>
                        <br>
                        <label class="">Enfermedad actual
                            <textarea rows="3" cols="90" readonly><?php echo $Historico["enfermedad_actual"];?>
                            </textarea>
                        </label>
                        <br>
                        <label style="background-color: ">Examen funcional
                            <textarea rows="3" cols="90" readonly><?php echo $Historico["examen_funcional"];?>
                            </textarea>
                        </label>
                        <br><a name="bajar_0"></a>
                        <label style="background-color: ">Examen fisico
                            <div style="background-color: ; margin-left: 5%;">

                                
                                <label style="background-color: ;">Piel</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["piel"];?>
                                </textarea>
                                
                                <a name="bajar_1"></a>
                                <label>Cabeza</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["cabeza"];?>
                                </textarea>
                                       
                                <a name="bajar_2"></a>
                                <label>Ojos</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["ojos"];?>
                                </textarea>
                                
                                <a name="bajar_3"></a>
                                <label class="">Fondo de ojos</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["fondo_ojos"];?>
                                </textarea>
                                
                                <a name="bajar_4"></a>
                                <label class="">Oidos</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["oidos"];?>
                                </textarea>

                                <a name="bajar_5"></a>
                                <label class="">Nariz</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["nariz"];?>
                                </textarea>

                                <a name="bajar_6"></a>
                                <label class="">Boca</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["boca"];?>
                                </textarea>

                                <a name="bajar_7"></a>
                                <label class="">Faringe</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["faringe"];?>
                                </textarea>

                                <a name="bajar_8"></a>
                                <label class="">Cuello</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["cuello"];?>
                                </textarea>

                                <a name="bajar_9"></a>
                                <label class="">Ganglios linfaticos</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["ganglios"];?>
                                </textarea>

                                <a name="bajar_10"></a>
                                <label class="">Torax</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["torax"];?>
                                </textarea>

                                <a name="bajar_11"></a>
                                <label class="">Mamas</label><br><br>
                                <textarea rows="3" cols="85"   readonly><?php echo $Historico["mamas"];?>
                                </textarea>

                                <a name="bajar_12"></a>
                                <label class="">Respiratorio</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["respiratorio"];?>
                                </textarea>

                                <a name="bajar_13"></a>
                                <label>Cardiovascular</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["cardiovascular"];?>
                                </textarea>

                                <a name="bajar_14"></a>
                                <label class="">Pulso</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["pulso"];?>
                                </textarea>

                                <a name="bajar_15"></a>
                                <label class="">Abdomen</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["Abdomen"];?>
                                </textarea>

                                <a name="bajar_16"></a>
                                <label class="">Genitales</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["genitales"];?>
                                </textarea>

                                <a name="bajar_17"></a>
                                <label class="">Osteoarticular</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["osteoarticular"];?>
                                </textarea>

                                <a name="bajar_18"></a>
                                <label class="">Extremidades</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["extremidades"];?>
                                </textarea>

                                <a name="bajar_19"></a>
                                <label>Neurológico</label><br><br>
                                <textarea rows="3" cols="85" readonly><?php echo $Historico["neurologico"];?>
                                </textarea>                   
                            </div>
                        </label>
                    
                        <br><br><hr  color="#040652" size="5" width="97%" align="left" ><br>
                        <?php } } ?>
                        <br>         
                    </fieldset>
                </div>
        </section>
                </div>


        <script type="text/javascript">
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


