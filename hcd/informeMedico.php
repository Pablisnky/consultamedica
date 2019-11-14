<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");

    $verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica
    //Sesion para impedir en diagnostico_Basico_2.php que se recargue la pagina y mande registros varias veces a la base de datos, esto porque cuando se abre diagnostico_2.php crea un registro automaticamente en la base de datos
    $verifica_2 = 2018;  
    $_SESSION["verifica_2"] = $verifica_2;


    $Paciente= $_GET["cedula_pacient"];//Se recibe la cedula desde RegistroPacientes.php, desde muestraHistoria.php  desde muestraHistoria_2.php desde cargarNuevaHistoria.php desde muestraHistoria.php desde diagnostico.php
    // echo "<br>";
    // echo "C.I del paciente: " . $Paciente . "<br>";

    //se crea una $_SESSION que contiene el Nº de cedula del paciente
    $_SESSION["cedulaIdentidad"] = $Paciente;

    $sesion = intval($sesion);//evita inyeccion SQL, solo cuando la busqueda WHERE es por medio de un valor numerico

    //Se consulta para obtener el nombre y apellido del doctor
    $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
    $UsDoctor= mysqli_fetch_row($NombreDoctor);
    $UsDoctor[1]; //se obtiene el nombre del doctor.

    //se configura el sistema para que trabaje con la hora nacional.
    //date_default_timezone_set('America/Caracas');
    //$fecha= date("d-m-Y");

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
		<title>Informe médico</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Historia clinica de pacientes en Venezuela"/>
		<meta name="keywords" content="reporte medico,historia clinica, "/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="stylesheet" type="text/css" href="../css/iconoFlecha/flecha.css"/><!--galeria de icomoon.io--> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script>

        <style>
            li{
                list-style: none;
            }
        </style>         
    </head>	    
    <body>  
        <div class="Principal">             
            <header class="fixed_1">
                <?php
                    include("../header/headerDoctor.php");
                ?>
                <div style="background-color:green; width: 31%; margin-left: 0%; text-align: center;">  
                    <p style="margin-top:0.5%;  background-color: ; font-size: 17px; font-weight: bolder;  border-bottom-style: solid; border-bottom-color: #040652; border-bottom-width: 2px; padding-bottom: 0.5%; margin-right: 5%; height: 40%; display: inline-block;">Informe médico</p> 
                </div>
            </header>
            <div style="margin-top: 0%; width: 100%;"> 
                <div id="mostrarTabla" onmouseleave="quitarFechas()" class="mostrarTabla">
                    <?php 
                        include("tablaFechaAntecedentes.php");
                    ?>
                </div>
            </div>
            <div class="ocultarMenu_1"  onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive--> 
                <?php                
                    //se buscan los datos del pacientes.
                    $Consulta_20="SELECT * FROM pacientes_registrados WHERE cedula_pacient='$Paciente' ";
                    $Recordset_20=mysqli_query($conexion,$Consulta_20);      
                    $Pacient= mysqli_fetch_array($Recordset_20);

                    //Cambiar formato de fecha.                    
                    $fechaFormatoMySQL = $Pacient['fecha_registro'];//se obtiene la fecha en formato MySQL
                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y

                    //Se obtiene la hora en que se introdujo el registro.
                    $fechaFormatoMySQL = $Pacient['fecha_registro'];//se obtiene la fecha en formato MySQL
                    $Hora = date("g:i a", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                  
                ?>
                <p class="iconoFijo" onclick="mostrarAntecedentesPaciente()">Paciente: <?php echo $Pacient['nombre_pacient'] . ' ' . $Pacient['apellido_pacient'];?></p><!--la funcion mostrarAntecedentesPaciente() se encuentra en Funciones_varias.js-->
                <p  onclick="mostrarAntecedentesPaciente()" class='buttonCuatro buttonSeis '>HCD</p>
                   
            <div onclick=""><!--en este contenedor se hace click y se oculta el menu responsive-->   

            
            <section style="margin-top: 10%;">             
                <div class="historia_1" id="Historia_1">
                    <div>
                        <fieldset style="border-radius: 15px; padding: 2%">
                            <legend>Paciente</legend>
                            <label class="etiqueta_19">Nombre</label>
                            <input  style="margin-bottom: 1.5%;" type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $Pacient['nombre_pacient'];?>" > 
                            <br/>
                            <label class="etiqueta_19">Apellido</label>
                            <input  style="margin-bottom: 1.5%;"  class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $Pacient['apellido_pacient'];?>" >
                            <br/>
                            <label class="etiqueta_19">Cedula</label>
                            <input  style="margin-bottom: 1.5%;"  type="text" name="cedula_Paciente" readonly value="<?php echo $Pacient['cedula_pacient'];?>">
                            <br/>
                            <label class="etiqueta_19">Fecha</label>
                            <input  style="margin-bottom: 1.5%;"  type="text" name="fecha_consulta" readonly value="<?php echo $fechaFormatoPHP;?>">
                            <br>
                            <label class="etiqueta_19">Hora</label>
                            <input style="background-color: ; margin-bottom: 1.5%;"  type="text" name="" readonly value="<?php echo $Hora;?>">
                            <br> 
                      
                            <div style="background-color:; margin-top: 3%; width: 65%; margin:auto; display:table;  ">

                                <?php
                                    //Se busca la fecha del ultimo diagnostico.
                                    $Consulta_4 ="SELECT fecha FROM diagnostico WHERE ID_Doctor ='$sesion' AND Cedula_Paciente ='$Paciente' ORDER BY fecha DESC LIMIT 1";
                                    $Recordset_4=mysqli_query($conexion,$Consulta_4); 
                                    $Fecha= mysqli_fetch_array($Recordset_4);
                                    $FechaUltimoDiagnostico= $Fecha["fecha"];
                                    // echo "fecha diagnostico= " . $FechaUltimoDiagnostico . "<br>";

                                        if($Plan == "Ini"){
                                            $Enviar_2= "Promo.php";
                                            $Enviar_3= "Promo.php";
                                            $Enviar_4= "actualizarDatos.php?cedulaPaciente=$Paciente";
                                            $Enviar_5= "Promo.php";
                                            $Enviar_6= "Promo.php";
                                            ?>
                                            <style>
                                                .NoAplica{
                                                    color: #FE0202;/*Rojo*/
                                                }
                                            </style>
                                            <?php
                                        }
                                        else if($Plan == "Bas"){
                                            $Enviar_2= "Anamnesis.php?cedulaPaciente=$Paciente";
                                            $Enviar_3= "diagnostico.php?fecha=$FechaUltimoDiagnostico";
                                            $Enviar_4= "actualizarDatos.php?cedulaPaciente=$Paciente";
                                            $Enviar_5= "diagnostico_2.php?cedulaPaciente=$Paciente";
                                            $Enviar_6= "../Graficos/grafico_Hb.php?cedulaPaciente=$Paciente";
                                            $Enviar_7= "HistoriasClinicas.php?cedulaPaciente=$Paciente";                                        
                                        }
                                        else if($Plan == "Esp"){
                                            $Enviar_2 ="";
                                        }
                                ?>

                                <a style="background-color: ; width: 40%; display: table-cell; width: 40%; vertical-align: middle; font-size: 13px; color: ;text-align: center;"  href="<?php echo $Enviar_7;?>">Datos de paciente</a>

                                <a style=" margin-right: 0%; display: table-cell; width: 40%; vertical-align: middle; font-size: 13px; text-align: center;" href="<?php echo $Enviar_2;?>">Anamnesis</a>                                   
                            </div>
                            <div style="background-color:; margin-top: 3%; border-top-style: solid; border-top-width: 0.5px; border-color:rgba(4,6,82,0.4);  display:table;">

                                <a style="background-color:; color:#FE0202; margin-right: 0%; width: 30%;  font-size: 13px; text-align: center; display: table-cell; vertical-align: middle;" href="<?php echo $Enviar_2;?>">Valores semiologicos</a>

                                <a style="background-color: ; color:#FE0202;  font-size: 13px; width: 24%; margin-right: 0%; text-align: center; display: table-cell; vertical-align: middle;" href="<?php echo $Enviar_6;?>">Valores paraclinicos</a>
                            </div>
                        </fieldset>                
                    </div>

                    <div style="background-color:; margin-top: 10%; "> 
                            <a class="nuevoPaciente" href="">Datos de paciente</a>
                            <a class="nuevoPaciente NoAplica" href="">Antecedentes médicos personales</a>
                            <a class="nuevoPaciente NoAplica" href="" style="cursor: pointer;">Antecedentes familiares</a>
                            <a class="nuevoPaciente NoContemplado" href="">Habitos Psicobiológicos</a> 
                            <a class="nuevoPaciente" style="cursor: pointer;">Valores semiológicos</a>
                            <a class="nuevoPaciente NoContemplado" href="">Valores paraclínicos</a>
                            <a class="nuevoPaciente_2" href="">Antecedentes clinicos</a>
                        <script src="../Javascript/menu_2.js"></script><!--si se coloca en el head no funciona.-->
                    </div>
                </div>

                <!--solo es visible en formatos para telefonos y tablets-->
                    <div  class="fixed_1" style="z-index: 2">
                        <div class="menuResponsive_2" id="MenuResponsive_2">
                            <a class="nuevoPaciente" href="">Datos de paciente</a>
                            <a class="nuevoPaciente NoAplica" href="">Antecedentes médicos personales</a>
                            <a class="nuevoPaciente NoAplica" href="" style="cursor: pointer;">Antecedentes familiares</a>
                            <a class="nuevoPaciente NoContemplado" href="">Habitos Psicobiológicos</a> 
                            <a class="nuevoPaciente" style="cursor: pointer;">Valores semiológicos</a>
                            <a class="nuevoPaciente NoContemplado" href="">Valores paraclínicos</a>
                            <a class="nuevoPaciente_2" href="">Antecedentes clinicos</a>
                        </div>
                    </div>


                <div onclick="ocultarAntecedentesPaciente()" class="historia_3">
                    <form action="" method="" name="formDoc">
                        <fieldset class="historia_2">
                        <legend>Datos del Paciente</legend>                        
                        <label class="etiqueta_5" >Nombre</label>
                        <input  type="text" name="nombre_Paciente" id="NombrePaciente" readonly="readonly" value="<?php echo $Pacient['nombre_pacient'];?>">
                        <br class="ocultar">
                        <label class="etiqueta_6" for="ApellidoPaciente" >Apellido</label>
                        <input class="" type="text" name="apellido_Paciente" id="ApellidoPaciente" readonly="readonly" value="<?php echo $Pacient['apellido_pacient'];?>">
                        <br>
                        <label class="etiqueta_5">Cedula</label>
                        <input type="text" name="cedula_Paciente" id="CedulaPaciente" readonly="readonly" value="<?php echo $Pacient['cedula_pacient'];?>">
                        <br class="ocultar">                        
                        <label class="etiqueta_6">Telefono</label>
                        <input type="text" name="telefono" id="TelefonoPaciente" readonly="readonly" value="<?php echo $Pacient['telefono_pacient'];?>">
                        <br>                 
                        <label class="etiqueta_5">Nacionalidad</label>
                        <input type="text" name="nacionalidad_Paciente" id="NacionalidadPaciente" readonly="readonly" value="<?php echo $Pacient['nacionalidad_pacient'];?>">
                        <br class="ocultar"> 
                        <label class="etiqueta_6">Estado Civil</label>
                        <input type="text" name="estadoCivil_Paciente" id="EstadoCivilPaciente" readonly="readonly" value="<?php echo $Pacient['estadoCivil_pacient'];?>">
                        <br class="ocultar"> 
                        <label class="etiqueta_5">Fecha Nacimiento</label>
                        <?php
                            //se cambia el formato de la fecha a d-m-Y
                            $fechaFormatoMySQL=$Pacient["fechaNacimiento_pacient"];
                            $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));
                        ?>
                        <input type="text" name="fechaNacimiento_Paciente" id="FechaNacimientoPaciente" readonly="readonly"  value="<?php echo $fechaFormatoPHP?>">
                         
                        <label class="etiqueta_6">Edad</label>
                        <input type="text" name="edadOculta" readonly="readonly" id="EdadOculta" value="<?php echo $Pacient['edad_pacient'];?>">
                        <br> 
                        <label class="etiqueta_5">Grupo Sanguineo</label>
                        <input type="text" name="grupoSanguineo" id="Sangre" readonly="readonly" value="<?php echo $Pacient['grupoSanguineo_pacient'];?>">
                        <br class="ocultar">
                        <label class="etiqueta_6">Sexo</label>
                        <input type="text" name="sexo_Paciente" id="SexoPaciente" readonly="readonly" value="<?php echo $Pacient['sexo_pacient'];?>">
                        <br>       
                        <label class="etiqueta_5">Grado instrucción</label>
                        <input type="text" name="gradoInstruccion" id="GradoInstruccion" readonly="readonly" value="<?php echo $Pacient['gradoInstruccion'];?>">
                        <br class="ocultar">    
                        <label class="etiqueta_6">Ocupación</label>
                        <input type="text" name="ocupacion" id="Ocupacion" readonly="readonly" value="<?php echo $Pacient['ocupacion'];?>">
                        <br>                            
                        <label class="etiqueta_5">Religion</label>
                        <input type="text" name="religion"  id="Religion" readonly="readonly" value="<?php echo $Pacient['religion'];?>">
                        <br class="ocultar">    
                        <label class="etiqueta_6">Correo electronico</label>
                        <input type="text" name="correo" id="Correo" readonly="readonly" value="<?php echo $Pacient['correo_pacient'];?>">
                        <label class="etiqueta_5">Nº Hijos</label>
                        <input type="text" name="hijos" id="Hijos" readonly="readonly" value="<?php echo $Pacient['correo_pacient'];?>">

                        <hr style="margin: 1% auto;">
                        
                        <div class="registro_3">
                            <label class="etiqueta_5" style="width: 45%;">Lugar de Residencia</label>
                            <br><br>
                                <label class="etiqueta_23">Estado</label>
                                <input class="etiqueta_30" type="text" name="estadoResidencia" id="EstadoResidencia" readonly="readonly" value="<?php echo $Pacient['estado_Residencia'];?>">
                            <br >
                            <label class="etiqueta_23">Municipio</label>
                            <input class="etiqueta_30" type="text" name="municipioResidencia" id="MunicipioResidencia" readonly="readonly" value="<?php echo $Pacient['municipio_Residencia'];?>">                    
                            <br>
                            <label class="etiqueta_23">Parroquia</label>
                            <input class="etiqueta_30" type="text" name="parroquiaResidencia" id="ParroquiaResidencia" readonly="readonly" value="<?php echo $Pacient['parroquia_Residencia'];?>">
                        </div>
                        <div class="registro_4">
                            <label class="etiqueta_5" style="width: 40%;">Lugar Nacimiento</label> 
                            <br><br>
                            <label class="etiqueta_25">Estado</label>
                            <input class="etiqueta_31" type="text" name="estadoNacimiento" id="EstadoNacimiento" readonly="readonly" value="<?php echo $Pacient['estado_Nacimiento'];?>">
                            <br >
                            <label class="etiqueta_25">Municipio</label>
                            <input class="etiqueta_31" type="text" name="municipioNacimiento" id="MunicipioNacimiento" readonly="readonly" value="<?php echo $Pacient['municipio_Nacimiento'];?>">       
                            <br>
                            <label class="etiqueta_25">Parroquia</label>
                            <input class="etiqueta_31" type="text" name="parroquiaNacimiento" id="ParroquiaNacimiento" readonly="readonly" value="<?php echo $Pacient['parroquia_Nacimiento'];?>">
                        </div>
                        <label class="etiqueta_12">Especifique dirección actual</label>                    
                        <textarea  class="etiqueta_11" rows="3"  name=direccionActual id="DireccionActual" readonly="readonly"><?php echo $Pacient['direccion_Actual'];?></textarea>
                        
                        <br>
                        <label class="etiqueta_12">En caso de emergencia</label>
                        <textarea  class="etiqueta_11" rows="3" name=" emergencia" id="Emergencia" readonly="readonly"><?php echo $Pacient['emergencia_pacient'];?></textarea>
                        </fieldset> 



                        <fieldset class="historia_2">
                            <legend>Antecedentes médicos personales</legend>                            
                        </fieldset>

                        <fieldset class="historia_2">
                            <legend>Antecedentes familiares</legend>
                        </fieldset>

                        <fieldset class="historia_2">
                            <legend>Habitos Psicobiológicos</legend>
                        </fieldset>

                        <fieldset class="historia_2">
                            <legend>Valores semiológicos</legend>
                        </fieldset>

                        <fieldset class="historia_2">
                            <legend>Valores paraclínicos</legend>
                        </fieldset>


                        <fieldset class="historia_2">
                            <legend>Antecedentes clinicos</legend>                                    
                                <?php           
                                //echo "La fecha del diagnostico es= " . $fechaDiagnostico  . "<br>";
                                //Se consultan los diagnosticos del paciente y se muestra el diagnostico segun la fecha recibida, el doctor y el paciente
                                $Consulta= "SELECT * FROM diagnostico WHERE fecha= '$fechaDiagnostico' AND ID_Doctor ='$sesion' AND Cedula_Paciente ='$Paciente' ORDER BY ID_D  DESC  ";
                                $Recordset=mysqli_query($conexion,$Consulta); 
                                if(!mysqli_num_rows($Recordset)==0){
                                    while($Valor= mysqli_fetch_array($Recordset)){
                                        //se cambia el formato de la fecha
                                        $fechaFormatoMySQL = $Valor["fecha"];//se obtiene la fecha en formato MySQL
                                        $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                                        // echo $fechaFormatoPHP;                                 
                                        ?>

                                            <input class="etiqueta_17" hidden type="text" readonly="readonly" value="<?php echo $fechaFormatoPHP;?>">
                                        
                                            <label class="diagnostico_2"><b>Motivo de consulta</b></label>
                                            <textarea  class="diagnostico_1" rows="3" id="Motivo" readonly><?php echo $Valor["motivoConsulta"]; ?></textarea>
                                            
                                            <label class="diagnostico_2"><b>Diagnostico</b></label>
                                            <textarea  class="diagnostico_1" rows="3" id="Diagnostico" readonly><?php echo $Valor["diagnostico_1"] . "\r\n" . "\r\n" . $Valor["diagnostico_2"]?></textarea> 

                                            <textarea  class="diagnostico_1" rows="3" id="DiagnosticoDescripcion" readonly><?php echo $Valor["diagnosticoDescripcion"]; ?></textarea> 

                                            <label class="diagnostico_2"><b>Tratamiento farmacológico</b></label> 
                                            <div id="TratamientosMedicados" style="background-color: ; width: 97.5%;">
                                                <div class="TratamientosMedicados_1">                                          
                                                    <textarea  class="diagnostico_1" rows="3" id="Tratamiento_1" readonly="readonly"><?php echo $Valor["tratamiento_1"] . "\r\n" ."\n" . $Valor["recibeTratamiento_1"] ;?></textarea>  
                                                </div>
                                                <div class="TratamientosMedicados_1">
                                                    <textarea  class="diagnostico_1" id="Tratamiento_2" rows="3" readonly="readonly"><?php echo $Valor["tratamiento_2"] . "\r\n" . "\n" . $Valor["recibeTratamiento_2"] ;?></textarea> 
                                                </div>
                                            </div>  

                                            <label class="diagnostico_2"><b>Posología</b></label>            
                                            <textarea  class="diagnostico_1" id="Posologia" rows="3" readonly="readonly"><?php echo $Valor["posologia"]; ?></textarea>
                                                        
                                                    
                                            <hr style="background-color: #040652; height: 3px; width: 95%">
                                                <?php 
                                        }  
                                    }
                                    else{
                                        echo "No se encontraron diagnoticos para el paciente";
                                    }
                                            ?>
                            </fieldset>

                        <input type="text" hidden  id="Doctor" name="doctor" value="<?php echo $especialista=$_SESSION["UsuarioDoct"];?>"> <!--se envia el ID del doctor a Ajax_Cancelar.js para agendar cita-->
                    </form> 
                </div> 
            </section>         
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
        function imprimir(){
            alert("No se ha detectado impresora");
        }
</script>

