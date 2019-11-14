<?php
//Agrega un nuevo documento a la historia medica de un paciente
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

    date_default_timezone_set('America/Caracas');
    $fecha=date("Y-m-d");//para guardar la fecha en MySQL y no haya problema con el formato 

    $fechaMostrar=date("d-m-Y");//para mostrar la fecha del registro medico que se va a realizar

    $fechaDiagnostico= $_GET["fecha"];//se recibe desde evaluacionMensual.php la fecha del diagnostico a revisar y en otro caso desde HistoriaClinica.phh(la fecha de la ultima vez que el paciente estuvo en consulta) tambiend desde datosParaclinicos.php
   // echo $fechaHistoria; desde datosPAraclinicos.php

    //se cambia el formato de la fecha
    $fechaFormatoMySQL = $fechaDiagnostico;//se obtiene la fecha en formato MySQL
    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
    //echo $fechaFormatoPHP;

    $UltimoID_D= $_GET["ID_D"];//Se recibe desde datosParaclinicos.php y otros

    
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
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/AjaxBuscador.js"></script> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
            li{
                list-style: none;
            }
        </style> 
    </head>
    <body onload="autofocusContacto()">
        <div class="Principal" style="background-color: ">
            <header class="fixed_1" style="background-color:; ">
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
                    <div class="n44"><a href="ReporteMensual.php">Estadisticas</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php">HCD</a></div>              
                </nav>
            </header>

            <section style="margin-top: 10%;">            
                <?php
                    $Consulta="SELECT * FROM pacientes_registrados WHERE cedula_pacient ='$Paciente' ";
                    $Resulset = mysqli_query($conexion,$Consulta);          
                    $paciente= mysqli_fetch_array($Resulset);

                ?>
                <div style="background-color: ; float: left; width: 25%; margin-left: 2.5%; position: fixed; margin-top: 1.35%;">
                    <div style="background-color:;">
                        <fieldset style="border-radius: 15px; padding: 2%">
                            <legend>Paciente</legend>
                            <label style="float: left; width: 35%">Nombre</label>
                            <input style="margin-bottom: 1.5%;"  type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $paciente['nombre_pacient'];?>" > 
                            <br>
                            <label style="float: left; width: 35%">Apellido</label>
                            <input style="margin-bottom: 1.5%;" class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $paciente['apellido_pacient'];?>" >
                            <br>
                            <label style="float: left; width: 35%">Cedula</label>
                            <input style="margin-bottom: 1.5%;" type="text" name="cedula_Paciente" value="<?php echo $paciente['cedula_pacient'];?>">
                            <br>
                            <label style="float: left; width: 35%">Fecha</label>
                            <input style="margin-bottom: 1.5%;" type="text" name="fecha_consulta" readonly value="<?php echo $fechaFormatoPHP;?>"> <!--se recibe desde HistoriasClinicas--> 
                            <br>                           
                            <label style="float: left; width: 35%">Nº de Registro</label>
                            <input style="margin-bottom: 1.5%;"  type="text" name="codigo_historia" readonly value="<?php echo $UltimoID_D;?>"><!--se recibe desde HistoriasClinicas--> 

                            <div style="background-color: ; margin-top: 3%; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); display: flex; justify-content: center; ">
                                <a href="HistoriasClinicas.php?cedula_pacient=<?php echo $Paciente;?>"" style="background-color: ;  width: 20%; font-size: 13px; border-radius: 10px; color: ;text-align: center;">Anamnesis</a>
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

                                    <a style="background-color:;font-weight: bolder; cursor: default; margin-right: 0%; width: 30%; vertical-align:middle; font-size: 14px; text-align: center;" href="diagnostico.php?fecha=<?php echo $FechaUltimaVisita;?>&ID_HV=<?php echo $IDHistoricoVisita;?>">Diagnostico</a>
                                </div> 
                            </fieldset>
                            <div class=""  style="background-color:; margin-top: 10%; ">                                     
                            <a class="nuevoPaciente"  style="cursor: pointer;" onclick="agendarCita()">Agendar próxima cita</a>   
                            <a class="nuevoPaciente" href="HistoriaOftalmologica_2.php">Nuevo registro médico</a><!--la función nuevoRegistro() se encuentra al final de este documento-->
                            <a class="nuevoPaciente" href="actualizarDatos.php?cedulaPaciente=<?php echo $MiPaciente['cedula_pacient'];?>">Actualizar registro médico</a>
                            <a class="nuevoPaciente" href="">Imprimir registro médico</a>
                            <!--<a class="nuevoPaciente" href="#bajarAntecedentesPersonalesPatológicos ">Antecedentes Personales Patológicos</a>
                            <a class="nuevoPaciente" href="#bajarHabitosPsicobiologicos ">Habitos Psicobiológicos</a>-->
                            <!--<a class="nuevoPaciente" href="#bajarHastaAntecedentes">Antecedentes clinicos</a>-->

                        <script src="../Javascript/menu_2.js"></script><!--si se coloca en el head no funciona.-->
                    </div>
                        </div>
                    </div>

                    <div style="background-color:; width: 65%; float: right; margin-right: 4%; margin-top: 1%;">
                        <a name="marcadorDiagnostico" class="ancla"></a>

                        <fieldset class="historia_2">
                        <legend>Diagnostico</legend>
                            <label class="" style="background-color: ;font-size: 16px; margin-left: 0%; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Diagnostico</label>
                                <?php

                                    //se recibe la fecha del ultimo diagnostico registrado desde HistoriasClinicas.php
                                    $fecha= $_GET["fecha"];
                                    $ID_Diagnostico=$_GET["ID_D"];

                                    //Se consultan los diagnosticos del paciente y se muestra por defecto el ultimo diagnostico
                                    $Consulta= "SELECT * FROM diagnostico WHERE fecha= '$fecha' AND ID_Doctor ='$sesion' AND ID_D =$ID_Diagnostico ORDER BY fecha DESC";
                                    $Recordset=mysqli_query($conexion,$Consulta);                          
                                    $Valor= mysqli_fetch_array($Recordset);

                                    //se cambia el formato de la fecha
                                    //$fechaFormatoMySQL = $Valor["Fecha"];//se obtiene la fecha en formato MySQL
                                    //$fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                   // echo $fechaFormatoPHP;                                 
                                ?>
                            <textarea readonly style="background-color: ; width: 90%; height: 30%; text-align: left;"><?php echo $Valor["diagnostico"]; ?></textarea>
                             

                             <label class="" style="background-color: ;font-size: 16px; margin-left: 0%; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Observacion</label>
                                        
                            <textarea rows="3" cols="80" name=""  id="" style="text-align: left; background-color: ;"><?php echo $Valor["observaciones"]; ?></textarea>   
                        </fieldset>  
                    </div>        
            </section>
        </body>
    </html>


