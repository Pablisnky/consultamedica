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
                <div style="background-color: rgba(244, 248, 6, 0.7); width: 31%; margin-left: 0%; text-align: center;">  
                    <p style="margin-top:0.5%;  background-color: ; font-weight: bolder;  border-bottom-style: solid; border-bottom-color: #040652; border-bottom-width: 2px; padding-bottom: 0.5%; margin-right: 5%; height: 40%; display: inline-block;"><a style="cursor: default;">Ingrese datos</a></p> 
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
                            <a class="nuevoPaciente" href="">Datos de paciente</a>
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
                            
                            <a class="nuevoPaciente_2" href="<?php echo $Enviar_2;?>">Anamnesis</a>
                            <a class="nuevoPaciente_2" " href="<?php echo $Enviar_2;?>">Valores semiologicos</a>
                            <a class="nuevoPaciente_2" href="<?php echo $Enviar_2;?>">Valores paraclinicos</a>
                            <a class="nuevoPaciente"  style="cursor: pointer;" onclick="agendarCita()">Agendar próxima cita</a><!--La función agendarCita() se encuentra al final del documento-->                     
                            <!--<a class="nuevoPaciente" href="" onclick="setInterval(imprimir,200);">Imprimir registro médico</a><La función agendarCita() se encuentra al final del documento-->                         
                        </div>
                    </div>


                <div onclick="ocultarAntecedentesPaciente()" class="historia_3">
                    <form action="recibeAnamnesis.php" method="POST" name="formDoc" class="Afiliacion_0" style="background-color: ; margin-top: 2%;">
                        <fieldset class="historia_2">
                            <legend>Antecedentes médicos personales</legend>                        
                            <label><b>Sistema nervioso:</b></label>  
                            <br>
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label >Dolor de cabeza</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="DolorCabeza_1" class="perfil_1"><input type="radio" id="DolorCabeza_1" name="dolorCabeza" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_DolorCabeza');">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="DolorCabeza_2" class="perfil_1"><input type="radio" id="DolorCabeza_2" name="dolorCabeza" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_DolorCabeza')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="DolorCabeza_3" class="perfil_1"><input type="radio" id="DolorCabeza_3" name="dolorCabeza" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;"  onclick="No_Obser_Antecedentes('Obser_DolorCabeza')">No sabe</label>
                                </div>
                            </div>
                            <div style="display: none;" id="Obser_DolorCabeza">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Convulsiones</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Convulsiones_1" class="perfil_1"><input type="radio" id="Convulsiones_1" name="convulsiones" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Convulsiones')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Convulsiones_2" class="perfil_1"><input type="radio" id="Convulsiones_2" name="convulsiones" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Convulsiones')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Convulsiones_3" class="perfil_1"><input type="radio" id="Convulsiones_3" name="convulsiones" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Convulsiones')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Convulsiones">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; "> 
                                    <label>Mareos</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Mareos_1" class="perfil_1"><input type="radio" id="Mareos_1" name="mareos" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Mareos')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Mareos_2" class="perfil_1"><input type="radio" id="Mareos_2" name="mareos" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Mareos')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Mareos_3" class="perfil_1"><input type="radio" id="Mareos_3" name="mareos" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Mareos')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Mareos">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">   
                                    <label>Parálisis</label> 
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Paralisis_1" class="perfil_1"><input type="radio" id="Paralisis_1" name="paralisis" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Paralisis')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Paralisis_2" class="perfil_1"><input type="radio" id="Paralisis_2" name="paralisis" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Paralisis')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Paralisis_3" class="perfil_1"><input type="radio" id="Paralisis_3" name="paralisis" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Paralisis')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Paralisis">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Trastornos mentales</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Trastornos_Mentales_1" class="perfil_1"><input type="radio" id="Trastornos_Mentales_1" name="trastornos_Mentales" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"  onclick="Si_Obser_Antecedentes('Obser_TrastornosMentales')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Trastornos_Mentales_2" class="perfil_1"><input type="radio" id="Trastornos_Mentales_2" name="trastornos_Mentales" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_TrastornosMentales')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Trastornos_Mentales_3" class="perfil_1"><input type="radio" id="Trastornos_Mentales_3" name="trastornos_Mentales" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_TrastornosMentales')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_TrastornosMentales">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <br/>      
                            <label><b>Sistema hemolinfático:</b></label>
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Anemia</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Hemolinfático_1" class="perfil_1"><input type="radio" id="Hemolinfático_1" name="hemolinfático" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Anemia')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Hemolinfático_2" class="perfil_1"><input type="radio" id="Hemolinfático_2" name="hemolinfático" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Anemia')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Hemolinfático_3" class="perfil_1"><input type="radio" id="Hemolinfático_3" name="hemolinfático" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Anemia')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Anemia">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Desórdenes sanguíneos</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Sanguineos_1" class="perfil_1"><input type="radio" id="Sanguineos_1" name="sanguineos" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_DesordenesSanguineos')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sanguineos_2" class="perfil_1"><input type="radio" id="Sanguineos_2" name="sanguineos" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"  onclick="No_Obser_Antecedentes('Obser_DesordenesSanguineos')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sanguineos_3" class="perfil_1"><input type="radio" id="Sanguineos_3" name="sanguineos" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_DesordenesSanguineos')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_DesordenesSanguineos">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell;">             
                                    <label>Problemas de coagulación</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell;">
                                    <label for="Coagulación_1" class="perfil_1"><input type="radio" id="Coagulación_1" name="coagulación_1" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_ProblemasCoagulacion')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Coagulación_2" class="perfil_1"><input type="radio" id="Coagulación_2" name="coagulación_1" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"  onclick="No_Obser_Antecedentes('Obser_ProblemasCoagulacion')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Coagulación_3" class="perfil_1"><input type="radio" id="Coagulación_3" name="coagulación_1" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ProblemasCoagulacion')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_ProblemasCoagulacion">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->     
                            <br/>                        
                            <label><b>Aparato digestivo:</b></label>               
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Ulcera</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Ulcera_1" class="perfil_1"><input type="radio" id="Ulcera_1" name="ulcera" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Ulcera')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Ulcera_2" class="perfil_1"><input type="radio" id="Ulcera_2" name="ulcera" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Ulcera')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Ulcera_3" class="perfil_1"><input type="radio" id="Ulcera_3" name="ulcera" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Ulcera')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Ulcera">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Gastritis</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Gastritis_1" class="perfil_1"><input type="radio" id="Gastritis_1" name="gastritis" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Gastritis')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Gastritis_2" class="perfil_1"><input type="radio" id="Gastritis_2" name="gastritis" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Gastritis')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Gastritis_3" class="perfil_1"><input type="radio" id="Gastritis_3" name="gastritis" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Gastritis')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Gastritis">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Cirrosis</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell;">
                                    <label for="Cirrosis_1" class="perfil_1"><input type="radio" id="Cirrosis_1" name="cirrosis" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Cirrosis')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cirrosis_2" class="perfil_1"><input type="radio" id="Cirrosis_2" name="cirrosis" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cirrosis')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cirrosis_3" class="perfil_1"><input type="radio" id="Cirrosis_3" name="cirrosis" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cirrosis')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Cirrosis">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Diverticulos</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Diverticulos_1" class="perfil_1"><input type="radio" id="Diverticulos_1" name="diverticulos" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Diverticulos')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Diverticulos_2" class="perfil_1"><input type="radio" id="Diverticulos_2" name="diverticulos" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Diverticulos')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Diverticulos_3" class="perfil_1"><input type="radio" id="Diverticulos_3" name="diverticulos" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Diverticulos')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Diverticulos">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Colitis</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Colitis_1" class="perfil_1"><input type="radio" id="Colitis_1" name="colitis" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Colitis')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Colitis_2" class="perfil_1"><input type="radio" id="Colitis_2" name="colitis" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Colitis')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Colitis_3" class="perfil_1"><input type="radio" id="Colitis_3" name="colitis" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Colitis')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Colitis">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Hemorroides</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Hemorroides_1" class="perfil_1"><input type="radio" id="Hemorroides_1" name="hemorroides" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Hemorroides')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Hemorroides_2" class="perfil_1"><input type="radio" id="Hemorroides_2" name="hemorroides" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"  " onclick="No_Obser_Antecedentes('Obser_Hemorroides')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Hemorroides_3" class="perfil_1"><input type="radio" id="Hemorroides_3" name="hemorroides" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Hemorroides')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Hemorroides">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <br>   
                            <label><b>Órganos de los sentidos:</b></label>  
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Cataratas</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Cataratas_1" class="perfil_1"><input type="radio" id="Cataratas_1" name="cataratas" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Cataratas')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cataratas_2" class="perfil_1"><input type="radio" id="Cataratas_2" name="cataratas" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cataratas')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cataratas_3" class="perfil_1"><input type="radio" id="Cataratas_3" name="cataratas" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cataratas')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Cataratas">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Terigios</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Terigios_1" class="perfil_1"><input type="radio" id="Terigios_1" name="terigios" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Terigios')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Terigios_2" class="perfil_1"><input type="radio" id="Terigios_2" name="terigios" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Terigios')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Terigios_3" class="perfil_1"><input type="radio" id="Terigios_3" name="terigios" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Terigios')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Terigios">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Visión corta</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Vision_1" class="perfil_1"><input type="radio" id="Vision_1" name="vision" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_VisiónCorta')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Vision_2" class="perfil_1"><input type="radio" id="Vision_2" name="vision" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_VisiónCorta')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Vision_3" class="perfil_1"><input type="radio" id="Vision_3" name="vision" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_VisiónCorta')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_VisiónCorta">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Otitis</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Otitis_1" class="perfil_1"><input type="radio" id="Otitis_1" name="otitis" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Otitis')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Otitis_2" class="perfil_1"><input type="radio" id="Otitis_2" name="otitis" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Otitis')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Otitis_3" class="perfil_1"><input type="radio" id="Otitis_3" name="otitis" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Otitis')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Otitis">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Desviación del tabique</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Tabique_1" class="perfil_1"><input type="radio" id="Tabique_1" name="tabique" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_DesviaciónTabique')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Tabique_2" class="perfil_1"><input type="radio" id="Tabique_2" name="tabique" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_DesviaciónTabique')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Tabique_3" class="perfil_1"><input type="radio" id="Tabique_3" name="tabique" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_DesviaciónTabique')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_DesviaciónTabique">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Sinusitis</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Sinusitis_1" class="perfil_1"><input type="radio" id="Sinusitis_1" name="sinusitis" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Sinusitis')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sinusitis_2" class="perfil_1"><input type="radio" id="Sinusitis_2" name="sinusitis" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Sinusitis')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sinusitis_3" class="perfil_1"><input type="radio" id="Sinusitis_3" name="sinusitis" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Sinusitis')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Sinusitis">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Amigdalitis</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Amigdalitis_1" class="perfil_1"><input type="radio" id="Amigdalitis_1" name="amigdalitis" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Amigdalitis')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Amigdalitis_2" class="perfil_1"><input type="radio" id="Amigdalitis_2" name="amigdalitis" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Amigdalitis')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Amigdalitis_3" class="perfil_1"><input type="radio" id="Amigdalitis_3" name="amigdalitis" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Amigdalitis')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Amigdalitis">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <br>
                            <label><b>Endocrino -  metabólico:</b></label> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell;">             
                                    <label>Diabetes</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell;">
                                    <label for="Diabetes_1" class="perfil_1"><input type="radio" id="Diabetes_1" name="diabetes" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Diabetes')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Diabetes_2" class="perfil_1"><input type="radio" id="Diabetes_2" name="diabetes" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Diabetes')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Diabetes_3" class="perfil_1"><input type="radio" id="Diabetes_3" name="diabetes" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Diabetes')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Diabetes">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Enfermedades de la tiroides</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Tiroides_1" class="perfil_1"><input type="radio" id="Tiroides_1" name="tiroides" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_EnfermedadTiroides')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Tiroides_2" class="perfil_1"><input type="radio" id="Tiroides_2" name="tiroides" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_EnfermedadTiroides')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Tiroides_3" class="perfil_1"><input type="radio" id="Tiroides_3" name="tiroides" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_EnfermedadTiroides')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_EnfermedadTiroides">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Alteraciones de las grasas</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Grasas_1" class="perfil_1"><input type="radio" id="Grasas_1" name="grasas" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_AlteracionesGrasas')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Grasas_2" class="perfil_1"><input type="radio" id="Grasas_2" name="grasas" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_AlteracionesGrasas')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Grasas_3" class="perfil_1"><input type="radio" id="Grasas_3" name="grasas" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_AlteracionesGrasas')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_AlteracionesGrasas">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->  
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Ácidos úrico sanguíneo</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Urico_1" class="perfil_1"><input type="radio" id="Urico_1" name="urico" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_AcidosUrico')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Urico_2" class="perfil_1"><input type="radio" id="Urico_2" name="urico" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_AcidosUrico')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Urico_3" class="perfil_1"><input type="radio" id="Urico_3" name="urico" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_AcidosUrico')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_AcidosUrico">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <br>
                            <label><b>Inmunológicos:</b></label>  
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Lupus</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Lupus_1" class="perfil_1"><input type="radio" id="Lupus_1" name="lupus" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Lupus')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Lupus_2" class="perfil_1"><input type="radio" id="Lupus_2" name="lupus" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Lupus')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Lupus_3" class="perfil_1"><input type="radio" id="Lupus_3" name="lupus" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Lupus')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Lupus">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Artritis reumatoidea</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Artritis_1" class="perfil_1"><input type="radio" id="Artritis_1" name="artritis" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_ArtritisReumatoidea')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Artritis_2" class="perfil_1"><input type="radio" id="Artritis_2" name="artritis" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ArtritisReumatoidea')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Artritis_3" class="perfil_1"><input type="radio" id="Artritis_3" name="artritis" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ArtritisReumatoidea')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_ArtritisReumatoidea">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <br>
                            <label><b>Glándulas mamarias:</b></label>  
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Dolores</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Mamarias_1" class="perfil_1"><input type="radio" id="Mamarias_1" name="mamarias" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_GlandulasMamarias')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Mamarias_2" class="perfil_1"><input type="radio" id="Mamarias_2" name="mamarias" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_GlandulasMamarias')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Mamarias_3" class="perfil_1"><input type="radio" id="Mamarias_3" name="mamarias" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_GlandulasMamarias')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_GlandulasMamarias">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Masas</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Masas_1" class="perfil_1"><input type="radio" id="Masas_1" name="masas" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Masas')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Masas_2" class="perfil_1"><input type="radio" id="Masas_2" name="masas" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Masas')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Masas_3" class="perfil_1"><input type="radio" id="Masas_3" name="masas" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Masas')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Masas">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Secreciones</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Secreciones_1" class="perfil_1"><input type="radio" id="Secreciones_1" name="secreciones" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Secreciones')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Secreciones_2" class="perfil_1"><input type="radio" id="Secreciones_2" name="secreciones" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Secreciones')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Secreciones_3" class="perfil_1"><input type="radio" id="Secreciones_3" name="secreciones" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Secreciones')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Secreciones">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->   
                            <br>
                            <label><b>Cardiovasculares:</b></label>
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Hipertensión</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Hipertensión_1" class="perfil_1"><input type="radio" id="Hipertensión_1" name="hipertensión" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Hipertension')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Hipertensión_2" class="perfil_1"><input type="radio" id="Hipertensión_2" name="hipertensión" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Hipertension')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Hipertensión_3" class="perfil_1"><input type="radio" id="Hipertensión_3" name="hipertensión" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Hipertension')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Hipertension">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Infartos</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Infartos_1" class="perfil_1"><input type="radio" id="Infartos_1" name="infartos" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Infartos')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Infartos_2" class="perfil_1"><input type="radio" id="Infartos_2" name="infartos" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Infartos')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Infartos_3" class="perfil_1"><input type="radio" id="Infartos_3" name="infartos" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Infartos')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Infartos">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Anginas</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Anginas_1" class="perfil_1"><input type="radio" id="Anginas_1" name="anginas" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Anginas')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Anginas_2" class="perfil_1"><input type="radio" id="Anginas_2" name="anginas" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Anginas')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Anginas_3" class="perfil_1"><input type="radio" id="Anginas_3" name="anginas" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Anginas')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Anginas">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Soplos</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Soplos_1" class="perfil_1"><input type="radio" id="Soplos_1" name="soplos" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Soplos')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Soplos_2" class="perfil_1"><input type="radio" id="Soplos_2" name="soplos" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Soplos')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Soplos_3" class="perfil_1"><input type="radio" id="Soplos_3" name="soplos" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Soplos')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Soplos">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Arritmias</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Arritmias_1" class="perfil_1"><input type="radio" id="Arritmias_1" name="arritmias" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Arritmias')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Arritmias_2" class="perfil_1"><input type="radio" id="Arritmias_2" name="arritmias" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Arritmias')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Arritmias_3" class="perfil_1"><input type="radio" id="Arritmias_3" name="arritmias" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Arritmias')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Arritmias">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Enfermedad coronaria</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Coronaria_1" class="perfil_1"><input type="radio" id="Coronaria_1" name="coronaria" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_EnfermedadCoronaria')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Coronaria_2" class="perfil_1"><input type="radio" id="Coronaria_2" name="coronaria" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_EnfermedadCoronaria')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Coronaria_3" class="perfil_1"><input type="radio" id="Coronaria_3" name="coronaria" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_EnfermedadCoronaria')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_EnfermedadCoronaria">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <br/>
                            <label><b>Respiratorios:</b></label> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Asma</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Asma_1" class="perfil_1"><input type="radio" id="Asma_1" name="asma" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Asma')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Asma_2" class="perfil_1"><input type="radio" id="Asma_2" name="asma" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Asma')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Asma_3" class="perfil_1"><input type="radio" id="Asma_3" name="asma" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Asma')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Asma">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->  
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Enfisema</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Enfisema_1" class="perfil_1"><input type="radio" id="Enfisema_1" name="enfisema" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Enfisema')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Enfisema_2" class="perfil_1"><input type="radio" id="Enfisema_2" name="enfisema" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Enfisema')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Enfisema_3" class="perfil_1"><input type="radio" id="Enfisema_3" name="enfisema" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Enfisema')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Enfisema">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Afección laríngea</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Laringea_1" class="perfil_1"><input type="radio" id="Laringea_1" name="laringea" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_AfecciónLaringea')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Laringea_2" class="perfil_1"><input type="radio" id="Laringea_2" name="laringea" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_AfecciónLaringea')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Laringea_3" class="perfil_1"><input type="radio" id="Laringea_3" name="laringea" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_AfecciónLaringea')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_AfecciónLaringea">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Afección en bronquios</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Bronquios_1" class="perfil_1"><input type="radio" id="Bronquios_1" name="bronquios" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_AfeccionBronquios')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Bronquios_2" class="perfil_1"><input type="radio" id="Bronquios_2" name="bronquios" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_AfeccionBronquios')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Bronquios_3" class="perfil_1"><input type="radio" id="Bronquios_3" name="bronquios" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_AfeccionBronquios')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_AfeccionBronquios">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <br>
                            <label><b>Urinarias:</b></label>  
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Insuficiencia renal</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Renal_1" class="perfil_1"><input type="radio" id="Renal_1" name="renal" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_InsuficienciaRenal')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Renal_2" class="perfil_1"><input type="radio" id="Renal_2" name="renal" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_InsuficienciaRenal')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Renal_3" class="perfil_1"><input type="radio" id="Renal_3" name="renal" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_InsuficienciaRenal')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_InsuficienciaRenal">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Cálculos</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Calculos_1" class="perfil_1"><input type="radio" id="Calculos_1" name="calculos" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Calculos')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Calculos_2" class="perfil_1"><input type="radio" id="Calculos_2" name="calculos" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Calculos')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Calculos_3" class="perfil_1"><input type="radio" id="Calculos_3" name="calculos" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Calculos')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Calculos">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Orina con sangre</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Sangre_1" class="perfil_1"><input type="radio" id="Sangre_1" name="sangre" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_OrinaSangre')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sangre_2" class="perfil_1"><input type="radio" id="Sangre_2" name="sangre" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_OrinaSangre')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sangre_3" class="perfil_1"><input type="radio" id="Sangre_3" name="sangre" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_OrinaSangre')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_OrinaSangre">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Infecciones frecuentes</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Infecciones_1" class="perfil_1"><input type="radio" id="Infecciones_1" name="infecciones" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_InfeccionesFrecuentes')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Infecciones_2" class="perfil_1"><input type="radio" id="Infecciones_2" name="infecciones" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_InfeccionesFrecuentes')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Infecciones_3" class="perfil_1"><input type="radio" id="Infecciones_3" name="infecciones" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_InfeccionesFrecuentes')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_InfeccionesFrecuentes">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Próstata enferma</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Prostata_1" class="perfil_1"><input type="radio" id="Prostata_1" name="prostata" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_ProstataEnferma')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Prostata_2" class="perfil_1"><input type="radio" id="Prostata_2" name="prostata" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ProstataEnferma')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Prostata_3" class="perfil_1"><input type="radio" id="Prostata_3" name="prostata" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ProstataEnferma')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_ProstataEnferma">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->   
                            <br>
                            <label><b>Osteoarticulares:</b></label>
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Enfermedades de la columna</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Columna_1" class="perfil_1"><input type="radio" id="Columna_1" name="columna" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_EnfermedadColumna')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Columna_2" class="perfil_1"><input type="radio" id="Columna_2" name="columna" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_EnfermedadColumna')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Columna_3" class="perfil_1"><input type="radio" id="Columna_3" name="columna" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_EnfermedadColumna')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_EnfermedadColumna">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Dolor de rodilla</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Rodilla_1" class="perfil_1"><input type="radio" id="Rodilla_1" name="rodilla" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('ObserDolorRodilla_')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Rodilla_2" class="perfil_1"><input type="radio" id="Rodilla_2" name="rodilla" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('ObserDolorRodilla_')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Rodilla_3" class="perfil_1"><input type="radio" id="Rodilla_3" name="rodilla" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('ObserDolorRodilla_')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="ObserDolorRodilla_">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Deformidades</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Deformidades_1" class="perfil_1"><input type="radio" id="Deformidades_1" name="deformidades" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Deformidades')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Deformidades_2" class="perfil_1"><input type="radio" id="Deformidades_2" name="deformidades" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Deformidades')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Deformidades_3" class="perfil_1"><input type="radio" id="Deformidades_3" name="deformidades" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Deformidades')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Deformidades">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->   
                            <br>
                            <label><b>Infecciosos:</b></label>
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Hepatitis</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Hepatitis_1" class="perfil_1"><input type="radio" id="Hepatitis_1" name="hepatitis" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Hepatitis')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Hepatitis_2" class="perfil_1"><input type="radio" id="Hepatitis_2" name="hepatitis" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Hepatitis')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Hepatitis_3" class="perfil_1"><input type="radio" id="Hepatitis_3" name="hepatitis" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Hepatitis')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Hepatitis">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Tuberculosis</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Tuberculosis_1" class="perfil_1"><input type="radio" id="Tuberculosis_1" name="tuberculosis" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Tuberculosis')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Tuberculosis_2" class="perfil_1"><input type="radio" id="Tuberculosis_2" name="tuberculosis" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Tuberculosis')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Tuberculosis_3" class="perfil_1"><input type="radio" id="Tuberculosis_3" name="tuberculosis" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Tuberculosis')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Tuberculosis">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>HIV (+)</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="HIV_1" class="perfil_1"><input type="radio" id="HIV_1" name="hiv" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_HIV')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="HIV_2" class="perfil_1"><input type="radio" id="HIV_2" name="hiv" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_HIV')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="HIV_3" class="perfil_1"><input type="radio" id="HIV_3" name="hiv" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_HIV')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_HIV">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell;">             
                                    <label style="width: 100%;">Enfermedades de transmisión sexual</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Sexual_1" class="perfil_1"><input type="radio" id="Sexual_1" name="sexual" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_ETS')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sexual_2" class="perfil_1"><input type="radio" id="Sexual_2" name="sexual" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ETS')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sexual_3" class="perfil_1"><input type="radio" id="Sexual_3" name="sexual" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ETS')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_ETS">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <br> 
                            <label><b>Ginecológicos:</b></label>  
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Tumores o masas en ovarios</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Ovarios_1" class="perfil_1"><input type="radio" id="Ovarios_1" name="ovarios" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_TumoresOvarios')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Ovarios_2" class="perfil_1"><input type="radio" id="Ovarios_2" name="ovarios" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_TumoresOvarios')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Ovarios_3" class="perfil_1"><input type="radio" id="Ovarios_3" name="ovarios" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_TumoresOvarios')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_TumoresOvarios">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Tumores o masas en útero</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Utero_1" class="perfil_1"><input type="radio" id="Utero_1" name="utero" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_TumoresUtero')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Utero_2" class="perfil_1"><input type="radio" id="Utero_2" name="utero" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_TumoresUtero')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Utero_3" class="perfil_1"><input type="radio" id="Utero_3" name="utero" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_TumoresUtero')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_TumoresUtero">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Menstruación anormal</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Menstruación_1" class="perfil_1"><input type="radio" id="Menstruación_1" name="menstruación" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Menstruación')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Menstruación_2" class="perfil_1"><input type="radio" id="Menstruación_2" name="menstruación" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Menstruación')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Menstruación_3" class="perfil_1"><input type="radio" id="Menstruación_3" name="menstruación" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Menstruación')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Menstruación">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label style="width: 100%;">Citologías vaginales patológicas</label>
                                </div>
                                <div style="background-color:; width:12.5%;  display: table-cell; ">
                                    <label for="Citologias_1" class="perfil_1" ><input type="radio" id="Citologias_1" name="citologias" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_CitologiasPatológicas')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Citologias_2" class="perfil_1"><input type="radio" id="Citologias_2" name="citologias" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_CitologiasPatológicas')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Citologias_3" class="perfil_1"><input type="radio" id="Citologias_3" name="citologias" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_CitologiasPatológicas')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_CitologiasPatológicas">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label style="width: 100%;">Citologías vaginales anormales</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Vaginales_1" class="perfil_1"><input type="radio" id="Vaginales_1" name="vaginales" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_CitologiasAnormales')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Vaginales_2" class="perfil_1"><input type="radio" id="Vaginales_2" name="vaginales" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_CitologiasAnormales')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Vaginales_3" class="perfil_1"><input type="radio" id="Vaginales_3" name="vaginales" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_CitologiasAnormales')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_CitologiasAnormales">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->  
                            <br>
                            <label><b>Otros antecedentes:</b></label> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Cáncer</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Cancer_1" class="perfil_1"><input type="radio" id="Cancer_1" name="cancer" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Cancer')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cancer_2" class="perfil_1"><input type="radio" id="Cancer_2" name="cancer" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cancer')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cancer_3" class="perfil_1"><input type="radio" id="Cancer_3" name="cancer" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cancer')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Cancer">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Tumores</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Tumores_1" class="perfil_1"><input type="radio" id="Tumores_1" name="tumores" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Tumores')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Tumores_2" class="perfil_1"><input type="radio" id="Tumores_2" name="tumores" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Tumores')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Tumores_3" class="perfil_1"><input type="radio" id="Tumores_3" name="tumores" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Tumores')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Tumores">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Radioterapia</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Radioterapia_1" class="perfil_1"><input type="radio" id="Radioterapia_1" name="radioterapia" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Radioterapia')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Radioterapia_2" class="perfil_1"><input type="radio" id="Radioterapia_2" name="radioterapia" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Radioterapia')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Radioterapia_3" class="perfil_1"><input type="radio" id="Radioterapia_3" name="radioterapia" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Radioterapia')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Radioterapia">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Quimioterapia</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Quimioterapia_1" class="perfil_1"><input type="radio" id="Quimioterapia_1" name="quimioterapia" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Quimioterapia')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Quimioterapia_2" class="perfil_1"><input type="radio" id="Quimioterapia_2" name="quimioterapia" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Quimioterapia')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Quimioterapia_3" class="perfil_1"><input type="radio" id="Quimioterapia_3" name="quimioterapia" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Quimioterapia')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Quimioterapia">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Actualmente embarazada</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Embarazada_1" class="perfil_1"><input type="radio" id="Embarazada_1" name="embarazada" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Embarazada')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Embarazada_2" class="perfil_1"><input type="radio" id="Embarazada_2" name="embarazada" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Embarazada')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Embarazada_3" class="perfil_1"><input type="radio" id="Embarazada_3" name="embarazada" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Embarazada')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Embarazada">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Actualmente lactando</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Lactando_1" class="perfil_1"><input type="radio" id="Lactando_1" name="lactando" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Lactando')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Lactando_2" class="perfil_1"><input type="radio" id="Lactando_2" name="lactando" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Lactando')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Lactando_3" class="perfil_1"><input type="radio" id="Lactando_3" name="lactando" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Lactando')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Lactando">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Reacciones alérgicas</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Alergicas_1" class="perfil_1"><input type="radio" id="Alergicas_1" name="alergicas" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_ReaccionesAlergicas')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Alergicas_2" class="perfil_1"><input type="radio" id="Alergicas_2" name="alergicas" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ReaccionesAlergicas')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Alergicas_3" class="perfil_1"><input type="radio" id="Alergicas_3" name="alergicas" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ReaccionesAlergicas')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_ReaccionesAlergicas">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Infecciones de la piel</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Piel_1" class="perfil_1"><input type="radio" id="Piel_1" name="piel" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_InfeccionesPiel')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Piel_2" class="perfil_1"><input type="radio" id="Piel_2" name="piel" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_InfeccionesPiel')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Piel_3" class="perfil_1"><input type="radio" id="Piel_3" name="piel" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_InfeccionesPiel')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_InfeccionesPiel">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Tratamiento con medicación</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Medicación_1" class="perfil_1"><input type="radio" id="Medicación_1" name="medicación" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_TratamientoMedicación')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Medicación_2" class="perfil_1"><input type="radio" id="Medicación_2" name="medicación" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_TratamientoMedicación')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Medicación_3" class="perfil_1"><input type="radio" id="Medicación_3" name="medicación" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_TratamientoMedicación')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_TratamientoMedicación">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Cirugías</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Cirugias_1" class="perfil_1"><input type="radio" id="Cirugias_1" name="cirugias" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Cirugias')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cirugias_2" class="perfil_1"><input type="radio" id="Cirugias_2" name="cirugias" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cirugias')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cirugias_3" class="perfil_1"><input type="radio" id="Cirugias_3" name="cirugias" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cirugias')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Cirugias">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Traumas</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Trauma_1" class="perfil_1"><input type="radio" id="Trauma_1" name="traumas" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Traumas')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Trauma_2" class="perfil_1"><input type="radio" id="Trauma_2" name="traumas" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Traumas')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Trauma_3" class="perfil_1"><input type="radio" id="Trauma_3" name="traumas" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Traumas')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Traumas">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                        </fieldset>



                        <fieldset>
                            <legend>Antecedentes familiares</legend>
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Ceguera</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Ceguera_1" class="perfil_1"><input type="radio" id="Ceguera_1" name="ceguera" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Ceguera')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Ceguera_2" class="perfil_1"><input type="radio" id="Ceguera_2" name="ceguera" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Ceguera')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Ceguera_3" class="perfil_1"><input type="radio" id="Ceguera_3" name="ceguera" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Ceguera')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Ceguera">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Catarata</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Catarata_1" class="perfil_1"><input type="radio" id="Catarata_1" name="catarata" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Catarata')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Catarata_2" class="perfil_1"><input type="radio" id="Catarata_2" name="catarata" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Catarata')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Catarata_3" class="perfil_1"><input type="radio" id="Catarata_3" name="catarata" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Catarata')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Catarata">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Estrabismo</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Estrabismo_1" class="perfil_1"><input type="radio" id="Estrabismo_1" name="estrabismo" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Estrabismo')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Estrabismo_2" class="perfil_1"><input type="radio" id="Estrabismo_2" name="estrabismo" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Estrabismo')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Estrabismo_3" class="perfil_1"><input type="radio" id="Estrabismo_3" name="estrabismo" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Estrabismo')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Estrabismo">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Glaucoma</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Glaucoma_1" class="perfil_1"><input type="radio" id="Glaucoma_1" name="glaucoma" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Glaucoma')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Glaucoma_2" class="perfil_1"><input type="radio" id="Glaucoma_2" name="glaucoma" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Glaucoma')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Glaucoma_3" class="perfil_1"><input type="radio" id="Glaucoma_3" name="glaucoma" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Glaucoma')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Glaucoma">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Degeneración de la macula</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Macula_1" class="perfil_1"><input type="radio" id="Macula_1" name="macula" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_DegeneraciónMacula')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Macula_2" class="perfil_1"><input type="radio" id="Macula_2" name="macula" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_DegeneraciónMacula')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Macula_3" class="perfil_1"><input type="radio" id="Macula_3" name="macula" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_DegeneraciónMacula')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_DegeneraciónMacula">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Degeneración de retina</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Retina_1" class="perfil_1"><input type="radio" id="Retina_1" name="retina" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_DegeneraciónRetina')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Retina_2" class="perfil_1"><input type="radio" id="Retina_2" name="retina" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_DegeneraciónRetina')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Retina_3" class="perfil_1"><input type="radio" id="Retina_3" name="retina" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_DegeneraciónRetina')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_DegeneraciónRetina">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Desprendimiento de retina</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Desprendimiento_1" class="perfil_1"><input type="radio" id="Desprendimiento_1" name="desprendimiento" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_DesprendimientoRetina')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Desprendimiento_2" class="perfil_1"><input type="radio" id="Desprendimiento_2" name="desprendimiento" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_DesprendimientoRetina')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Desprendimiento_3" class="perfil_1"><input type="radio" id="Desprendimiento_3" name="desprendimiento" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_DesprendimientoRetina')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_DesprendimientoRetina">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Artritis</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="ArtritisFamiliar_1" class="perfil_1"><input type="radio" id="ArtritisFamiliar_1" name="artritisFamiliar" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Artritis')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="ArtritisFamiliar_2" class="perfil_1"><input type="radio" id="ArtritisFamiliar_2" name="artritisFamiliar" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Artritis')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="ArtritisFamiliar_3" class="perfil_1"><input type="radio" id="ArtritisFamiliar_3" name="artritisFamiliar" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Artritis')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Artritis">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Cancer</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Cancerigeno_1" class="perfil_1"><input type="radio" id="Cancerigeno_1" name="cancerigeno" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Cancer')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cancerigeno_2" class="perfil_1"><input type="radio" id="Cancerigeno_2" name="cancerigeno" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Cancer')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cancerigeno_3" class="perfil_1"><input type="radio" id="Cancerigeno_3" name="cancerigeno" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cancer')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Cancer">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Diabetes</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="DiabetesFamiliar_1" class="perfil_1"><input type="radio" id="DiabetesFamiliar_1" name="diabetesFamiliar" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Diabetes')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="DiabetesFamiliar_2" class="perfil_1"><input type="radio" id="DiabetesFamiliar_2" name="diabetesFamiliar" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Diabetes')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="DiabetesFamiliar_3" class="perfil_1"><input type="radio" id="DiabetesFamiliar_3" name="diabetesFamiliar" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Diabetes')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Diabetes">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Enfermedad del corazon</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Corazones_1" class="perfil_1"><input type="radio" id="Corazones_1" name="corazones" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_EnfermedadCorazon')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Corazones_2" class="perfil_1"><input type="radio" id="Corazones_2" name="corazones" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_EnfermedadCorazon')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Corazones_3" class="perfil_1"><input type="radio" id="Corazones_3" name="corazones" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_EnfermedadCorazon')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_EnfermedadCorazon">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Presión alta</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="PresiónAlta_1" class="perfil_1"><input type="radio" id="PresiónAlta_1" name="presiónAlta" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_PresiónAlta')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="PresiónAlta_2" class="perfil_1"><input type="radio" id="PresiónAlta_2" name="presiónAlta" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_PresiónAlta')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="PresiónAlta_3" class="perfil_1"><input type="radio" id="PresiónAlta_3" name="presiónAlta" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_PresiónAlta')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_PresiónAlta">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Enfermedad de los riñones</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Riñones_1" class="perfil_1"><input type="radio" id="Riñones_1" name="riñones" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_EnfermedadRiñones')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Riñones_2" class="perfil_1"><input type="radio" id="Riñones_2" name="riñones" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_EnfermedadRiñones')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Riñones_3" class="perfil_1"><input type="radio" id="Riñones_3" name="riñones" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_EnfermedadRiñones')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_EnfermedadRiñones">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Lupus</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="LupusFamiliar_1" class="perfil_1"><input type="radio" id="LupusFamiliar_1" name="lupusFamiliar" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Lupus')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="LupusFamiliar_2" class="perfil_1"><input type="radio" id="LupusFamiliar_2" name="lupusFamiliar" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Lupus')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="LupusFamiliar_3" class="perfil_1"><input type="radio" id="LupusFamiliar_3" name="lupusFamiliar" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Lupus')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Lupus">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->  
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Desorden de la tiroides</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="TiroidesFamiliar_1" class="perfil_1"><input type="radio" id="TiroidesFamiliar_1" name="tiroidesFamiliar" value="Si" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_DesordenTiroides')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="TiroidesFamiliar_2" class="perfil_1"><input type="radio" id="TiroidesFamiliar_2" name="tiroidesFamiliar" value="No" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_DesordenTiroides')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="TiroidesFamiliar_3" class="perfil_1"><input type="radio" id="TiroidesFamiliar_3" name="tiroidesFamiliar" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_DesordenTiroides')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_DesordenTiroides">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                        </fieldset>



                        <fieldset>
                            <legend>Habitos Psicobiológicos</legend>
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Café</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Cafe_1" class="perfil_1"><input type="radio" id="Cafe_1" name="cafe" value="S" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Cafe')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cafe_2" class="perfil_1"><input type="radio" id="Cafe_2" name="cafe" value="N" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cafe')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Cafe_3" class="perfil_1"><input type="radio" id="Cafe_3" name="cafe" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Cafe')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Cafe">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Tabaco</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Tabaco_1" class="perfil_1"><input type="radio" id="Tabaco_1" name="tabaco" value="S" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Tabaco')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Tabaco_2" class="perfil_1"><input type="radio" id="Tabaco_2" name="tabaco" value="N" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Tabaco')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Tabaco_3" class="perfil_1"><input type="radio" id="Tabaco_3" name="tabaco" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Tabaco')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Tabaco">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Chimo</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Chimo_1" class="perfil_1"><input type="radio" id="Chimo_1" name="chimo" value="S" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Chimo')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Chimo_2" class="perfil_1"><input type="radio" id="Chimo_2" name="chimo" value="N" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Chimo')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Chimo_3" class="perfil_1"><input type="radio" id="Chimo_3" name="chimo" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Chimo')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Chimo">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Alcohol</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Alcohol_1" class="perfil_1"><input type="radio" id="Alcohol_1" name="alcohol" value="S" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Alcohol')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Alcohol_2" class="perfil_1"><input type="radio" id="Alcohol_2" name="alcohol" value="N" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Alcohol')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Alcohol_3" class="perfil_1"><input type="radio" id="Alcohol_3" name="alcohol" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Alcohol')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Alcohol">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Drogas</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Drogas_1" class="perfil_1"><input type="radio" id="Drogas_1" name="drogas" value="S" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Drogas')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Drogas_2" class="perfil_1"><input type="radio" id="Drogas_2" name="drogas" value="N" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Drogas')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Drogas_3" class="perfil_1"><input type="radio" id="Drogas_3" name="drogas" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Drogas')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Drogas">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Actividad sexual</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Sex_1" class="perfil_1"><input type="radio" id="Sex_1" name="sex" value="S" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_ActividadSexual')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sex_2" class="perfil_1"><input type="radio" id="Sex_2" name="sex" value="N" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ActividadSexual')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sex_3" class="perfil_1"><input type="radio" id="Sex_3" name="sex" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_ActividadSexual')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_ActividadSexual">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Sueño</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Sueno_1" class="perfil_1"><input type="radio" id="Sueno_1" name="sueno" value="S" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Sueno')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sueno_2" class="perfil_1"><input type="radio" id="Sueno_2" name="sueno" value="N" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Sueno')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Sueno_3" class="perfil_1"><input type="radio" id="Sueno_3" name="sueno" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Sueno')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Sueno">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Recreacionales</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Recreacionales_1" class="perfil_1"><input type="radio" id="Recreacionales_1" name="recreacionales" value="S" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Recreacionales')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Recreacionales_2" class="perfil_1"><input type="radio" id="Recreacionales_2" name="recreacionales" value="N" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;"   onclick="No_Obser_Antecedentes('Obser_Recreacionales')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Recreacionales_3" class="perfil_1"><input type="radio" id="Recreacionales_3" name="recreacionales" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Recreacionales')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Recreacionales">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                            <div class="Anamnesis_1">
                                <div style="width:50%; display: table-cell; ">             
                                    <label>Alimentarios</label>
                                </div>
                                <div style="width:12.5%;  display: table-cell; ">
                                    <label for="Alimentarios_1" class="perfil_1"><input type="radio" id="Alimentarios_1" name="alimentarios" value="S" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="Si_Obser_Antecedentes('Obser_Alimentarios')">Si</label>
                                </div> 
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Alimentarios_2" class="perfil_1"><input type="radio" id="Alimentarios_2" name="alimentarios" value="N" style="float: left; margin-top: 0.5%; margin-right: -15%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Alimentarios')">No</label>
                                </div>
                                <div style="width:12.5%; display: table-cell;">
                                    <label for="Alimentarios_3" class="perfil_1"><input type="radio" id="Alimentarios_3" name="alimentarios" value="X" style="float: left; margin-top: 0.5%; margin-right: 0%; margin-left: -30px;" onclick="No_Obser_Antecedentes('Obser_Alimentarios')">No sabe</label>
                                </div>
                            </div> 
                            <div style="display: none" id="Obser_Alimentarios">
                                <textarea style="width:97%;" placeholder="Obervaciones"></textarea>
                            </div>
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// --> 
                        </fieldset>
                            <input type="text" name="CedulaPaciente" hidden value="<?php echo $Paciente;?> ">
                            <input type="submit" value="Guardar">
                    </form> 
                </div> 
            </section>         
  </div>       
    </body>
</html>



