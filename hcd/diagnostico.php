<?php
    // Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");
    include("../Clases/muestraError.php");
    
    $Paciente= $_SESSION["cedulaIdentidad"];//se introduce la cedula mediante $_SESSION
    // echo "<br>";
    // echo "Cedula paciente: " . $Paciente . "<br>";
    
    $fechaDiagnostico= $_GET["fecha"];//se recibe  desde HistoriaClinica_Basico.phh(la fecha de la ultima vez que el paciente estuvo en consulta) y desde tablaFechaAntecedentes_Basico.php 
    // echo "Fecha ultimo diagnostico= " . $fechaDiagnostico;

    //date_default_timezone_set('America/Caracas');
    //$fecha=date("Y-m-d");//para guardar la fecha en MySQL y no haya problema con el formato 

    //$fechaMostrar=date("d-m-Y");//para mostrar la fecha del registro medico que se va a realizar

    //echo $fechaDiagnostico;// desde HistoriasCLinicas_Basico.php.php

    //se cambia el formato de la fecha
    $fechaFormatoMySQL = $fechaDiagnostico;//se obtiene la fecha en formato MySQL
    $fechaFormatoPHP_A = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
    //echo $fechaFormatoPHP_A;   
?>

<script type="text/javascript">
    //Ajuste el texto del texarea donde va el motivo de la consulta
    function resize_1(){
        var text = document.getElementById('Motivo');
            text.style.height = 'auto';
            text.style.height = text.scrollHeight+'px';
    }


    //Ajuste el texto del texarea donde va el diagnostico de la consulta
    function resize_2(){
        var text = document.getElementById('Diagnostico');
            text.style.height = 'auto';
            text.style.height = text.scrollHeight+'px';
    }


    //Ajuste el texto del texarea donde va el motivo de la consulta
    function resize_3(){
        var text = document.getElementById('DiagnosticoDescripcion');
            text.style.height = 'auto';
            text.style.height = text.scrollHeight+'px';
    }

    //Ajuste el texto del texarea donde va el motivo de la consulta
    function resize_4(){
        var text = document.getElementById('Tratamiento_1');
            text.style.height = 'auto';
            text.style.height = text.scrollHeight+'px';
    }

    //Ajuste el texto del texarea donde va el motivo de la consulta
    function resize_5(){
        var text = document.getElementById('Tratamiento_2');
            text.style.height = 'auto';
            text.style.height = text.scrollHeight+'px';
    }

    //Ajuste el texto del texarea donde va la posología
    function resize_6(){
        var text = document.getElementById('Posologia');
            text.style.height = 'auto';
            text.style.height = text.scrollHeight+'px';
    }
