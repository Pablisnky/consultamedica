<?php   
//Aparecen las tablas donde se especifican los pacientes que se veran el dia de hoy y cualquier otro dia que se desee consultar
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    /*$verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica*/

    //Oculta todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);

    if(!isset($_SESSION["UsuarioPaciente"])){//sino esta declarada la variable $_SESSION devuelve a DoctorAfiliado.php, con esto se garantiza que se hizo login, esta $_SESSION se creó en validarSesion.php
        header("location:../DoctorAfiliado.php");           
    }
    else{
        //aqui se almacena el ID_Paciente que se obtuvo en validarSesion.php
        $sesion= $_SESSION["UsuarioPaciente"];
        //echo "<p>ID_Paciente=  $sesion</p>";
            
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
        <script type="text/javascript">
            //Ajusta el texto del texarea donde van los medicamentos
            function resize_1(){
                var text = document.getElementById('Medicamentos');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }

            //Ajusta el texto del texarea donde van la posología
            function resize_2(){
                var text = document.getElementById('Posologia');
                    text.style.height = 'auto';
                    text.style.height = text.scrollHeight+'px';
            }
        </script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');

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
                    font-size: 14px;
                }
                td:before{
                    background-color: ;
                    font-size: 14px;
                    position: absolute;
                    top: 0;
                    left: 6px;
                    padding-right: 5px;
                    white-space: nowrap;
                }
                td:nth-of-type(1):before {content: "---";background-color:#bcbeda; width: 94%;}
                td:nth-of-type(2):before { content: "Fecha"; }
                td:nth-of-type(3):before { content: "Prescrito por"; }
                td:nth-of-type(4):before { content: "Medicamentos"; }
                td:nth-of-type(5):before { content: "Posología"; }

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
    <body onload=" resize_2();">
        <header class="fixed_1" >
            <?php
                include("../header/headerPaciente.php")
            ?>      
        </header>
        <!--en este contenedor se hace click y se oculta el menu responsive-->
        <div class="Principal" onclick="ocultarMenu()">
            <section> 
                <h3 class="encabezadoSesion_1">Mis tratamientos</h3>     
                    <div class="tratamiento_1" style="overflow-x:hidden">
                        <?php
                        //se hace una consulta para obtener los tratamientos vigentes del paciente. 
                            $Consulta_2="SELECT * FROM diagnostico INNER JOIN doctores ON diagnostico.ID_Doctor=doctores.ID_Doctor WHERE cedula_Paciente = '$Cedula' ORDER BY fecha DESC ";
                            $Recordset_2 = mysqli_query($conexion,$Consulta_2);
                            if(mysqli_num_rows($Recordset_2) != 0){ ?>
                        <table class="tabla_1" border="0px" >
                            <thead class="tabla_3">
                                <tr>
                                    <th class="textoCelda_0" style="height: 3px;"></th>
                                    <th class="textoCelda_2">FECHA</th>
                                    <th class="textoCelda_2">PRESCRITO POR</th>                                
                                    <th class="textoCelda_1A">MEDICAMENTOS</th>                                
                                    <th class="textoCelda_1A">POSOLOGÍA</th>
                                </tr>
                            </thead>
                        <?php
                            $i = 1;
                                                       
                                while($datosCita= mysqli_fetch_array($Recordset_2)){                       

                                    //se cambia el formato de la fecha
                                    $fechaFormatoMySQL = $datosCita["fecha"];//se obtiene la fecha en formato MySQL
                                    $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
                                    //echo $fechaFormatoPHP;
                                                ?>
                                    <tbody class="buscar_2">
                                    <tr class="tabla_5"> 
                                        <td class="" style=" color: black; height: 5px;"><?php echo $i;?></td>
                                        <td class="textoCelda_4"  style="color: black;line-height: 30px;"><span class="textoCelda_6"><?php echo $fechaFormatoPHP;?></span></td>
                                        <td class="textoCelda_4" ><span class="textoCelda_6">
                                            <?php
                                            if($datosCita["sexo"] == "F"){//femenino
                                                    ?>
                                                    <?php echo 'Dra. ' . $datosCita["nombre_doctor"] . ' ' . $datosCita["apellido_doctor"];?>
                                                <?php            
                                            } 
                                            else if($datosCita["sexo"] == "M"){ //Masculino 
                                                ?>  
                                                 <?php echo 'Dr. ' . $datosCita["nombre_doctor"] . ' ' . $datosCita["apellido_doctor"];?>
                                                <?php   
                                            }
                                            else if($datosCita["sexo"] == ""){ //No especificó
                                                ?>
                                                <?php echo $datosCita["nombre_doctor"] . ' ' . $datosCita["apellido_doctor"];?>
                                                <?php 
                                            }      
                                                    ?>
                                        </span></td>
                                        <td><textarea  class="textoCelda_5" id="Medicamentos" style="background-color:#F4FCFB ; border: none;" rows="3" readonly="readonly"><?php echo $datosCita["tratamiento_1"] . "\r\n" . "\n" . $datosCita["recibeTratamiento_1"] . "\r\n" . "\n" .  $datosCita["tratamiento_2"] . "\r\n" . "\n" . $datosCita["recibeTratamiento_2"] ;?></textarea> </td>

                                        <td><textarea  class="textoCelda_5" id="Posologia" style="background-color: #F4FCFB; border: none;" rows="3" readonly="readonly"><?php echo $datosCita["posologia"];?></textarea> </td>
                                     </tr> 
                                    </tbody>       
                                    <?php 
                                    $i++; 
                                }?></table>
                                <?php
                            }
                                
                                else{

                                echo "<p class='Inicio_15'>No tiene tratamientos  en curso actualmente.</p>";
                                    
                                } 
                             

                                   ?>
                           
                    </div>
                </section>
            </div>
    </body>
    </html>

