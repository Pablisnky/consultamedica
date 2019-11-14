<?php
    //Se verifica si se realizó login para entrar en este  archivo
    include("../Clases/VerificaDr.php");
    //datos de configuracion para acceder al servidor de base de datos
    include("../conexion/Conexion_BD.php");
    //
    include("../Clases/muestraError.php");
    //Se busca que tipo de plan tienen el Dr.
    include("../Clases/planAfiliado.php");
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
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 1000px)" href="../css/MediaQuery_CitasMedicas_Tablet.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script>  
        <script src="../Javascript/CalendarioJQwery_2.js"></script>
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/ajaxBuscador.js"></script>
    </head>     
    <body> 
        <div>
            <header class="fixed_1">
                <?php
                    include("../header/headerDoctor.php");
                ?>            
            </header>
            <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->  
                <h3 class="encabezadoSesion_1">Pacientes con citas</h3> 

                <div>
                    <?php
                        include("../Clases/buscaPacienteConCita.php");
                    ?>
                </div>

                <article>
                    <p class="ocultar" style="text-align: center; margin-bottom: 4%;margin-top: 8%;"><b>Pacientes citados para hoy</b></p><!--Oculto en resolucion computador-->

                    <div class="sesion_1">
                        <p class="ocultar_1" style="text-align: center; margin-bottom: 8%;"><b>Pacientes citados para hoy</b></p><!--Oculto en responsive-->
                        <table class="tabla_1" border="1px">
                            <tr >
                                <th></th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>CEDULA</th>
                                <th>EDAD</th>
                                <th>TELEFONO</th>
                                <th>TURNO</th>
                            </tr>
                            <?php
                                $i = 1;
                                //consulta para saber quienes son los pacientes registrados con el Dr. que tienen cita para el dia de hoy
                                $Consulta_4="SELECT * FROM citas WHERE fecha=curdate() AND ID_Doctor = '$sesion' AND cedula_Identidad IN (SELECT cedula_pacient FROM pacientes_registrados INNER JOIN doctores_pacientesregistrados ON pacientes_registrados.ID_PR=doctores_pacientesregistrados.ID_PR WHERE ID_Doctor = '$sesion')";
                                $Recordset_4 = mysqli_query($conexion,$Consulta_4); 
                                if(mysqli_num_rows($Recordset_4) != 0){ 
                                    while($TablaVirtual= mysqli_fetch_array($Recordset_4)){
                                        $CedulaRegistrados= $TablaVirtual["cedula_Identidad"];
                                        //echo "Las cedulas son: " . $CedulaRegistrados;
                                        if($Plan == "Ini"){
                                            $Enviar_1="HistoriasClinicas.php?cedula_pacient=$CedulaRegistrados";
                                        }
                                        else if($Plan == "Bas"){
                                            $Enviar_1 ="HistoriasClinicas.php?cedula_pacient=$CedulaRegistrados";
                                        }
                                        else if($Plan == "Esp"){
                                            $Enviar_1 ="HistoriasClinicas.php?cedula_pacient=$CedulaRegistrados";        
                                        }
                                        ?>
                                        <tr>    
                                            <td class="a1"><?php echo $i;?></td>
                                            <td class="a2"><a class="a2a" href="<?php echo $Enviar_1;?>"><?php echo $TablaVirtual["nombre"];?></a></td>
                                            <td class="a2"><a class="a2a" href="<?php echo $Enviar_1;?>"><?php echo $TablaVirtual["apellido"] ; ?></a></td>
                                            <td class="a6"><a class="a2a" href="<?php echo $Enviar_1;?>"><?php echo $TablaVirtual["cedula_Identidad"] ;?></a></td>
                                            <td class="a5"><a class="a2a" href="<?php echo $Enviar_1;?>"><?php echo $TablaVirtual["edad"] ;?></a></td>
                                            <td class="a7"><a class="a2a" href="<?php echo $Enviar_1;?>"><?php echo $TablaVirtual["telefono"]  . "<br>" ;?></a></td>
                                            <td class="a6"><a class="a2a" href="<?php echo $Enviar_1;?>"><?php echo $TablaVirtual["turno"] ;?></a></td>   
                                        </tr>        
                                            <?php 
                                            $i++; 
                                    } 
                                } 
                                         
                                //Consulta para saber quienes son los pacientes para el dia de hoy que no estan registrados con el doctor
                                $i = $i++ ;//variable para enumerar la lista de pacientes en la tabla, comenzara en Nº 1
                                $Consulta= "SELECT * FROM citas WHERE fecha=curdate()  AND ID_Doctor = '$sesion' AND cedula_Identidad NOT IN (SELECT cedula_pacient FROM pacientes_registrados INNER JOIN doctores_pacientesregistrados ON pacientes_registrados.ID_PR=doctores_pacientesregistrados.ID_PR WHERE ID_Doctor = '$sesion')";
                                $Resulset = mysqli_query($conexion,$Consulta);
                                if(mysqli_num_rows($Resulset) != 0){ 
                                //Se consulta los pacientes que se tienen para el dia de hoy -->
                                    while($ConsultaDiaria= mysqli_fetch_array($Resulset)){ 
                                       $ConCitas[]=$Consulta;//Se guardan todos los números de cedula en un array.
                                       // echo $ConCitas  . "<br>";
                                        ?>
                                        <tr>           
                                            <td class="a1a"><?php echo $i;?></td>
                                            <td class="a2"><?php echo $ConsultaDiaria["nombre"];?></td>
                                            <td class="a2"><?php echo $ConsultaDiaria["apellido"] ; ?></td>
                                            <td class="a6"><?php echo $ConsultaDiaria["cedula_Identidad"] ;?></td>
                                            <td class="a5a"><?php echo $ConsultaDiaria["edad"] ;?></td>
                                            <td class="a7"><?php echo $ConsultaDiaria["telefono"]  . "<br>" ;?></td> 
                                            <td class="a6"><?php echo $ConsultaDiaria["turno"] ;?></td>  
                                        </tr>        
                                        <?php 
                                        $i++; 
                                    } 
                                } ?>
                        </table><?php
                        //Consulta para saber sino hay pacientes para el dia de hoy 
                        $Consulta= "SELECT * FROM citas WHERE fecha=curdate() AND ID_Doctor = '$sesion'";
                        $Resulset_2 = mysqli_query($conexion,$Consulta);  
                        if(mysqli_num_rows($Resulset_2)==0){                                    
                            echo "<p class='Inicio_15_A'>No hay pacientes registrados para hoy.</p>";             
                        }  ?>
                    </div>
                </article>

                <article>
                    <div class="sesion_2">
                        <p class= "sesion_3"><b>Pacientes en proximas fechas</b></p>
                        <input type="text"  id="Calendario_CM2" name="fechaCita2" placeholder="Introduzca una fecha" tabindex="7" style="margin-left: auto; margin-right: auto; display: block; width: 50%; font-size: 14px; " onchange="llamar_fechas()"><!--llamar_fechas() se encuentra en Ajax_Cancelar.js-->  
                    </div> 
                </article>

                <article>
                        <?php
                            include("../Clases/graficoPacienteDiario.php");
                        ?>
                </article>  
            </div>
            <footer style="clear: right;">
                <?php
                    include("../header/footer.php");
                ?>
            </footer>
        </div>
    </body>
</html>

