<?php   
//agenda una cita desde la sesion del Dr.
session_start();  //Se reaunada la sesion abierta en validarSesion.php
$verifica = 1906;  
$_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica

include("../conexion/Conexion_BD.php");
mysqli_query($conexion,"SET NAMES 'utf8' ");
                    
$sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION
//echo $sesion;
$Paciente=$_SESSION["cedulaIdentidad"]  ;//se introduce el Nº de cedula del paciente

$Consulta_3="SELECT turno  FROM horarios INNER JOIN doctores_horarios ON horarios.ID_Horario=doctores_horarios.ID_Horario WHERE ID_Doctor ='$sesion'";
$Resulset = mysqli_query($conexion,$Consulta_3);
?> 

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historia Clinica Digital</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Agendar citas medicas Venezuela"/>
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
    </head>
    <body>
        <h1>ConsultaMedica.com.ve</h1> 
        <div style="background-color: ; border-style:solid; border-width: 1px; width:82%; margin: 5%; padding: 3%;"> 
            <p class="Inicio_1" style="margin-bottom: 2%;">Agendar consulta</p>
            <form action="citasDesdeDoctor.php" method="POST">
                <?php
                    $Consulta_4="SELECT * FROM pacientes_registrados WHERE ID_Doctor ='$sesion' AND cedula_pacient='$Paciente'";
                    $Recordset= mysqli_query($conexion,$Consulta_4);
                    while($TablaVirtual= mysqli_fetch_array($Recordset)){
                ?>
                        <label for="nombre" style="background-color: ; display: inline-block; width: 30%;">Nombre</label>
                        <input style="width: 60%;"  type="text" readonly="readonly" name="nombre" id="Nombre" value="<?php echo $TablaVirtual['nombre_pacient'] ?>"/><br>
                           
                        <label for="apellido" style="background-color: ; display: inline-block; width: 30%;">Apellido</label>
                        <input style="width: 60%;"  type="text" readonly="readonly" name="apellido" id="Apellido" value="<?php echo $TablaVirtual['apellido_pacient'] ?>"/><br>

                        <label for="cedula" style="background-color: ; display: inline-block; width: 30%;">Cédula</label>
                        <input style="width: 60%;" type="text" readonly="readonly" name="cedula" id="Cedula" value="<?php echo $TablaVirtual['cedula_pacient'] ?>"/><br>
         
                        <label for="Edad" style="background-color: ; display: inline-block; width: 30%;">Edad</label>
                        <input style="width: 60%;" type="text" readonly="readonly" name="edad" id="Edad" value="<?php echo $TablaVirtual['edad_pacient'] ?>"/><br>
         
                        <label for="telefono" style="background-color: ; display: inline-block; width: 30%;">Teléfono</label>
                        <input style="width: 60%;" type="text" readonly="readonly" name="telefono" id="Telefono" value="<?php echo $TablaVirtual['telefono_pacient'] ?>"/><br>
                    <?php } ?>

                <hr>
                <span class="" style="background-color:; margin: auto; display: block; text-align: center;margin-top: 5%; margin-bottom: 2%;">Fecha de la cita</span>
                <input style="background-color: ; position: relative; bottom: 49%; left: 20%; width: 60%;" type="text" id="Calendario_CM" name="fechaCita" tabindex="7"> 

                <span style="height: 30px; width: 100%; margin-top: 2%;display: block; padding-top: 2%; text-align: center; box-sizing: border-box;" id="">Hora de la cita</span>

                <!-- se muestra el select del turno del Dr. por medio de php,no por medio de html-->
                        <?php
                            echo '<select id="Tur_1"  name="tur_1" style="background-color:; margin:auto; display:block">';//Captura, almacena el ID_Doctor
                            echo '<option value="0"> Seleccione Turno </option>';           
                            while($TurnoConsulta= mysqli_fetch_array($Resulset)){
                                echo '<option value="'.$TurnoConsulta['turno'].'">'.$TurnoConsulta['turno'].' </option>'; 
                            }
                            echo  '</select>';
                        ?>
                <hr style="margin-top: 10%; margin-bottom: 4%;">
                <span style="cursor: pointer;text-align: center; text-decoration: underline; display: block;" onclick="llamar_DoctorReserva()">Verifique disponibilidad de cupos.</span><!-- la función lamar_DoctorReserva() se encuentra en Ajax_Cancelar-->
                <div id="MostrarPacientes"></div>

                <input type="text" hidden  id="Doctor" name="doctor" value="<?php echo $sesion;?>"> <!--se envia el ID del doctor a Ajax_Cancelar.js para agendar cita-->            
                <input type="submit" value="Agendar cita" style="display: block; margin: auto;" onclick=" return validar_06();" > 
            </form>
        </div>
    </body>