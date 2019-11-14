 <?php
    session_start(); 

    include("../conexion/Conexion_BD.php");
    mysqli_query($conexion,"SET NAMES 'utf8' ");

    $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION

    $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
                $UsDoctor= mysqli_fetch_row($NombreDoctor);
                $UsDoctor[1]; //se obtiene el nombre del doctor.

    $Paciente= $_SESSION["cedulaIdentidad"];//se introduce la cedula mediante $_SESSION
    //echo $Paciente . "<br>";   

    $fechaParaclinico= $_GET["fecha"];//se recibe desde evaluacionMensual.php la fecha del valor paraclinico a revisar y en otro caso desde HistoriaClinica.phh(la fecha de la ultima vez que el paciente estuvo en consulta) tambiend desde datosParaclinicos.php
   // echo $fechaHistoria; 

    //se recibe el ID del valor paraclinico, el ultimo registro desde HistoriasClinicas.php y desde grafico_xx.php
    $UltimoVP= $_GET["ID_VP"];
    //echo $UltimoVP . "<br>";

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historia Medica Digital</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Historia clinica de pacientes en Venezuela"/>
        <meta name="keywords" content="reporte medico,historia clinica, "/>
        <meta name="author" content="Pablo Cabeza"/>
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png"/> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script> 
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/validar_Campos.js"></script> 

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');

            td{
                height: 30px; 
            }
            th{
                font-size: 12px;
            }
            .datos_1{
                background-color:#F4FCFB;
                color: #040652;
                padding: 1% 0%;
                width: 5px;
            }
        </style> 
    </head>
