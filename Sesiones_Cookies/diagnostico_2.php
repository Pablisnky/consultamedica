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
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
            li{
                list-style: none;
            }
        </style> 
    </head>
    <body onload="autofocusContacto()">
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
                    <p style="margin-top:0.5%; margin-left: 2%; background-color: ;  padding-bottom: 0.5%; margin-right: 0%; height: 40%;  display: inline-block;"><a href="muestraHistoria_2.php" style=" font-size: 13px; font-weight: bolder;">Valores semiológicos</a></p> 

                    <p style="margin-top: 0.5%; background-color: ; height: 40%; display: inline-block; "><a style="font-size: 13px; font-weight: bolder; margin-right: 0%;" href="datosParaclinicos_2.php">Valores paraclinicos</a></p>

                    <p style="margin-top:0.5%;  background-color: ;  border-bottom-style: solid; border-bottom-color: #040652; border-bottom-width: 2px;margin-right: 2%; padding-bottom: 0.5%;  height: 40%;  display: inline-block;"><a   style="font-size: 13px; cursor: default;  font-weight: bolder;">Diagnostico</a></p> 
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
                   </div>

         <div style="background-color:; width: 65%; float: right; margin-right: 4%;  position: relative; margin-top: 3%;">
            <a name="marcadorDiagnostico" class="ancla"></a>
            <form action="cargarDiagnostico.php" method="POST">
                <label class="" style="background-color: ;font-size: 16px; margin-left: 0%; margin-bottom: 1%; margin-top: 3%; width: 30%; display: block;">Diagnostico Nº1 <a href="cie_10/cie10_CapituloVII.php" style="color: blue">CIE_10</></a></label>
                <?php
            	if(!empty($_GET["Diagnostico"])){ ?> <!--si la variable no esta vacia entra aqui-->
           			<textarea rows="3"  name="diagnostico" id="Contenido" style="background-color: ; text-align: justify-all; width: 90%; padding-left: 0%;" >
           				<?php  echo $_GET["Diagnostico"];?></textarea>
            		<?php
            	}
            	else{ ?>
            		<textarea rows="3" cols="80" name="diagnostico" style="background-color: " id=""></textarea>
            	<?php } ?>


                 <label class="" style="background-color: ;font-size: 16px; margin-left: 0%; margin-bottom: 1%; margin-top: 3%; width: 30%; display: block;">Diagnostico Nº2 <a href="cie_10/cie10_CapituloVII.php" style="color: blue">CIE_10</></a></label>
                <?php
                if(!empty($_GET["Diagnostico"])){ ?> <!--si la variable no esta vacia entra aqui-->
                    <textarea rows="3"  name="diagnostico" id="Contenido" style="background-color: ; text-align: justify-all; width: 90%; padding-left: 0%;" >
                        <?php  echo $_GET["Diagnostico"];?></textarea>
                    <?php
                }
                else{ ?>
                    <textarea rows="3" cols="80" name="diagnostico" style="background-color: " id=""></textarea>
                <?php } ?>

                 <label class="" style="background-color: ;font-size: 16px; margin-left: 0%; margin-bottom: 1%; margin-top: 3%; width: 30%; display: block;">Diagnostico Nº3 <a href="cie_10/cie10_CapituloVII.php" style="color: blue">CIE_10</></a></label>

                <?php
                if(!empty($_GET["Diagnostico"])){ ?> <!--si la variable no esta vacia entra aqui-->
                    <textarea rows="3"  name="diagnostico" id="Contenido" style="background-color: ; text-align: justify-all; width: 90%; padding-left: 0%;" >
                        <?php  echo $_GET["Diagnostico"];?></textarea>
                    <?php
                }
                else{ ?>
                    <textarea rows="3" cols="80" name="diagnostico" style="background-color: " id=""></textarea>
                <?php } ?>


                <label class="" style="background-color: ;font-size: 16px; margin-left: 0%; margin-bottom: 1%; margin-top: 3%; width: 20%; display: block;">Observacion</label>                  
                <textarea rows="3" cols="80" name="observaciones" id="Observaciones" style="text-align: left; background-color: ;">

                 </textarea> 

                 
                <input type="text" hidden name="cedula_Paciente" value="<?php echo $paciente['cedula_pacient'];?>" >
                <input type="text" hidden name="doctor" value="<?php echo $sesion; ?>">


                <input type="submit" hidden id="BotonCargar">
            </form>
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