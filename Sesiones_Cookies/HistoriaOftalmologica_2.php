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
            /*@import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');*/
            li{
                list-style: none;
            }
        </style> 
    </head>
    <body>
        <div class="Principal" style="background-color: ">
            <header class="fixed_1" style="background-color:; padding-bottom: 1%; height: 10%; ">
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
                <div style="background-color: rgba(108, 182, 7, 0.7); width: 31%; margin-left: 0%; text-align: center; display: flex; justify-content: space-between;">  
                    <p style="margin-top:0.5%; margin-left: 2%; background-color: ;  border-bottom-style: solid; border-bottom-color: #040652; border-bottom-width: 2px; padding-bottom: 0.5%; margin-right: 0%; height: 40%;  display: inline-block;"><a  style="cursor: default; font-size: 13px; font-weight: bolder;">Valores semiológicos</a></p> 

                    <p style="margin-top: 0.5%; background-color: ; height: 40%; display: inline-block; "><a style="font-size: 13px; font-weight: bolder; margin-right: 0%;" href="datosParaclinicos_2.php">Valores paraclinicos</a></p>

                    <p style="margin-top:0.5%;  background-color: ; margin-right: 2%; padding-bottom: 0.5%;  height: 40%;  display: inline-block;"><a href="diagnostico_2.php" style="font-size: 13px;  font-weight: bolder;">Diagnostico</a></p> 
                </div>

        </header>

        <section style="margin-top: 7%;">            
                <?php
                    $Consulta="SELECT * FROM pacientes_registrados WHERE cedula_pacient ='$Paciente' ";
                    $Resulset = mysqli_query($conexion,$Consulta);          
                    $paciente= mysqli_fetch_array($Resulset);

                ?>
                <div style="background-color: ; float: left; width: 25%; margin-left: 2.5%; position: fixed; margin-top: 1.6%;">
                    <div style="background-color:;">
                        <br>
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
                            <input style="margin-bottom: 1.5%;" type="text" name="fecha_consulta" readonly value="<?php echo $fechaMostrar;?>">   
                        </fieldset>
                    </div>
                    <div style="background-color:; width: 100%; margin-top: 3%; margin-left: -1.5%; display: flex; justify-content: center; ">                                         
                            <a style="margin: auto; display: block;" href="HistoriasClinicas.php?cedula_pacient=<?php echo $Paciente;?>" class="buttonCuatro" onclick=" return Advertencia()">Volver</a><!-- La función Advertencia se encuentra al final de este archivo-->

                            <label style="margin:auto; display: block;" for="BotonCargar" class="buttonCuatro" >Guardar</label>
                    </div>   
                    <div class=""  style="background-color:; margin-top: 5%; ">  
                        <div style="background-color:; width: 43%; float: left; margin-bottom: 7%;">
                            <ul>
                                <li><a style="cursor: pointer;" href="#marcadorEnfermedadActual">Enfermedad actual</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorExamenFuncional">Examen funcional</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorPiel">Piel</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorCabeza">Cabeza</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorOjos">Ojos</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorFondoOjos">Fondo de ojos</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorOidos">Oidos</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorNariz">Nariz</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorBoca">Boca</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorFaringe">Faringe</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorCuello">Cuello</a></li>
                            </ul>
                        </div >
                        <div style="background-color:; width: 42%; float: right; margin-bottom: 7%;">
                            <ul>     
                                <li><a style="cursor: pointer;" href="#marcadorGangliosLinfaticos">Ganglios linfaticos</a></li> 
                                <li><a style="cursor: pointer;" href="#marcadorTorax">Torax</a></li>                            
                                <li><a style="cursor: pointer;" href="#marcadorMamas">Mamas</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorRespiratorio">Respiratorio</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorCardiovascular">Cardiovascular</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorPulso">Pulso</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorAbdomen">Abdomen</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorGenitales">Genitales</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorOsteoarticular">Osteoarticular</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorExtremidades">Extremidades</a></li>
                                <li><a style="cursor: pointer;" href="#marcadorNeurolocgico">Neurológico</a></li>
                            </ul>
                        </div>                  
                    </div>

                        
                    
                </div>
            </div>

           
            <div style="background-color:; width: 65%; float: right; margin-right: 4%;  position: relative; margin-top: 1.6%;">
                <form action="cargarNuevaHistoria.php" method="POST">
                    <fieldset class="historia_2" >
                        <legend>Historia médica</legend>
                            <div style="background-color: ; margin-left: 5%;">
                                <label style="background-color: ; font-weight: bolder; font-size: 16px; margin-left: -6%; margin-bottom: 1%; margin-top: 3%; width: 30%; display: block;" class="">Motivo de consulta </label>
                                <textarea rows="3" cols="81" name="motivoConsulta"  id="MotivoConsulta">
                                </textarea><br>

                                <label style="background-color: ; font-weight: bolder; font-size: 16px; margin-left: -6%; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Ojos</label>
                                <div style="background-color: ; width: 100%; height: 50%;">
                                    <div style="border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); " >
                                        <label style="background-color: ;font-size: 14px;margin-left: -3%; margin-right: -9%; width: 20%; display: inline-block;">Agudeza visual</label>

                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: 10%; ">Fraccion de Snellen</label>
                                        <select style="background-color: ; font-size: 12px;">
                                            <option style="background-color: ; font-size: 12px;">20/10</option>
                                            <option style="background-color: ; font-size: 12px;">20/15</option>
                                            <option style="background-color: ; font-size: 12px;">20/20</option>
                                            <option style="background-color: ; font-size: 12px;">20/25</option>
                                            <option style="background-color: ; font-size: 12px;">20/30</option>
                                            <option style="background-color: ; font-size: 12px;">20/40</option>
                                            <option style="background-color: ; font-size: 12px;">20/50</option>
                                            <option style="background-color: ; font-size: 12px;">20/60</option>
                                            <option style="background-color: ; font-size: 12px;">20/80</option>
                                            <option style="background-color: ; font-size: 12px;">20/100</option>
                                            <option style="background-color: ; font-size: 12px;">20/120</option>
                                            <option style="background-color: ; font-size: 12px;">20/150</option>
                                            <option style="background-color: ; font-size: 12px;">20/200</option>
                                            <option style="background-color: ; font-size: 12px;">20/400</option>                                            
                                        </select>
                                        <br>

                                        <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Braquicefalia</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Dolicocefalia</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Mesocefalia</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: 5.7%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block;font-size: 13px; margin-left: -8%;">Turricefala</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -17%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Trigonocefalia</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Oxicefalia</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;" >Craneo de Trebol</label>
                                    </div>
                                    <div style="background-color: ; width: 100%; height: 50%; margin-top: 2%; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); ">
                                        <label style="background-color: ;font-size: 14px;margin-left: -3%; margin-right: -9%; width: 20%; display: inline-block; position: relative; top: -13px;">Pupilas</label>

                                        <input type="checkbox" id="diabete" style="background-color: ; margin-left: -3%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%; ">Normal</label>

                                        <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Macrocefalia</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Microcefalia</label>
                                    </div>
                                    <label class="etiqueta_8">Antecedentes oftalmologicos</label>
                                     <div style="background-color: ;width: 90%; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); margin-bottom: 2%; " >
                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -7%;margin-bottom: 1%;">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -9%;margin-bottom: -10%; ">QX</label><br>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -7%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -9%; ">Pterigion</label>

                                    <input type="checkbox" id="diabete" style="background-color: ; margin-left: -19%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -9%;">Catarata</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -19%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -9%;">Lasik/QR</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -19%">
                                    <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -9%;">Queratoplastia</label>

                                    <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -13%">
                                    <label class="" for="diabete" style="background-color: ; width:10%; display: inline-block; font-size: 13px; margin-left: -9%; position: relative; top:0px;">Retina</label>
                                    
                                    <label class="etiqueta_8">Otras cirugías</label>
                                    <textarea rows="2" cols="60" name="tratamiento" id="Tratamiento"></textarea>
                                </div>
                                    <div style="background-color: ; width: 100%; height: 50%; margin-top: 2%; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); ">
                                        <label style="background-color: ;font-size: 14px;margin-left: -3%; margin-right: -9%; width: 20%; display: inline-block; position: relative; top: -13px;">Simetría</label>

                                        <input type="checkbox" id="diabete" style="background-color: ; margin-left: -3%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%; ">Simetrica</label>

                                        <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Asimetría posterior</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Asimetría anterior</label>
                                    </div>
                                    <div style="background-color: ; width: 100%; height: 50%; margin-top: 2%;  border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); ">
                                        <label style="background-color: ;font-size: 14px;margin-left: -3%; margin-right: -9%; width: 20%; display: inline-block; position: relative; top: -13px;">Posición</label>

                                        <input type="checkbox" id="diabete" style="background-color: ; margin-left: -3%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%; ">Dorsiflexión</label>

                                        <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Retroflexión</label>
                                    </div>
                                    <div style="background-color: ; width: 100%; height: 50%; margin-top: 0%;">
                                       <label style="background-color: ;font-size: 14px;margin-left: -3%; margin-right: -9%; width: 20%; display: inline-block; position: relative; top: 3px;">Deformaciones localizadas</label>

                                        <input type="checkbox" id="diabete" style="background-color: ; margin-left: -3%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%; ">Lipomas</label>

                                        <input type="checkbox" id="diabete" style="background-color: ; margin-left: -17%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Quistes dermoides</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Hematomas</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Aneurismas cirsoides</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: 5.7%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block;font-size: 13px; margin-left: -8%;">Craneosquisis</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -17%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Anancefalia</label><br>

                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: 115px; ">Craneosinostosis:</label>

                                        <input type="checkbox" id="diabete" style="background-color: ; margin-left: -13%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Frontal</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Parietal</label>

                                        <input type="checkbox" id="diabete"  style="background-color: ; margin-left: -12%">
                                        <label class="" for="diabete" style="background-color: ; width: 20%; display: inline-block; font-size: 13px; margin-left: -8%;">Occipital</label>
                                    </div>

                                    <a name="marcadorFondoOjos" class="ancla"></a>             
                                    <label class="" style="background-color: ; font-weight: bolder; font-size: 16px; margin-left: -6%; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Fondo de ojos</label>
                                    <textarea rows="3" cols="76" name="fondoOjos"    id="FondoOjos">
                                    </textarea>

                                    <label style="background-color: ; font-weight: bolder; font-size: 16px; margin-left: -6%; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Observaciones</label>
                                    <textarea rows="10" cols="76" name="cabeza" id="Cabeza" style="margin-bottom: 5%;">
                                        

                                    </textarea>
                                </div>
                        
                                                
                                <a name="marcadorFondoOjos" class="ancla"></a>             
                                <label class="" style="background-color: ; width: 20%; display: block; margin-bottom: 1%; margin-top: 3%;">Fondo de ojos</label>
                                <textarea rows="3" cols="76" name="fondoOjos"    id="FondoOjos">
                                </textarea>                               
                            </div>
                        
                           
                        
                                          
                        <br><br><hr  color="#040652" size="5" width="97%" align="left" ><br>
                        <br>
                        <input type="text" name="doctor" hidden value="<?php echo $sesion; ?>">         
                        <input type="text" name="fecha" hidden value="<?php echo $fecha; ?>">
                        <input type="text" name="cedula" hidden value="<?php echo $Paciente; ?>">

                        <input type="submit" value="cargar" hidden id="BotonCargar">
                    </fieldset>
                </form>
            </div>
        </section>
                </div>
               
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