<body>
        <div class="Principal" style="background-color:;">
            <header class="fixed_1" >
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
                    <div class="n44"><a href="ReporteMensual.php">Morbilidad</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php" class="activa">HCD</a></div>              
                </nav>
            </header>

            <section style="background-color: ; margin-top: 10%;"> 
                 <?php
                //Se realiza una consulta para obtener los datos del paciente y el Numero de ID_VP
                $Consulta="SELECT * FROM pacientes INNER JOIN valores_paraclinicos ON pacientes.cedula_Identidad=valores_paraclinicos.CedulaPaciente WHERE CedulaPaciente ='$Paciente'";
                $Resulset = mysqli_query($conexion,$Consulta);          
                $paciente= mysqli_fetch_array($Resulset);

                //se cambia el formato de la fecha
                $fechaFormatoMySQL = $fechaParaclinico;//se obtiene la fecha en formato MySQL
                $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                //echo $fechaFormatoPHP;
                ?>
                <div style="background-color:; float: left; width: 25%; margin-left: 2.5%; margin-top: 0%; position: fixed;">
                    <div  id="" class=""  style="background-color:;">
                        <br>
                        <fieldset style="border-radius: 15px; padding: 2%">
                            <legend>Paciente</legend>
                            <label style="background-color:;  float: left; width: 35%;">Nombre</label>
                            <input style="margin-bottom: 1.5%; " type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $paciente["nombre"];?>"> 
                            <br>                            
                            <label style="float: left; width: 35%">Apellido</label>
                            <input style="margin-bottom: 1.5%;"  type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $paciente["apellido"];?>">
                            <br>                            
                            <label style="float: left; width: 35%">Cedula</label>
                            <input style="margin-bottom: 1.5%;"" type="text" name="cedula_Paciente" value="<?php echo $paciente["cedula_Identidad"];?>">
                            <br>                            
                           <label style="float: left; width: 35%">Fecha</label>
                            <input style="margin-bottom: 1.5%;"  type="text" name="fecha_consulta" readonly value="<?php echo $fechaFormatoPHP;?>"><!-- se recibe desde HistoriasClinica.php-->
                            <br>                           
                            <label style="float: left; width: 35%">Nº de registro</label>
                            <input style="margin-bottom: 1.5%;"  type="text" name="codigo_historia" readonly value="<?php echo $UltimoVP;?>"> <!--Se recibe desde HistoriasClinicas.php-->                           
                    <div style="background-color: ; margin-top: 3%; border-bottom-style: solid; border-bottom-width: 0.5px; border-color:rgba(4,6,82,0.4); display: flex; justify-content: center; ">
                        <a href="HistoriasClinicas.php?cedula_pacient=<?php echo $Paciente;?>" style="background-color: ; width: 20%; font-size: 13px; border-radius: 10px; color: ;text-align: center;">Anamnesis</a>
                    </div>        
                    <div style="background-color: ; margin-top: 3%; display: flex;  justify-content: space-between; ">

                         <?php
                        //Se realiza una consulta para selecconar el ultimo registro de la historia medica del paciente y enviar el ID del historico de esa visita al consultorio
                        $Consulta_3 ="SELECT MAX(ID_HV) FROM historico_visitas WHERE ID_Doctor ='$sesion' AND cedula_paciente ='$Paciente'";
                        $Recordset_3=mysqli_query($conexion,$Consulta_3); 
                        $Visita= mysqli_fetch_array($Recordset_3);
                        $IDHistoricoVisita=$Visita["MAX(ID_HV)"];
                        //echo "ULtimo ID registrado en la historia medica" . $IDHistoricoVisita . "<br>";
                        
                        
                        //despues que se tiene el ID_HV se busca la fecha de ese indice
                        $Consulta_4 ="SELECT fecha_visita FROM historico_visitas WHERE ID_HV ='$IDHistoricoVisita'";
                        $Recordset_4=mysqli_query($conexion,$Consulta_4); 
                        $Fecha= mysqli_fetch_array($Recordset_4);
                        $FechaUltimaVisita=$Fecha["fecha_visita"];
                        //echo "Fecha de ultimo registro en la historia medica= " . $FechaUltimaVisita;
                        ?>

                        <a style="background-color: ;  margin-right: 0%; width: 30%; font-size: 13px; border-radius: 10px; color: ;text-align: center;" href="muestraHistoria.php?fecha=<?php echo $FechaUltimaVisita;?>">Valores semiologicos</a>

                        <a style="background-color: ;cursor: default; font-weight: bolder;  font-size: 14px;width: 30%; margin-right: 0%; text-align: center;">Valores paraclínicos</a>

                         <?php
                        //Se realiza una consulta para selecconar el ultimo registro de diagnosticos del paciente y enviar el ID del diagnostico a a muestraHistoria.php, datosParaclinicos y diagnostico.php
                        $Consulta_3 ="SELECT MAX(ID_D) FROM diagnostico WHERE ID_Doctor ='$sesion' AND Cedula_Paciente ='$Paciente'";
                        $Recordset_3=mysqli_query($conexion,$Consulta_3); 
                        $Visita= mysqli_fetch_array($Recordset_3);
                        $IDUltimoDiagnostico=$Visita["MAX(ID_D)"];
                        //echo "Código ID_D del ultimo diagnostico= " . $IDUltimoDiagnostico . "<br>";

                        //despues que se tiene el ID_D se busca la fecha de ese indice
                        $Consulta_4 ="SELECT Fecha FROM diagnostico WHERE ID_D ='$IDUltimoDiagnostico'";
                        $Recordset_4=mysqli_query($conexion,$Consulta_4); 
                        $Fecha= mysqli_fetch_array($Recordset_4);
                        $FechaUltimoDiagnostico=$Fecha["Fecha"];
                        //echo "fecha ultimo valor paraclinico= " . $FechaUltimoDiagnostico . "<br>";
                        ?>

                        <a href="diagnostico.php?fecha=<?php echo $FechaUltimoDiagnostico;?>&ID_D=<?php echo $IDUltimoDiagnostico;?>" style="background-color: ; margin-right: 0%;  width: 30%;  font-size: 13px; text-align: center;" >Diagnostico</a>
                    </div>
                     </fieldset>
                    </div>
                     <div class=""  style="background-color:; margin-top: 10%; ">                                     
                            <a class="nuevoPaciente"  style="cursor: pointer;" onclick="agendarCita()">Agendar próxima cita</a>   
                            <a class="nuevoPaciente" href="HistoriaOftalmologica_2.php">Nuevo registro médico</a><!--la función nuevoRegistro() se encuentra al final de este documento-->
                            <a class="nuevoPaciente" href="actualizarDatos.php?cedulaPaciente=<?php echo $MiPaciente['cedula_pacient'];?>">Actualizar registro médico</a>
                            <a class="nuevoPaciente" href="">Imprimir registro médico</a>
                            <!--<a class="nuevoPaciente" href="#bajarAntecedentesPersonalesPatológicos ">Antecedentes Personales Patológicos</a>
                            <a class="nuevoPaciente" href="#bajarHabitosPsicobiologicos ">Habitos Psicobiológicos</a>-->
                            <!--<a class="nuevoPaciente" href="#bajarHastaAntecedentes">Antecedentes clinicos</a>-->

                        <script src="../Javascript/menu_2.js"></script><!--si se coloca en el head no funciona.-->
                    </div>
                </div>


                <div  style="background-color:; width: 70%; float: right; margin-right: 1%;  position: relative; margin-bottom: 7%; margin-top: 1%;">

                        <?php
                             if(!empty($UltimoVP)){//sino esta vacia la variable del Valor Paraclinico se viene desde HistoriasClinicas.php sin haber seleccionado una fecha y se va a mostrar el utlimo registro del paciente

                            //Se realiza una consulta para buscar la ultima historia medica del paciente, donde ID_HP es el ID del historico de  la ultima visita

                            $Consulta="SELECT * FROM pacientes INNER JOIN historico_visitas ON pacientes.cedula_Identidad=historico_visitas.cedula_paciente WHERE cedula_Identidad ='$Paciente'";
                            $Resulset = mysqli_query($conexion,$Consulta);          
                            $paciente= mysqli_fetch_array($Resulset);
                        ?>

                        <table border="1px" style="width: 100%; text-align: center; border-collapse: collapse; margin-bottom: 3%; margin-left: auto; margin-right: auto;" >
                            
                             <?php
                                include("../conexion/Conexion_BD.php");
                                mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

                                //Se consultan los valores paraclinicos del paciente y se muestran en una tabla
                                $Consulta= "SELECT * FROM valores_paraclinicos WHERE ID_VP= $UltimoVP AND ID_Doctor ='$sesion' ORDER BY Fecha DESC";
                                $Recordset=mysqli_query($conexion,$Consulta);                          
                                while($Valor= mysqli_fetch_array($Recordset)){

                                //se cambia el formato de la fecha
                                $fechaFormatoMySQL = $Valor["Fecha"];//se obtiene la fecha en formato MySQL
                                $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
                               // echo $fechaFormatoPHP;                                 
                            ?>
                            <thead>
                                <tr>
                                    <th colspan="17" style="background-color:#BEBFDD; font-size: 20px; color: #040652; font-weight: bolder;" >Valores paraclinicos  <?php echo $fechaFormatoPHP;?> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr> 
                                    <th class="datos_1"><a href="../Graficos/grafico.php" style="font-size: 12px; color: #040652; font-family: lato;">Hb gr/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Hto.php" style="font-size: 12px; color: #040652; font-family: lato;">Hto %</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Leuc.php" style="font-size: 12px; color: #040652; font-family: lato;">Leuc xmm3</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Seg.php" style="font-size: 12px; color: #040652; font-family: lato;">Seg %</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Linf.php" style="font-size: 12px; color: #040652; font-family: lato;">Linf %</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Plt.php" style="font-size: 12px; color: #040652; font-family: lato;">Plt xmm3</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_TP.php" style="font-size: 12px; color: #040652; font-family: lato;">TP seg</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_TPT.php" style="font-size: 12px; color: #040652; font-family: lato;">TPT seg</a></th>
                                    <th class="datos_1"><a href="../Graficos/grafico_INR.php" style="font-size: 12px; color: #040652; font-family: lato;">INR</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Sodio.php" style="font-size: 12px; color: #040652; font-family: lato;">Sodio mmol/lt</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Potasio.php" style="font-size: 12px; color: #040652; font-family: lato;">Potasio mmol/lt</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Calcio.php" style="font-size: 12px; color: #040652; font-family: lato;">Calcio mg/dl</a></th>
                                    <th class="datos_1" ><a href="../Graficos/grafico_Magnesio.php" style="font-size: 12px; color: #040652; font-family: lato;">Magnesio  mg/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Glic.php" style="font-size: 12px; color: #040652; font-family: lato;">Glic mg/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Urea.php" style="font-size: 12px; color: #040652; font-family: lato;">Urea mg/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Creat.php" style="font-size: 12px; color: #040652; font-family: lato;">Creat mg/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Depur.php" style="font-size: 12px; color: #040652; font-family: lato;">Depur Cr ml/min</a></th> 
                               </tr>
                               <tr> 
                                    <td><?php echo $Valor["Hb"];?></td> 
                                    <td><?php echo $Valor["Hto"];?></td>
                                    <td><?php echo $Valor["Leuc"];?></td> 
                                    <td><?php echo $Valor[7];?></td>
                                    <td><?php echo $Valor[8];?></td> 
                                    <td><?php echo $Valor[9];?></td>
                                    <td><?php echo $Valor[10];?></td> 
                                    <td><?php echo $Valor[11];?></td>
                                    <td><?php echo $Valor[12];?></td> 
                                    <td><?php echo $Valor[13];?></td>
                                    <td><?php echo $Valor[14];?></td> 
                                    <td><?php echo $Valor[15];?></td>
                                    <td><?php echo $Valor[16];?></td> 
                                    <td><?php echo $Valor[17];?></td>
                                    <td><?php echo $Valor[18];?></td> 
                                    <td><?php echo $Valor[19];?></td>
                                    <td><?php echo $Valor[20];?></td>
                                </tr>
                                <tr>
                                    <td  colspan="17" style="height: 2px;background-color: #040652"> </td>
                                </tr>
                                <tr> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Prot.php" style="font-size: 12px; color: #040652; font-family: lato;">Prot T gr/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Alb.php" style="font-size: 12px; color: #040652; font-family: lato;">Alb gr/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Glob.php" style="font-size: 12px; color: #040652; font-family: lato;">Glob gr/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_A_G.php" style="font-size: 12px; color: #040652; font-family: lato;">A/G</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_TGO.php" style="font-size: 12px; color: #040652; font-family: lato;">TGO U/L</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_TGP.php" style="font-size: 12px; color: #040652; font-family: lato;">TGP U/L</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_BT.php" style="font-size: 12px; color: #040652; font-family: lato;">BT mg/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_BI.php" style="font-size: 12px; color: #040652; font-family: lato;">BI mg/dl</a></th>
                                    <th class="datos_1"><a href="../Graficos/grafico_BD.php" style="font-size: 12px; color: #040652; font-family: lato;">BD mg/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Fosf.php" style="font-size: 12px; color: #040652; font-family: lato;">Fosf A.U/L</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Colest.php" style="font-size: 12px; color: #040652; font-family: lato;">Colest T mg/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_HDLc.php" style="font-size: 12px; color: #040652; font-family: lato;">HDLc</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_LDLc.php" style="font-size: 12px; color: #040652; font-family: lato;">LDLc</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_Triglic.php" style="font-size: 12px; color: #040652; font-family: lato;">Triglic mg/dl</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_HIV.php" style="font-size: 12px; color: #040652; font-family: lato;">HIV</a></th> 
                                    <th class="datos_1"><a href="../Graficos/grafico_VDRL.php" style="font-size: 12px; color: #040652; font-family: lato;">VDRL</a></th>
                                    <th class="datos_1"><a href="../Graficos/grafico_AcUr.php" style="font-size: 12px; color: #040652; font-family: lato;">Ac. Ur mg/dl</a></th>

                                </tr>
                                 <tr> 
                                    <td><?php echo $Valor[21];?></td> 
                                    <td><?php echo $Valor[22];?></td>
                                    <td><?php echo $Valor[23];?></td> 
                                    <td><?php echo $Valor[24];?></td>
                                    <td><?php echo $Valor[25];?></td> 
                                    <td><?php echo $Valor[26];?></td>
                                    <td><?php echo $Valor[27];?></td> 
                                    <td><?php echo $Valor[28];?></td>
                                    <td><?php echo $Valor[29];?></td> 
                                    <td><?php echo $Valor[30];?></td>
                                    <td><?php echo $Valor[31];?></td> 
                                    <td><?php echo $Valor[32];?></td>
                                    <td><?php echo $Valor[33];?></td>
                                    <td><?php echo $Valor[34];?></td> 
                                    <td><?php echo $Valor[35];?></td>
                                    <td><?php echo $Valor[36];?></td> 
                                    <td><?php echo $Valor[37];?></td>
                                </tr>                             
                             
                               
                                <br>
                                <?php    
                                } ?> 
                            </tbody>
                        </table>

                                <label class="">EKG</label><br>
                                <textarea rows="3" cols="87" readonly style="margin-left: 3%; ">
                                </textarea><br><br>

                                <label>Rx de Torax</label><br>
                                <textarea rows="3" cols="88" readonly style="margin-left: 3%;">
                                </textarea> 
                <?php } 
                else{//si la variable fue recibida, es porque se recibio una fecha especifica para revisar los valores paraclinicos
                    echo "Ver la fecha xx/xx7XXXX del valor paraclinico";

                }?>
                </div>
            </section>
        </div>

        <footer style=" background-color: ; position: relative; ">
            <div style="background-color:; bottom: 0pt; margin-left: 30%; position: absolute;">
                <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela (+58) 0424-516.59.38</p>
            </div> 
        </footer>
    