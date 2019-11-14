<?php   
//Edita el perfil del doctor, sus datos personales y la imagen para mostras en 03.php
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    /*$verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica*/
?> 

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Inicio Sesión</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
		<meta name="keywords" content="consulta, medico, doctor, directorio"/>
		<meta name="author" content="Pablo Cabeza"/>
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script>  
        <script src="../Javascript/CalendarioJQwery_2.js"></script>
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="../Javascript/Ciudades.js"></script> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:700');

            th{
                font-size: 0.9vw;
            }
            td{
               font-size: 0.85vw;
               box-sizing: border-box;
            }
            .a2{
               font-size: 0.88vw; 
               font-weight:bolder;
               color: #040652;
            }
            .a2:hover{
                color: white;
            }
            tr:hover{background-color:#BEBFDD; }
        </style>         
    </head>	    
    <body>
        <?php
            if(!isset($_SESSION["UsuarioDoct"])){//sino esta declarada la variable $_SESSION devuelve a DoctorAfiliado.php, con esto se garantiza que se hizo login, esta $_SESSION se creó en validarSesion.php
            	header("location:../DoctorAfiliado.php");			
			}else
            {
                $sesion=$_SESSION["UsuarioDoct"];//aqui se almacena el ID_Doctor en $sesion
            }
            //se realiza la conexión a la BD
            include("../conexion/Conexion_BD.php");
            mysqli_query($conexion,"SET NAMES 'utf8'");

        ?>

        <div class="Principal"> 
            <header class="fixed_1" >
                <div style=" background-color: yellow;"">
                    <div style=" background-color: yellow; width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                        <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%;  text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
                    </div>
                    <div style="background-color: ; float: right; box-sizing: border-box;  width: 25%;">
                        <?php
                            //Consulta para para colocar el nombre y apellido del Dr que abre sesión
                            $consulta_1="SELECT nombre_doctor, apellido_doctor, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                            $Recordset_1=mysqli_query($conexion,$consulta_1);
                            $Doctor_Datos= mysqli_fetch_array($Recordset_1);
                                if($Doctor_Datos["sexo"] == "F"){//femenino
                                ?>
                                    <input class="usuarioDoctor" readonly="readonly" type="text" required name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php } 
                                else if($Doctor_Datos["sexo"] == "M"){//Masculino 
                                ?>  
                                    <input class="usuarioDoctor" readonly="readonly" type="text" required name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }
                                else if($Doctor_Datos["sexo"] == ""){//No especificó
                                ?>
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                <?php } ?>
                    </div>
                </div>
                <nav class="n41">
                    <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="InicioSesion.php">Consulta</a></div>
                    <div class="n44"><a href="RegistroPacientes.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual.php">Morbilidad</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php">HCD</a></div>
                    <div class="n44"><a href="mostrarPerfilDoctor.php">Mi perfil</a></div>              
                </nav>                 
            </header>

            <section style="margin-top: 10%;"> 
                <h3 style="margin-bottom: 2.5%;">Editar perfil</h3>

                <?php
                    $consulta_1="SELECT * FROM doctores INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad  WHERE ID_Doctor= '$sesion' ";
                    $Recorset_1=mysqli_query($conexion,$consulta_1);
                    $Doctor= mysqli_fetch_array($Recorset_1);
                ?>
                
                <form action="perfilDoctor.php" method="POST" enctype="multipart/form-data" name="Afiliacion" autocomplete="off" id="afiliacion">
                    <!--En este formulario se utilizo el enctype correspondiente porque se va a enviar una imagen-->
                    <div id="Afili" style="background-color: yellow; float: left;">
                            <fieldset id="Afiliacion_4">
                            <legend>Datos personales</legend>
                            <label class="etiqueta">Nombre:</label>
                            <input type="text" name="nombre" id="Nombre" value="<?php echo $Doctor['nombre_doctor'];?>" />
                            <br/>
                            <label class="etiqueta">Apellido:</label>
                            <input type="text" name="apellido" id="Apellido" value="<?php echo $Doctor['apellido_doctor'];?>"/>
                            <br/>
                            <label class="etiqueta">Cédula:</label>
                            <input type="text" name="cedula" id="Cedula" value="<?php echo $Doctor['cedula'];?>"/>
                            <br/>
                            <label class="etiqueta">Teléfono movil:</label>
                            <input type="text" name="telefonoMovil" id="Telefono" value="<?php echo $Doctor['telefono_movil'];?>"/>
                            <br/>
                            <label class="etiqueta">Correo electronico:</label>
                            <input type="text" name="correo" id="Correo" value="<?php echo $Doctor['correo'];?>"/>
                            <br/>
                            <label class="etiqueta">Sexo:</label>
                            <label for="SexoM">Masculino</label>
                            <input type="radio" name="sexo" id="SexoM" value="M" <?php if(($Doctor['sexo'])=='M') print "checked=true"?>/>

                            <label for="SexoF">Femenino</label>
                            <input type="radio" name="sexo" id="SexoF" value="F" <?php if(($Doctor['sexo'])=='F') print "checked=true"?>/>
                            <br/>                            
                        </fieldset>

                        <fieldset id="Afiliacion_4">
                            <legend>Datos de Consulta</legend>
                            <label  class="etiqueta">Especialidad:</label>
                            <select name="especialidad" id="Especialidad"/>
                                    <option value="<?php echo $Doctor['ID_Especialidad'];?>"><?php echo $Doctor['especialidad'];?></option>
                                        <?php
                                            $Consulta= "SELECT * FROM especialidades ORDER BY especialidad ASC";
                                            $Recordset= mysqli_query($conexion,$Consulta);
                                                    while($especialista= mysqli_fetch_array($Recordset)){
                                                    echo '<option value="'.$especialista['ID_Especialidad'].'">'.$especialista['especialidad'] .'</option>'; 
                                                    }
                                        ?>
                            </select>
                            <br/><br/>
                            <label class="etiqueta">Teléfono consultorio:</label>
                            <input type="text" name="telefonoConsultorio" id="TelefonoConsultorio" value="<?php echo $Doctor['telefono_movil'];?>"/>
                            <br/>
                            <label class="etiqueta">Precio consulta:</label>
                            <input type="text" name="precioConsulta" id="PrecioConsulta" value="<?php echo $Doctor['precio_consulta'];?>"/>
                            <br/><br>

                            <?php
                                $Consulta_4="SELECT clinica, direccion, consultorio FROM direcciones WHERE ID_Doctor ='$sesion'";
                                $Recorset_4= mysqli_query($conexion,$Consulta_4);
                                while($DirConsulta= mysqli_fetch_array($Recorset_4)){
                            ?>
                                <label class="etiqueta">Dirección:</label>
                                <textarea name="direccion"><?php echo $DirConsulta['direccion'];?></textarea>
                                <br/><br/>
                                <label class="etiqueta">Centro de salud:</label>
                                <textarea name="clinica"><?php echo $DirConsulta['clinica'];?></textarea>
                                <br/><br/>
                                <label class="etiqueta">Consultorio:</label>
                                <textarea name="consultorio"><?php echo $DirConsulta['consultorio'];?></textarea>
                                <br/><br/>
                            <?php } ?>

                            <label class="etiqueta">Estado:</label>
                            <select name="estado" id="Estado" onchange="SeleccionarCiudad(this.form)"> <!-- esta funcion esta en CIudad.js-->
                                <option value="<?php echo $Doctor['estado'];?>"><?php echo $Doctor['estado'];?></option>
                                <option>Amazonas</option>
                                <option>Anzoátegui</option>
                                <option>Apure</option>
                                <option>Aragua</option>
                                <option>Barinas</option>
                                <option>Bolivar</option>
                                <option>Carabobo</option>
                                <option>Cojedes</option>
                                <option>Delta Amacuro</option>
                                <option>Distrito Capital</option>
                                <option>Falcon</option>
                                <option>Guárico</option>
                                <option>Lara</option>
                                <option>Mérida</option>
                                <option>Miranda</option>
                                <option>Monagas</option> 
                                <option>Nueva Esparta</option>
                                <option>Portuguesa</option>
                                <option>Sucre</option>
                                <option>Táchira</option>
                                <option>Trujillo</option>                           
                                <option>Vargas</option>
                                <option>Yaracuy</option>
                                <option>Zulia</option>
                            </select>                  
                            <br><br>

                            <label class="etiqueta">Ciudad:</label>
                            <select name="ciudad" id="Ciudad"> 
                                <option value="<?php echo $Doctor['ciudad'];?>"><?php echo $Doctor['ciudad'];?></option>
                            </select> 
                            <hr>
                            <label class="etiqueta">Horario</label>

                            <?php
                                $Consulta_5="SELECT * FROM horarios WHERE ID_Doctor = '$sesion' ";
                                $Recordset_5= mysqli_query($conexion,$Consulta_5);
                                $horario= mysqli_fetch_array($Recordset_5);
                            ?>

                            <br><br>
                            <label class="etiqueta"  style="font-weight: bold;">Mañana:</label>
                            <br>
                            <label class="etiqueta">Inicio</label>
                            <select name="inicioMañana" id="Ciudad"> 
                                <option><?php echo $horario['inicio_mañana'];?></option>
                                <option></option>
                                <option>06:00 am</option>
                                <option>06:30 am</option>
                                <option>07:00 am</option>
                                <option>07:30 am</option>
                                <option>08:00 am</option>
                                    <option>08:30 am</option>
                                    <option>09:00 am</option>
                                    <option>09:30 am</option>
                                    <option>10:00 am</option>
                                    <option>10:30 am</option>
                                    <option>11:00 am</option>
                                    <option>11:30 am</option>
                                    <option>12:00 m</option>
                                </select> 
                              <label class="etiqueta">Culmina</label>  
                                <select name="culminaMañana" id="Ciudad">
                                <option><?php echo $horario['culmina_mañana'];?></option> 
                                <option></option>
                                    <option>09:00 am</option>
                                    <option>09:30 am</option>
                                    <option>10:00 am</option>
                                    <option>10:30 am</option>
                                    <option>11:00 am</option>
                                    <option>11:30 am</option>
                                    <option>12:00 m</option>
                                </select> 
                            <br><br>
                            <label class="etiqueta_9" for="Lunes_Mañana">lunes</label>
                            <input class="etiqueta_10" type="checkbox" name="lunes_mañana" id="Lunes_Mañana" value="lunes" <?php if(($horario['lunes_mañana'])=='lunes') { echo ' checked'; } ?>>                    
                            <label class="etiqueta_9" for="Martes_Mañana">martes</label>
                            <input class="etiqueta_10" type="checkbox" name="martes_mañana" id="Martes_Mañana" value="martes"  <?php if(($horario['martes_mañana'])=='martes') { echo ' checked'; } ?>>
                           
                            <label class="etiqueta_9" for="Miercoles_Mañana">miercoles</label>
                            <input class="etiqueta_10"  type="checkbox" name="miercoles_mañana" id="Miercoles_Mañana" value="miercoles"  <?php if(($horario['miercoles_mañana'])=='miercoles') { echo ' checked'; } ?>>
                            
                            <label class="etiqueta_9" for="Jueves_Mañana">jueves</label>
                            <input class="etiqueta_10"  type="checkbox" name="jueves_mañana" id="Jueves_Mañana" value="jueves" <?php if(($horario['jueves_mañana'])=='jueves') { echo ' checked'; } ?>>
                            
                            <label class="etiqueta_9" for="Viernes_Mañana">viernes</label>
                            <input class="etiqueta_10"  type="checkbox" name="viernes_mañana" id="Viernes_Mañana" value="viernes" <?php if(($horario['viernes_mañana'])=='viernes') { echo ' checked'; } ?>>
                            
                            <label class="etiqueta_9" for="Sabado_Mañana">sabado</label>
                            <input class="etiqueta_10"  type="checkbox" name="sabado_mañana" id="Sabado_Mañana" value="sabado" <?php if(($horario['sabado_mañana'])=='sabado') { echo ' checked'; } ?>>
                           
                            <br><br><br><br>
                            <label class="etiqueta" style="font-weight: bold;">Tarde:</label>
                            <br>

                            <label class="etiqueta">Inicio</label>
                                <select name="iniciaTarde" id=""> 
                                    <option><?php echo $horario['inicia_tarde'];?></option>
                                    <option></option>
                                    <option>12:00 m</option>
                                    <option>12:30 pm</option>
                                    <option>01:00 pm</option>
                                    <option>01:30 pm</option>
                                    <option>02:00 pm</option>
                                    <option>02:30 pm</option>
                                    <option>03:00 pm</option>
                                    <option>03:30 pm</option>
                                    <option>04:00 pm</option>
                                    <option>04:30 pm</option>
                                    <option>05:00 pm</option>
                                    <option>05:30 pm</option>
                                    <option>06:00 pm</option>
                                    <option>06:30 pm</option>
                                    <option>07:00 pm</option>
                                    <option>07:30 pm</option>
                                    <option>08:00 pm</option>
                                </select> 
                            <label class="etiqueta">Culmina</label>
                                <select name="culminaTarde" id="Ciudad"> 
                                    <option><?php echo $horario['culmina_tarde'];?></option>
                                    <option></option>
                                    <option>02:00 pm</option>
                                    <option>02:30 pm</option>
                                    <option>03:00 pm</option>
                                    <option>03:30 pm</option>
                                    <option>04:00 pm</option>
                                    <option>04:30 pm</option>
                                    <option>05:00 pm</option>
                                    <option>05:30 pm</option>
                                    <option>06:00 pm</option>
                                    <option>06:30 pm</option>
                                    <option>07:00 pm</option>
                                    <option>07:30 pm</option>
                                    <option>08:00 pm</option>
                                </select>
                            
                            <br><br>
                            <label class="etiqueta_9" for="Lunes_Tarde">lunes</label>
                            <input class="etiqueta_10" type="checkbox" name="lunes_tarde" id="Lunes_Tarde" value="lunes"  <?php if(($horario['lunes_tarde'])=='lunes') { echo ' checked'; } ?>>
                            
                            <label class="etiqueta_9" for="Martes_Tarde">martes</label>
                            <input class="etiqueta_10" type="checkbox" name="martes_tarde" id="Martes_Tarde" value="martes" <?php if(($horario['martes_tarde'])=='martes') { echo ' checked'; } ?>>
                           
                            <label class="etiqueta_9" for="Miercoles_Tarde">miercoles</label>
                            <input class="etiqueta_10"  type="checkbox" name="miercoles_tarde" id="Miercoles_Tarde" value="miercoles" <?php if(($horario['miercoles_tarde'])=='miercoles') { echo ' checked'; } ?>>
                            
                            <label class="etiqueta_9" for="Jueves_Tarde">jueves</label>
                            <input class="etiqueta_10"  type="checkbox" name="jueves_tarde" id="Jueves_Tarde" value="jueves" <?php if(($horario['jueves_tarde'])=='jueves') { echo ' checked'; } ?>>
                            
                            <label class="etiqueta_9" for="Viernes_Tarde">viernes</label>
                            <input class="etiqueta_10"  type="checkbox" name="viernes_tarde" id="Viernes_Tarde" value="viernes" <?php if(($horario['viernes_tarde'])=='viernes') { echo ' checked'; } ?>>
                            
                            <label class="etiqueta_9" for="Sabado_Tarde">sabado</label>
                            <input class="etiqueta_10"  type="checkbox" name="sabado_tarde" id="Sabado_Tarde" value="sabado" <?php if(($horario['sabado_tarde'])=='sabado') { echo ' checked'; } ?>>
                    </div>

                        <div style="background-color:blue; height: 200px;float:right; margin-right: 15%;">
                            <fieldset id="Afiliacion_4">
                                <legend>Fotografia</legend>
                                <label>Inserte una imagen no mayor de Kb</label><br>
                                <input name="imagen" type="file" value="Seleccione un fotografia" />
                            </fieldset>      
                        </div>

                        <div  id="Afili" style="background-color:red ;float:right; margin-right: 7%;">
                            <?php
                                $Consulta_6="SELECT * FROM perfil_doctor WHERE ID_Doctor = '$sesion' ";
                                $Recordset_6= mysqli_query($conexion,$Consulta_6);
                                $PerfilDoctor= mysqli_fetch_array($Recordset_6);
                            ?>
                            <fieldset id="Afiliacion_4">
                                <legend>Servicios Profesionales</legend>
                                <label>Especifique un servicio de su consulta a la vez</label><br>
                                <input type="text" name="servicioUno" value="<?php echo $PerfilDoctor['servicio_1'];?>"><br>
                                <input type="text" name="servicioDos" value="<?php echo $PerfilDoctor['servicio_2'];?>"><br>
                                <input type="text" name="servicioTres" value="<?php echo $PerfilDoctor['servicio_3'];?>"><br>
                                <input type="text" name="servicioCuatro" value="<?php echo $PerfilDoctor['servicio_4'];?>"><br>
                                <input type="text" name="servicioCinco" value="<?php echo $PerfilDoctor['servicio_5'];?>"><br>
                                <input type="text" name="servicioSeis" value="<?php echo $PerfilDoctor['servicio_6'];?>"><br>

                                <br>
                                <label>Especifique su perfil profesional</label><br>
                                <textarea name="textoPerfil"><?php echo $PerfilDoctor['Perfil'];?></textarea>
                            </fieldset>
                        </div>
                </div> 
                        <div id="Perfil_06" style="background-color: ; width: 48%; display: inline-block;">
                            <?php echo '<a style="padding:0.9% 5%; color:rgba(194, 245, 19,1);" href="mostrarPerfilDoctor.php">Volver</a>';
                            ?>  
                        </div> 
                        <input type="submit" value= "Guardar cambios" style=" color:rgba(194, 245, 19,1);"/>  
                    </form>
                

                

            </section>