</script>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historia Clinica Digital</title>
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
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas_lista.css"/> 
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" type="text/css" href="../css/iconoFlecha/flecha.css"/><!--galeria de icomoon.io-->
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png"> 

        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/AjaxBuscador.js"></script> 

        <style>
            li{
                list-style: none;
            }
        </style> 
    </head>
    
    <body onload="resize_1(); resize_2(); resize_3(); resize_4(); resize_5(); resize_6()">        
        <div class="Principal">            
            <header class="fixed_1">
                <?php
                    include("../header/headerDoctor.php");
                ?>
            </header>  
                <?php                
                    $Consulta_2="SELECT * FROM pacientes_registrados LEFT JOIN historico_visitas ON pacientes_registrados.cedula_pacient=historico_visitas.cedula_paciente WHERE cedula_pacient='$Paciente' ";
                    $Recordset_2=mysqli_query($conexion,$Consulta_2);      
                    $MiPaciente= mysqli_fetch_array($Recordset_2);

                    //se cambia el formato de la fecha a d-m-Y
                    $fechaFormatoMySQL=$MiPaciente["fechaNacimiento_pacient"];
                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));
                ?>
                <!--En este parrafo se llama al menu del paciente-->
                <p class="iconoFijo" onclick="mostrarAntecedentesPaciente()">Paciente: <?php echo $MiPaciente['nombre_pacient'] . ' ' . $MiPaciente['apellido_pacient'];?></p><!-- la funcion mostrarAntecedentesPaciente() se encuentra en Funciones_varias.js-->

                <p  onclick="mostrarAntecedentesPaciente()" class='buttonCuatro buttonSeis '>HCD</p>
                    <!-- <span class="icon-arrow-right iconoFlecha" onclick="mostrarAntecedentesPaciente()"></span> -->
          
            
            <div class="Principal" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive, esta funcion se encuentra en Funciones_varias.js-->

                <div style="background-color:; margin-top: 2%; width: 100%; display:; " >
                    <div id="mostrarTabla" onmouseleave="quitarFechas()" class="mostrarTabla">
                        <?php 
                            include("tablaFechaAntecedentes.php");
                        ?>
                    </div>
                    <section style="margin-top: 10%;">  
                        <div class="historia_1" >
                            <div >
                                <br>
                                <fieldset style="border-radius: 15px; padding: 2%">
                            <legend>Paciente</legend>
                            <label class="etiqueta_19">Nombre</label>
                            <input style="margin-bottom: 1.5%;"  type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $MiPaciente['nombre_pacient'];?>" > 
                            <br>
                            <label class="etiqueta_19">Apellido</label>
                            <input style="margin-bottom: 1.5%;" class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $MiPaciente['apellido_pacient'];?>" >
                            <br>
                            <label class="etiqueta_19">Cedula</label>
                            <input style="margin-bottom: 1.5%;" type="text" name="cedula_Paciente" value="<?php echo $MiPaciente['cedula_pacient'];?>">
                            <br>
                            <label class="etiqueta_19">Fecha</label>
                            <input style="margin-bottom: 1.5%;" type="text" name="fecha_consulta" readonly value="<?php echo $fechaFormatoPHP_A;?>">  
                            <br>                                                       

                            <div style="background-color: ; margin-top: 3%; width: 65%; margin:auto; display:table;  ">
                                <a href="HistoriasClinicas.php?cedula_pacient=<?php echo $Paciente?>" style="background-color: ;  width: 40%; font-size: 13px; border-radius: 10px; color: ;text-align: center;display: table-cell;vertical-align: middle;">Datos de paciente</a>

                            <?php
                                    //Se busca la fecha del ultimo diagnostico.
                                    $Consulta_4 ="SELECT fecha FROM diagnostico WHERE ID_Doctor ='$sesion' AND Cedula_Paciente ='$Paciente' ORDER BY fecha DESC LIMIT 1";
                                    $Recordset_4=mysqli_query($conexion,$Consulta_4); 
                                    $Fecha= mysqli_fetch_array($Recordset_4);
                                    $FechaUltimoDiagnostico= $Fecha["fecha"];
                                    //echo "fecha ultimo diagnostico= " . $FechaUltimoDiagnostico . "<br>";
                                    //echo "fecha diagnostico buscado= " . $fechaDiagnostico . "<br>";
                                    if($FechaUltimoDiagnostico <= $fechaDiagnostico){

                            ?>
                                    <!--Si en pantalla se muestra el ultimo diagostico el enlace no se ejecuta.-->
                                        <a style="font-weight:bold; cursor: default; margin-right: 0%; width: 40%; vertical-align:middle; font-size: 13px; text-align: center;display: table-cell;vertical-align: middle;" href="">Ultimo diagnóstico</a>
                                        <?php
                                    }
                                    else{//Si en pantalla se muestra un diagostico que no es el ultimo el enlace se ejecuta.
                                        ?>
                                        <a style="margin-right: 0%; width: 40%; vertical-align:middle; font-size: 13px; text-align: center;display: table-cell;vertical-align: middle;" href="diagnostico.php?fecha=<?php echo $FechaUltimoDiagnostico;?>">Ultimo diagnóstico</a>
                                        <?php

                                    } ?>
                                
                            </div>
                            <div style="color:#FF436B; margin-top: 3%;  border-top-style: solid; border-top-width: 0.5px; border-color:rgba(4,6,82,0.4); display:table;  ">

                                    <a href="Anamnesis.php?cedulaPaciente=<?php echo $Paciente;?>" style="background-color: ; width: 20%; font-size: 13px; border-radius: 10px; color: ;text-align: center;display: table-cell;vertical-align: middle;">Anamnesis</a>

                                    <a style="background-color:; margin-right: 0%; color:#FE0202; width: 30%;  font-size: 13px; text-align: center;display: table-cell;vertical-align: middle;" href="Promo.php">Valores semiologicos</a>

                                    <a style="background-color: ; color:#FE0202;  font-size: 13px; width: 24%; margin-right: 0%; text-align: center;display: table-cell;vertical-align: middle;" href="Promo.php">Valores paraclinicos</a>
                                </div> 
                            </fieldset>
                            <div class=""  style="background-color:; margin-top: 10%; ">                                     
                            <a class="nuevoPaciente"  style="cursor: pointer;" onclick="agendarCita()">Agendar próxima cita</a><!--La función agendarCita() se encuentra al final del documento-->    
                            <a class="nuevoPaciente" style="cursor: pointer;" onclick="mostrarFechas()">Todos los diagnósticos</a><!--la función mostrarFechas() se encuentra al final de este documento-->
                            <a class="nuevoPaciente" href="diagnostico_2.php?cedulaPaciente=<?php echo $Paciente;?>">Nuevo diagnóstico</a>
                            <a class="nuevoPaciente" href="">Imprimir registro médico</a>
                            <!--<a class="nuevoPaciente" href="#bajarAntecedentesPersonalesPatológicos ">Antecedentes Personales Patológicos</a>
                            <a class="nuevoPaciente" href="#bajarHabitosPsicobiologicos ">Habitos Psicobiológicos</a>-->
                            <!--<a class="nuevoPaciente" href="#bajarHastaAntecedentes">Antecedentes clinicos</a>-->
                    </div>
                    </div>
                    </div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

                    <!--Menu del paciente, inicialmente esta oculto, solo es visible en diseño responsive-->
                    <div  class="fixed_1">
                        <nav class="menuResponsive_2" id="MenuResponsive_2" >
                            <ul>
                                <li><a class="nuevoPaciente" href="HistoriasClinicas.php?cedula_pacient=<?php echo $Paciente?>">Datos de paciente</a></li>
                            
                            <?php
                             if($FechaUltimoDiagnostico <= $fechaDiagnostico){

                            ?>
                                    <!--Si en pantalla se muestra el ultimo diagostico el enlace no se ejecuta.-->
                                        <a class="nuevoPaciente" href="">Ultimo diagnóstico</a>
                                        <?php
                                    }
                                    else{//Si en pantalla se muestra un diagostico que no es el ultimo el enlace se ejecuta.
                                        ?>
                                        <a  class="nuevoPaciente" href="diagnostico.php?fecha=<?php echo $FechaUltimoDiagnostico;?>">Ultimo diagnóstico</a>
                                        <?php
                                    }?>
                            <a class="nuevoPaciente" style="cursor: pointer;" onclick="mostrarFechas()">Todos los diagnósticos</a><!--la función mostrarFechas() se encuentra al final de este documento--> 
                            <a class="nuevoPaciente_2" href="Promo.php">Anamnesis</a>
                            <a class="nuevoPaciente_2" href="Promo.php">Valores semiologicos</a>
                            <a class="nuevoPaciente_2" href="Promo.php">Valores paraclinicos</a>
                            <a class="nuevoPaciente"  style="cursor: pointer;" onclick="agendarCita()">Agendar próxima cita</a><!--La función agendarCita() se encuentra al final del documento-->                    
                            <!--<a class="nuevoPaciente" href="">Imprimir registro médico</a>-->
                            </ul>         
                        </nav>
                    </div>


<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- Aqui comienza el formulario de datos del paciente -->

                    <div onclick="ocultarAntecedentesPaciente()" class="historia_3">               
                        <fieldset class="historia_2">
                            <legend>Antecedentes clinicos</legend>                                    
                                <?php           
                                //echo "La fecha del diagnostico es= " . $fechaDiagnostico  . "<br>";
                                //Se consultan los diagnosticos del paciente y se muestra el diagnostico segun la fecha recibida, el doctor y el paciente
                                $Consulta= "SELECT * FROM diagnostico WHERE fecha= '$fechaDiagnostico' AND ID_Doctor ='$sesion' AND Cedula_Paciente ='$Paciente' ORDER BY ID_D  DESC";
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
                                            <textarea class="diagnostico_1" id="Posologia" rows="3" readonly="readonly"><?php echo $Valor["posologia"]; ?></textarea>  
                                                    
                                            <hr style="background-color: #040652; height: 3px; width: 95%">
                                                <?php 
                                        }  
                                    }
                                    else{
                                        echo "No se encontraron diagnoticos para el paciente";
                                    }
                                            ?>
                            </fieldset>  
                        </div>    
                    </section>
                </div>
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
