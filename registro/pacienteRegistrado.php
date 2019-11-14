<?php   
//Aparecen las tablas donde se especifican los pacientes que se veran el dia de hoy y cualquier otro dia que se desee consultar
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    /*$verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica*/

    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);

    if(!isset($_SESSION["UsuarioPaciente"])){//sino esta declarada la variable $_SESSION devuelve a DoctorAfiliado.php, con esto se garantiza que se hizo login, esta $_SESSION se creó en validarSesion.php
        header("location:../DoctorAfiliado.php");           
    }else
    {
    //aqui se almacena el ID_Paciente que se obtuvo en validarSesion.php
        $sesion= $_SESSION["UsuarioPaciente"];
        //echo "<p>ID_Paciente=  $sesion</p>" . "<br>";
            
        include("../conexion/Conexion_BD.php");
    }
?> 

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Inicio Sesión</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
		<meta name="keywords" content="consulta, medico, doctor, directorio"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/Funciones_varias.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:700'); 

            @media screen and (max-width: 800px){
                table, thead, tbody, th, td, tr{
                    display: block;  
                    /*background: #bcbeda;*/
                }
                thead tr{
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }
                tr{
                    margin: 0 0 1rem 0;
                }      
                tr:nth-child(odd){
                    /*background: #bcbeda;*/
                }    
                td{
                    background-color: ;
                    border: none;
                    border-bottom: 1px solid #eee;
                    position: relative;
                    padding-left: 50%;
                    width: 50%;
                    font-size: 13px !important;
                }
                td:before{
                    background-color: ;
                    font-size: 14px;
                    position: absolute;
                    top: 0;
                    left: 6px;
                    padding-right: 10px;
                    font-weight: ;
                    color:#040652;
                    white-space: nowrap;
                }
                td:nth-of-type(1):before {content: "---";background-color:#bcbeda; width: 94%;}
                td:nth-of-type(2):before { content: "Fecha"; }
                td:nth-of-type(3):before { content: "Especialista"; }
                td:nth-of-type(4):before { content: "Nombre"; }
                td:nth-of-type(5):before { content: "Eliminar"; margin-top: 3%; }
                .buscar_1:hover{
                    background-color: white;
                }
                .buscar_2{
                    line-height: 150%
                }
                .textoCelda_4A{/*buscarMedicamentoContacto.php*/ 
                background-color:;
                font-size: 14px ;
                width: 50% !important; 
                }
            }
        </style> 

        </head>	    
    <body>
    <header class="fixed_1" >
        <?php
            include("../header/headerPaciente.php")
        ?>      
    </header>
    <div class="Principal" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
        <section style="margin-top: ; "> 
            <h3 class="encabezadoSesion_1">Mis consultas</h3>         
            <div class="sesion_1">
                <p style="text-align: center;"><b>Consultas médicas agendadas</b></p>                    
                    <?php
                            $i = 1;
                            //se hace una consulta para obtener las citas pendientes.
                            $Consulta_2="SELECT * FROM citas INNER JOIN doctores ON citas.ID_Doctor=doctores.ID_Doctor INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE cedula_Identidad = '$Cedula' AND fecha>=curdate() ORDER BY fecha DESC ";
                            $Recordset_2 = mysqli_query($conexion,$Consulta_2);
                            if(mysqli_num_rows($Recordset_2) != 0){ 
                                ?>
                                <table class="tabla_1" border="1px">
                                    <thead>
                                        <tr>
                                            <th class="buscar_3"></th>
                                            <th class="textoCelda_1">FECHA</th>
                                            <th class="textoCelda_1">ESPECIALISTA</th>
                                            <th class="textoCelda_1">NOMBRE</th>                            
                                            <th class="textoCelda_1">ELIMINAR</th>
                                        </tr>
                                    </thead>           <?php                
                                while($datosCita= mysqli_fetch_array($Recordset_2)){                       

                                    //se cambia el formato de la fecha
                                    $fechaFormatoMySQL = $datosCita["fecha"];//se obtiene la fecha en formato MySQL
                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
                                    //echo $fechaFormatoPHP;
                    ?>
                                    <tr class="buscar_1">  
                                        <td class="buscar_3">...</td>
                                        <td><a class="a2" href=""  style="color: black; cursor:default; line-height: 30px;"><?php echo $fechaFormatoPHP;?></a></td> 
                                        <td><a class="a2" href=""  style="color: black; cursor:default; line-height: 30px;"><?php echo $datosCita["especialidad"];?></a></td>
                                        <td>
                                            <?php
                                            if($datosCita["sexo"] == "F"){//femenino
                                                    ?>
                                                    <a class="a2" href="" style="color: black; cursor:default; "><?php echo 'Dra. ' . $datosCita["nombre_doctor"] . ' ' . $datosCita["apellido_doctor"];?></a>
                                                <?php            
                                            } 
                                            else if($datosCita["sexo"] == "M"){ //Masculino 
                                                ?>  
                                                <a class="a2" href=""  style="color: black; cursor:default; "><?php echo 'Dr. ' . $datosCita["nombre_doctor"] . ' ' . $datosCita["apellido_doctor"];?></a>
                                                <?php   
                                            }
                                            else if($datosCita["sexo"] == ""){ //No especificó
                                                ?>
                                                <a class="a2" href=""  style="color: black; cursor:default; "><?php echo $datosCita["nombre_doctor"] . ' ' . $datosCita["apellido_doctor"];?></a>
                                                <?php 
                                            }      
                                                    ?>
                                        </td>
                                        <td>
                                            <a class="a3" href="../EliminarCita.php?CitaEliminar=<?php echo $datosCita["ID_Cita"];?>&ID_Paciente=<?php echo $sesion?>" onclick="return Confirmacion()">o</a>
                                        </td>
                                    </tr> 

                                    <?php 
                                    $i++; 
                                } ?></table><?php
                            }
                            else{
                                echo "<p class='Inicio_15'>No tiene consultas agendadas</p>";
                            }                            
                               ?>                  
                </div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
                        
                <div class="sesion_2">
                    <p style="text-align: center; margin-bottom: 1%;"><b>Historico de consultas médicas</b></p>
                    
                        <?php
                            $i = 1;
                            //se hace una consulta para obtener las consultas a las que ha asistido el paciente.
                            $Consulta_3="SELECT * FROM citas INNER JOIN doctores ON citas.ID_Doctor=doctores.ID_Doctor INNER JOIN especialidades ON doctores.ID_Especialidad=especialidades.ID_Especialidad WHERE cedula_Identidad = '$Cedula' AND fecha < curdate() ORDER BY fecha DESC";
                            $Recordset_3 = mysqli_query($conexion,$Consulta_3);
                            if(mysqli_num_rows($Recordset_3) != 0){ ?> 
                                <table class="tabla_1" border="1px">
                                    <thead>
                                        <tr>
                                            <th class="buscar_3"></th>
                                            <th class="textoCelda_1">FECHA</th>
                                            <th class="textoCelda_1">ESPECIALISTA</th>
                                            <th class="textoCelda_1">NOMBRE</th>
                                        </tr>
                                    </thead>    <?php                      
                                while($datosCita= mysqli_fetch_array($Recordset_3)){                       
                                    //se cambia el formato de la fecha
                                    $fechaFormatoMySQL = $datosCita["fecha"];//se obtiene la fecha en formato MySQL
                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
                                    //echo $fechaFormatoPHP;
                    ?>
                                    <tr class="buscar_1">  
                                        <td class="buscar_3">...</td>
                                        <td><a class="a2" href=""  style="color: black; cursor:default; line-height: 30px;"><?php echo $fechaFormatoPHP;?></a></td> 
                                        <td><a class="a2" href=""  style="color: black; cursor:default; line-height: 30px;"><?php echo $datosCita["especialidad"];;?></a></td>
                                        <td>
                                            <?php
                                            if($datosCita["sexo"] == "F"){//femenino
                                                    ?>
                                                    <a class="a2" href="" style="color: black; cursor:default; "><?php echo 'Dra. ' . $datosCita["nombre_doctor"] . ' ' . $datosCita["apellido_doctor"];?></a>
                                                <?php            
                                            } 
                                            else if($datosCita["sexo"] == "M"){ //Masculino 
                                                ?>  
                                                <a class="a2" href=""  style="color: black; cursor:default; "><?php echo 'Dr. ' . $datosCita["nombre_doctor"] . ' ' . $datosCita["apellido_doctor"];?></a>
                                                <?php   
                                            }
                                            else if($datosCita["sexo"] == ""){ //No especificó
                                                ?>
                                                <a class="a2" href=""  style="color: black; cursor:default; "><?php echo $datosCita["nombre_doctor"] . ' ' . $datosCita["apellido_doctor"];?></a>
                                                <?php 
                                            }      
                                                    ?>
                                        </td>
                                    </tr>        
                                    <?php 
                                    $i++;                                   
                                    } ?></table><?php
                                }
                            else{  
                                echo "<p class='Inicio_15'>Su historial no contiene registros.</p>";
                            }    
                                ?> 
                </div>
            </div>
        </div>  
    </body>
    </html>

