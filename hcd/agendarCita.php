<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");

$verifica = 1906;  
$_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica

$Paciente=$_SESSION["cedulaIdentidad"]  ;//se introduce el Nº de cedula del paciente
//echo $Paciente;
?> 

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historia Clinica Digital</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Agendar citas medicas Venezuela"/>
        <meta name="keywords" content="reporte medico,historia clinica, "/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script><!--Libreria del Calendario-->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script><!--Libreria del Calendario-->
        <script src="../Javascript/CalendarioJQwery.js"></script> <!--Formato Calendario-->
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/validar_Campos.js"></script> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');

            .agendar_02{
                background-color:; 
                display: inline-block; 
                margin-bottom: 2%; 
                width: 30%;"
            }
        </style> 
    </head>
    <body>
        <h1>ConsultaMedica.com.ve</h1> 
        <div style="background-color: ; border-style:solid; border-width: 1px; border-radius: 15px; width:85%; margin: 3% auto; box-sizing: border-box; padding: 3%;"> 
            <p class="Inicio_1" style="margin-bottom: 1%;">Agendar consulta</p>
            <form action="citasDesdeDoctor_Basico.php" method="POST" autocomplete="off">
                <?php
                    $Consulta_4="SELECT * FROM pacientes_registrados INNER JOIN doctores_pacientesregistrados ON pacientes_registrados.ID_PR=doctores_pacientesregistrados.ID_PR WHERE ID_Doctor ='$sesion' AND cedula_pacient='$Paciente'";
                    $Recordset= mysqli_query($conexion,$Consulta_4);
                    while($TablaVirtual= mysqli_fetch_array($Recordset)){
                        ?>
                        <label class="agendar_02">Nombre</label>
                        <input style="width: 60%;"  type="text" readonly="readonly" name="nombre" id="Nombre" value="<?php echo $TablaVirtual['nombre_pacient'] ?>"/><br>
                           
                        <label class="agendar_02">Apellido</label>
                        <input style="width: 60%;"  type="text" readonly="readonly" name="apellido" id="Apellido" value="<?php echo $TablaVirtual['apellido_pacient'] ?>"/><br>

                        <label class="agendar_02">Cédula</label>
                        <input style="width: 60%;" type="text" readonly="readonly" name="cedula" id="Cedula" value="<?php echo $TablaVirtual['cedula_pacient'] ?>"/><br>
         
                        <label class="agendar_02">Edad</label>
                        <input style="width: 60%;" type="text" readonly="readonly" name="edad" id="Edad" value="<?php echo $TablaVirtual['edad_pacient'] ?>"/><br>
         
                        <label class="agendar_02">Teléfono</label>
                        <input style="width: 60%;" type="text" readonly="readonly" name="telefono" id="Telefono" value="<?php echo $TablaVirtual['telefono_pacient'] ?>"/><br>
                        <?php 
                    } ?>

                <hr>
                <span class="" style="background-color:; margin: auto; display: block; text-align: center;margin-top: 5%; margin-bottom: 2%;">Fecha de la cita</span>
                <input style="background-color: ; position: relative; bottom: 49%; left: 20%; width: 60%;" type="text" id="Calendario_CM" name="fechaCita" tabindex="7"> 

                <span style="height: 30px; width: 100%; margin-top: 1%;display: block; padding-top: 2%; text-align: center; box-sizing: border-box;" id="">Hora de la cita</span>

                <!-- se muestra el select del turno del Dr. por medio de php, no por medio de html-->
                        <?php                               
                                $Consulta="SELECT inicio_mañana, inicia_tarde FROM horarios WHERE ID_Doctor ='$sesion'";
                                $Resulset = mysqli_query($conexion,$Consulta);
                                $TurnoConsulta= mysqli_fetch_array($Resulset);

                                echo '<select  style="background-color: ; margin-left:21%; font-size:15px; height: 24px; width: 60%;" id="Tur_1"  name="tur_1">';
                                echo '<option value="0">Seleccione Turno</option>'; 
                                if(!empty($TurnoConsulta['inicio_mañana'])){        
                                    echo '<option value="mañana">Mañana</option>'; 
                                }
                                if(!empty($TurnoConsulta['inicia_tarde'])){
                                    //echo '<option value="0">Seleccione Turno</option>'; 
                                    echo '<option value="tarde">Tarde</option>'; 
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