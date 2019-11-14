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

    $Paciente= $_GET["cedulaPaciente"];//Se recibe la cedula desde HistoriasClinicas.php
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
        <link rel="stylesheet" type="text/css" href="../css/iconoFlecha/flecha.css"/><!--galeria de icomoon.io--> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/validar_Campos.js"></script> 
        <script src="../Javascript/Funciones_varias.js"></script>    
    </head>	    
    <body>  
        <div class="Principal">             
            <header class="fixed_1">
                <?php
                    include("../header/headerDoctor.php");
                ?>
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
                   
            <div><!--en este contenedor se hace click y se oculta el menu responsive-->   

            <section style="margin-top: 10%;">              
                <div class="historia_1" id="Historia_1">
                    <div>
                        <fieldset style="border-radius: 15px; padding: 2%">
                            <legend>Paciente</legend>
                            <label class="etiqueta_19">Nombre</label>
                            <input  style="margin-bottom: 1.5%;" type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $Pacient['nombre_pacient'];?>" > 
                            <br>
                            <label class="etiqueta_19">Apellido</label>
                            <input  style="margin-bottom: 1.5%;" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $Pacient['apellido_pacient'];?>" >
                            <br>
                            <label class="etiqueta_19">Cedula</label>
                            <input  style="margin-bottom: 1.5%;"  type="text" name="cedula_Paciente" readonly value="<?php echo $Pacient['cedula_pacient'];?>">
                            <br>
                            <label class="etiqueta_19">Fecha</label>
                            <input  style="margin-bottom: 1.5%;"  type="text" name="fecha_consulta" readonly value="<?php echo $fechaFormatoPHP;?>">
                            <br>
                            <label class="etiqueta_19">Hora</label>
                            <input style="margin-bottom: 1.5%;"  type="text" name="" readonly value="<?php echo $Hora;?>">
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
                                            $Enviar_2= "HistoriasClinicas.php?cedula_pacient=$Paciente";
                                            $Enviar_3= "diagnostico.php?fecha=$FechaUltimoDiagnostico";
                                            $Enviar_4= "actualizarDatos.php?cedulaPaciente=$Paciente";
                                            $Enviar_5= "diagnostico_2.php?cedulaPaciente=$Paciente"; 
                                            $Enviar_6= "../Graficos/grafico_Hb.php?cedulaPaciente=$Paciente";                                         
                                        }
                                        else if($Plan == "Esp"){
                                            $Enviar_2 ="";
                                        }
                                ?>

                                <a style=" width: 40%; display: table-cell; width: 40%; vertical-align: middle; font-size: 13px; color: ;text-align: center;" href="<?php echo $Enviar_2;?>">Datos de paciente</a>

                                <a style=" margin-right: 0%; display: table-cell; width: 40%; vertical-align: middle; font-size: 13px; text-align: center;" href="<?php echo $Enviar_2;?>">Anamnesis</a>                                    
                            </div>
                            <div style="background-color:; margin-top: 3%; border-top-style: solid; border-top-width: 0.5px; border-color:rgba(4,6,82,0.4);  display:table;">

                                <a style="background-color:; color:#FE0202; margin-right: 0%; width: 30%;  font-size: 13px; text-align: center; display: table-cell; vertical-align: middle;" href="<?php echo $Enviar_2;?>">Valores semiologicos</a>

                                <a style="font-size: 13px; width: 24%; margin-right: 0%; text-align: center; display: table-cell; vertical-align: middle;" href="<?php echo $Enviar_6;?>">Valores paraclinicos</a>
                            </div>
                        </fieldset>                
                    </div>

                    <div style="background-color:; margin-top: 10%; "> 
                        <a class="nuevoPaciente" href="<?php echo $Enviar_3;?>">Ultimo diagnóstico</a>
                        <?php 
                        if($Plan == "Ini"){ ?>
                            <a class="nuevoPaciente NoAplica" href="Promo.php" style="cursor: pointer;">Todos los diagnósticos</a>  <?php
                        }
                        else{ ?>
                            <a class="nuevoPaciente" style="cursor: pointer;" onclick="mostrarFechas()">Todos los diagnósticos</a><!--la función mostrarFechas() se encuentra al final de este documento-->  <?php
                        } ?>
                        
                        <a class="nuevoPaciente NoAplica" href="<?php echo $Enviar_5;?>">Nuevo diagnóstico</a>
                        <a class="nuevoPaciente NoAplica" href="">Imprimir registro médico</a>
                        <a class="nuevoPaciente" href="<?php echo $Enviar_4?>">Actualizar datos</a>                                    
                        <a class="nuevoPaciente"  style="cursor: pointer;" onclick="agendarCita()">Agendar próxima cita</a><!--La función agendarCita() se encuentra al final del documento--> 

                        <script src="../Javascript/menu_2.js"></script><!--si se coloca en el head no funciona.-->
                    </div>
                </div>

                <!--solo es visible en formatos para telefonos y tablets-->
                    <div  class="fixed_1" style="z-index: 2">
                        <div class="menuResponsive_2" id="MenuResponsive_2">
                            <a class="nuevoPaciente"  href="<?php echo $Enviar_2;?>">Datos de paciente</a>
                            <a class="nuevoPaciente NoAplica" href="<?php echo $Enviar_3;?>">Ultimo diagnóstico</a>
                            <?php 
                            if($Plan == "Ini"){ ?>
                                <a class="nuevoPaciente NoAplica" href="Promo.php" style="cursor: pointer;">Todos los diagnósticos</a>
                                <a class="nuevoPaciente NoContemplado" href="Promo.php">Nuevo diagnóstico</a>  <?php
                            }
                            else{ ?>
                                <a class="nuevoPaciente" style="cursor: pointer;" onclick="mostrarFechas()">Todos los diagnósticos</a><!--la función mostrarFechas() se encuentra al final de este documento-->
                                <a class="nuevoPaciente NoContemplado" href="N_C.php">Nuevo diagnóstico</a>  <?php
                            } ?>
                            
                            <a class="nuevoPaciente" href="<?php echo $Enviar_2;?>">Anamnesis</a>
                            <a class="nuevoPaciente_2" " href="<?php echo $Enviar_2;?>">Valores semiologicos</a>
                            <a class="nuevoPaciente_2" href="<?php echo $Enviar_2;?>">Valores paraclinicos</a>
                            <a class="nuevoPaciente"  style="cursor: pointer;" onclick="agendarCita()">Agendar próxima cita</a><!--La función agendarCita() se encuentra al final del documento-->                     
                            <!--<a class="nuevoPaciente" href="" onclick="setInterval(imprimir,200);">Imprimir registro médico</a><La función agendarCita() se encuentra al final del documento-->                         
                        </div>
                    </div>

                <?php
                    //Se busca antecedentes clinicos en anamnesis.
                    $Consulta_7 ="SELECT * FROM anamnesis WHERE Cedula_Paciente ='$Paciente'";
                    $Recordset_7=mysqli_query($conexion,$Consulta_7); 
                    $Anamnesis= mysqli_fetch_array($Recordset_7);
                ?>

                <div onclick="ocultarAntecedentesPaciente()" class="historia_3">
                        <fieldset class="historia_2">
                            <legend>Antecedentes personales</legend>    
                            <label class="Anamnesis_5">Sistema nervioso:</label> 
                            <div class="Anamnesis_2">                     
                                <div class="Anamnesis_3">             
                                    <label>Dolor de cabeza</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Dolor_cabeza"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Dolor_cabeza"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Dolor_cabeza"];?></textarea>  <?php
                                        }  ?>    
                                </div>  
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Convulsiones</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Convulsiones"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Convulsiones"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Convulsiones"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3"> 
                                    <label>Mareos</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Mareos"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Mareos"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Mareos"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">   
                                    <label>Parálisis</label> 
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Paralisis"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Paralisis"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Paralisis"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Trastornos mentales</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Trastornos_mentales"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Trastornos_mentales"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Trastornos_mentales"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->  
                            <br/>  
                            <label class="Anamnesis_5">Sistema hemolinfático:</label>
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Anemia</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Anemia"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Anemia"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Anemia"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Desórdenes sanguíneos</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Desordenes_sanguineos"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Desordenes_sanguineos"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Desordenes_sanguineos"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Problemas de coagulación</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Problemas_coagulacion"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Problemas_coagulacion"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Problemas_coagulacion"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->   
                            <br/>                     
                            <label class="Anamnesis_5">Aparato digestivo:</label>    
                            <div class="Anamnesis_2">              
                                <div class="Anamnesis_3">             
                                    <label>Ulcera</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Ulcera"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Ulcera"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Ulcera"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Gastritis</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Gastritis"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Gastritis"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Gastritis"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Cirrosis</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Cirrosis"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Cirrosis"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Cirrosis"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Diverticulos</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Diverticulos"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Diverticulos"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Diverticulos"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Colitis</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Colitis"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Colitis"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Colitis"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Hemorroides</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Hemorroides"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Hemorroides"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Hemorroides"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <br>   
                            <label class="Anamnesis_5">Órganos de los sentidos:</label>
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Cataratas</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Cataratas"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Cataratas"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Cataratas"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Terigios</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Terigios"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Terigios"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Terigios"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Visión corta</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Vision_corta"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Vision_corta"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Vision_corta"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Otitis</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Otitis"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Otitis"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Otitis"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Desviación del tabique</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Desviación_tabique"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Desviación_tabique"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Desviación_tabique"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Sinusitis</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Sinusitis"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Sinusitis"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Sinusitis"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Amigdalitis</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Amigdalitis"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Amigdalitis"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Amigdalitis"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <br>
                            <label class="Anamnesis_5">Endocrino - metabólico:</label> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Diabetes</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Diabetes"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Diabetes"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Diabetes"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Tiroides</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Enfermedades_tiroides"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Enfermedades_tiroides"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Enfermedades_tiroides"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Alteraciones de las grasas</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Alteraciones_grasas"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Alteraciones_grasas"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Alteraciones_grasas"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Ácidos úrico sanguíneo</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Acido_urico"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Acido_urico"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Acido_urico"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <br>
                            <label class="Anamnesis_5">Inmunológicos:</label>  
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Lupus</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Lupus"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Lupus"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Lupus"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Artritis reumatoidea</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Artritis_reumatoidea"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Artritis_reumatoidea"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Artritis_reumatoidea"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <br>
                            <label class="Anamnesis_5">Glándulas mamarias:</label>  
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Dolores</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Mamas_Dolores"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Mamas_Dolores"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Mamas_Dolores"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Masas</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Mamas_Masas"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Mamas_Masas"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Mamas_Masas"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Secreciones</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Mamas_Secreciones"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Mamas_Secreciones"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Mamas_Secreciones"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <br>
                            <label class="Anamnesis_5">Cardiovasculares:</label>
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Hipertensión</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Hipertension"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Hipertension"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Hipertension"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Infartos</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Infartos"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Infartos"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Infartos"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Anginas</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Anginas"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Anginas"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Anginas"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Soplos</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Soplos"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Soplos"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Soplos"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Arritmias</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Arritmias"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Arritmias"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Arritmias"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2"> 
                                <div class="Anamnesis_3">             
                                    <label>Enfermedad coronaria</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Enfermedad_coronaria"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Enfermedad_coronaria"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Enfermedad_coronaria"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <br/>
                            <label class="Anamnesis_5">Respiratorios:</label> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Asma</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Asma"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Asma"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Asma"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Enfisema</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Enfisema"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Enfisema"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Enfisema"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Afección laríngea</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Afeccion_laringea"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Afeccion_laringea"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Afeccion_laringea"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Afección en bronquios</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Afeccion_bronquios"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Afeccion_bronquios"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Afeccion_bronquios"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <br>
                            <label class="Anamnesis_5">Urinarias:</label>  
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Insuficiencia renal</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Insuficiencia_renal"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Insuficiencia_renal"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Insuficiencia_renal"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Cálculos</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Calculos"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Calculos"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Calculos"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Orina con sangre</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Orina_sangre"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Orina_sangre"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Orina_sangre"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Infecciones frecuentes</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Infecciones_frecuentes"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Infecciones_frecuentes"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Infecciones_frecuentes"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <?php   
                                //Se verifica el sexo del paciente para omitir algunos padecimintos
                                $Consulta_7 ="SELECT * FROM anamnesis WHERE Cedula_Paciente ='$Paciente'";
                                $Recordset_7=mysqli_query($conexion,$Consulta_7); 
                                $Anamnesis= mysqli_fetch_array($Recordset_7);
                            ?>
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Próstata enferma</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Prostata_enferma"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Prostata_enferma"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Prostata_enferma"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->  
                            <br>
                            <label class="Anamnesis_5">Osteoarticulares:</label>
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Enfermedad en columna</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Enfermedad_columna"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Enfermedad_columna"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Enfermedad_columna"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Dolor de rodilla</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Dolor_rodilla"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Dolor_rodilla"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Dolor_rodilla"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Deformidades</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Deformidades"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Deformidades"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Deformidades"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <br>
                            <label class="Anamnesis_5">Infecciosos:</label>
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Hepatitis</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Hepatitis"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Hepatitis"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Hepatitis"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2"> 
                                <div class="Anamnesis_3">             
                                    <label>Tuberculosis</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Tuberculosis"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Tuberculosis"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Tuberculosis"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>HIV (+)</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["HIV_positivo"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["HIV_positivo"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_HIV_positivo"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label style="width: 100%;">ETS</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["ETS"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["ETS"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_ETS"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <br> 
                            <label class="Anamnesis_5">Ginecológicos:</label>  
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Tumor o masa en ovarios</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Tumores_ovarios"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Tumores_ovarios"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Tumores_ovarios"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2"> 
                                <div class="Anamnesis_3">             
                                    <label>Tumor o masa en útero</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Tumores_utero"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Tumores_utero"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Tumores_utero"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2"> 
                                <div class="Anamnesis_3">             
                                    <label>Menstruación anormal</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Menstruación_anormal"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Menstruación_anormal"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Menstruación_anormal"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label style="width: 100%;">Citologías vaginales patológicas</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Citologia_vaginales_patologicas"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Citologia_vaginales_patologicas"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Citologia_vaginales_patologicas"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label style="width: 100%;">Citologías vaginales anormales</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Citologias_vaginales_anormales"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Citologias_vaginales_anormales"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Citologias_vaginales_anormales"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <br>
                            <label class="Anamnesis_5">Otros antecedentes:</label> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Cáncer</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Cancer"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Cancer"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Cancer"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Tumores</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Tumores"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Tumores"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Tumores"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Radioterapia</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Radioterapia"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Radioterapia"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Radioterapia"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Quimioterapia</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Quimioterapia"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Quimioterapia"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Quimioterapia"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Actualmente embarazada</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Actualmente_embarazada"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Actualmente_embarazada"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Actualmente_embarazada"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Actualmente lactando</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Actualmente_lactando"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Actualmente_lactando"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Actualmente_lactando"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Reacciones alérgicas</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Reacciones_alergicas"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Reacciones_alergicas"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Reacciones_alergicas"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Infecciones de la piel</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Infecciones_piel"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Infecciones_piel"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Infecciones_piel"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Tratamiento con medicación</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Tratamiento_medicacion"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Tratamiento_medicacion"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Tratamiento_medicacion"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Cirugías</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Cirugias"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Cirugias"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Cirugias"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Traumas</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Traumas"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Traumas"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Traumas"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                        </fieldset>









                        <fieldset class="historia_2">
                            <legend>Antecedentes familiares</legend>
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Ceguera</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Ceguera_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Ceguera_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Ceguera_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Catarata</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Catarata_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Catarata_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Catarata_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Estrabismo</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Estrabismo_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Estrabismo_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Estrabismo_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Glaucoma</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Glaucoma_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Glaucoma_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Glaucoma_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Degeneración de la macula</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Degeneracion_macula_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Degeneracion_macula_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Degeneracion_macula_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Degeneración de retina</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Degeneracion_retina_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Degeneracion_retina_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Degeneracion_retina_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Desprendimiento de retina</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Desprendimiento_retina_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Desprendimiento_retina_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Desprendimiento_retina_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Artritis</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Artritis_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Artritis_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Artritis_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Cancer</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Cancer_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Cancer_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Cancer_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2"> 
                                <div class="Anamnesis_3">             
                                    <label>Diabetes</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Diabetes_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Diabetes_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Diabetes_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Enfermedad del corazon</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Enfermedad_corazon_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Enfermedad_corazon_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Enfermedad_corazon_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Presión alta</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Presión_alta_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Presión_alta_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Presión_alta_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Enfermedad de los riñones</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Enfermedad_riñones_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Enfermedad_riñones_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Enfermedad_riñones_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Lupus</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Lupus_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Lupus_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Lupus_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->  
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Desorden de la tiroides</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Desorden_tiroides_fam"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Desorden_tiroides_fam"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Desorden_tiroides_fam"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                        </fieldset>









                        <fieldset class="historia_2">
                            <legend>Habitos Psicobiológicos</legend>
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Café</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Cafe"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Cafe"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Cafe"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Tabaco</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Tabaco"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Tabaco"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Tabaco"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Chimo</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Chimo"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Chimo"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Chimo"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Alcohol</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Alcohol"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Alcohol"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Alcohol"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Drogas</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Drogas"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Drogas"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Drogas"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Actividad sexual</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Actividad_sexual"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Actividad_sexual"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Actividad_sexual"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Sueño</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Sueño"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Sueño"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Sueño"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Recreacionales</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Recreacionales"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Recreacionales"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Recreacionales"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_2">
                                <div class="Anamnesis_3">             
                                    <label>Alimentarios</label>
                                </div>
                                <div class="">
                                    <?php
                                        if($Anamnesis["Alimentarios"] == "N"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No">  <?php
                                        }
                                        else if($Anamnesis["Alimentarios"] == "X"){  ?>
                                            <input class="Anamnesis_4" readonly="readonly" type="text" value="No sabe">  <?php
                                        }
                                        else{  ?>     
                                            <textarea class="Anamnesis_6"><?php echo $Anamnesis["Obs_Alimentarios"];?></textarea>  <?php
                                        }  ?>    
                                </div> 
                            </div> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                        </fieldset>
                    </form> 
                </div> 
            </section>         
  </div>       
    </body>
</html>



