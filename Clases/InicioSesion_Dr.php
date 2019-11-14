<?php  
    session_start();  //Se reaunada la sesion abierta en validarSesion.php
    /*$verifica = 1906;  
    $_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica*/

    //Muestra todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);
    
    if(!isset($_SESSION["UsuarioDoct"])){//sino esta declarada la variable $_SESSION devuelve a DoctorAfiliado.php, con esto se garantiza que se hizo login, esta $_SESSION se creó en validarSesion.php
        header("location:../ingresar.php");           
    }else
    {
        $sesion=$_SESSION["UsuarioDoct"];//aqui se almacena el ID_Doctor en $sesion
        //echo "ID_Doctor= " . $sesion;
            
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
        <link rel="stylesheet" type="text/css" media="(max-width: 325px)" href="../css/MediaQuery_CitasMedicas.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 326px) and (max-width: 550px)" href="../css/MediaQuery_CitasMedicas_movilModerno.css"/>
        <link rel="stylesheet" type="text/css" media="(min-width: 551px) and (max-width: 750px)" href="../css/MediaQuery_CitasMedicas_TabletCanaima.css"/> 
        <link rel="stylesheet" type="text/css" media="(min-width: 1001px) and (max-width: 1300px)" href="../css/MediaQuery_CitasMedicas_1280px.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script>  
        <script src="../Javascript/CalendarioJQwery_2.js"></script>
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="../Javascript/Funciones_varias.js"></script>
        <script src="../Javascript/ajaxBuscador.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:700');
        
            .a2:hover{
                color: white;
            }
            tr:hover{
                background-color:#BEBFDD; 
            }
        </style>         
    </head>     
    <body style="height: 86%"> 
        <div style=" min-height: 85%;">
            <header class="fixed_1">
                <?php
                    include("../vista/headerDoctor.php")
                ?>            
            </header>
            <div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->  
                <h3 class="encabezadoSesion_1">Pacientes con citas</h3>  
                <div>
                    <form>                               
                        <br class="ocultar">
                        <label class="etiqueta_21 ocultar_2">Nombre</label>
                        <input class="etiqueta_22 ocultar_2" type="text" onkeyup="llamar_CitaNombre(this.value)"><!--llamar_CitaNombre esta en ajaxBuscador.js-->
                        <label class="etiqueta_21 ocultar_2">Apellido</label>
                        <input class="etiqueta_22 ocultar_2" type="text" onkeyup="llamar_CitaApellido(this.value)"><!--llamar_Apellido esta en ajaxBuscador.js-->
                        <label class="etiqueta_21 alinear">Cedula</label>
                        <input class="etiqueta_22" type="text" id="Cedula">
                        <input class="etiqueta_29" type="button" value="Buscar" onclick="llamar_CitaCedula(this.value)"><!--llamar_Cedula esta en ajaxBuscador.js-->                        
                    </form>
                    <div id="carga_3"></div><!-- Recibe la respuesta de las busuqedas solicitas por medio de las funciones llamar_CitaCedula(); llamar_CitaNombre(); llamar_CitaApellido-->
                    <hr style=" background-color: #040652; margin-bottom: 1%; margin-top: 1%; height: 1px;">
                    <input type="text" id="Especialista" hidden value="<?php echo $sesion; ?>">
                </div>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
                    
                    <p class="ocultar" style="background-color: ; text-align: center; margin-bottom: 4%;margin-top: 8%;"><b>Pacientes citados para hoy</b></p><!--Oculto en resolucion computador-->
                    <div class="sesion_1">
                    <p class="ocultar_1" style="background-color: ; text-align: center; margin-bottom: 8%;"><b>Pacientes citados para hoy</b></p><!--Oculto en responsive-->
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
                                ?>
                                <tr>    
                                    <td class="a1"><?php echo $i;?></td>
                                    <td class="a2"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["nombre"];?></a></td>
                                    <td class="a2"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["apellido"] ; ?></a></td>
                                    <td class="a6"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["cedula_Identidad"] ;?></a></td>
                                    <td class="a5"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["edad"] ;?></a></td>
                                    <td class="a7"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["telefono"]  . "<br>" ;?></a></td>
                                    <td class="a6"><?php echo '<a class="a2a" href="HistoriasClinicas_Basico.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["turno"] ;?></a></td>   
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
                                           <!-- <td style="padding:10px"><?php //echo $ConsultaDiaria["ID_Paciente"];?></td>-->
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
                            }?>
                            </table><?php
                                //Consulta para saber sino hay pacientes para el dia de hoy 
                                $Consulta= "SELECT * FROM citas WHERE fecha=curdate() AND ID_Doctor = '$sesion'";
                                $Resulset_2 = mysqli_query($conexion,$Consulta);  
                            if(mysqli_num_rows($Resulset_2)==0){                                    
                                    echo "<p class='Inicio_15_A'>No hay pacientes registrados para hoy.</p>";             
                                }         
                            ?>
                    </div>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
               
                    <div class="sesion_2">

                        <p class= "sesion_3"><b>Pacientes en proximas fechas</b></p>

                        <input type="text"  id="Calendario_CM2" name="fechaCita2" placeholder="Introduzca una fecha" tabindex="7" style="margin-left: auto; margin-right: auto; display: block; width: 50%; font-size: 14px; " onchange="llamar_fechas()"><!--llamar_fechas() se encuentra en Ajax_Cancelar.js-->  
                    </div> 

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

                    <div id="MostrarFechas" onclick="location.reload(false);"><!--Muestra la tabla de pacientes para la fecha seleccionada, viene de Fechas_Consultas.php tambien muestra el grafico--> 

                        <canvas id="carga"></canvas>
                        <script>
                            var ctx = document.getElementById("carga").getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    //labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado","Domingo"],
                                        labels:[
                                              <?php
                                          //consulta para realizar el grafico, selecciona los valores del grafico en el eje X
                                            $Consulta_2="SELECT COUNT(*) AS 'TotalPacientesPorDia', fecha FROM citas WHERE ID_Doctor=$sesion AND fecha BETWEEN curdate() AND DATE_ADD(NOW(), INTERVAL 10 DAY) GROUP BY fecha";
                                            $Recordset_2= mysqli_query($conexion,$Consulta_2);
                                            while($Resultado_2= mysqli_fetch_array($Recordset_2)){

                                            //se cambia el formato de la fecha
                                            $fechaFormatoMySQL_2 = $Resultado_2["fecha"];//se obtiene la fecha en formato MySQL
                                            $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL_2));//se cambia el formato a d-m-y 
                                            
                                        ?> //se cierra php porque los datos que recibe label de chrt.js son cadenas de texto

                                        '<?php echo $fechaFormatoPHP ;?>',//esta cadena es la que aparece en el grafico
                                        <?php } ?>
                                    ],
                                datasets: [{
                                    label: ' Pacientes',
                                    //data: [12, 19, 3, 5, 2, 3, 8],//datos para utilizarlos sin conexion a BD
                                    data:[
                                        //consulta para realizar el grafico, selecciona los valores del grafico en el eje Y
                                        <?php
                                            $Consulta_3="SELECT COUNT(*) AS 'PacientePorDia', fecha FROM citas WHERE ID_Doctor=$sesion AND fecha BETWEEN curdate() AND DATE_ADD(NOW(), INTERVAL 10 DAY) GROUP BY fecha";
                                            $Recordset_3= mysqli_query($conexion,$Consulta_3);
                                            while($Resultado_3= mysqli_fetch_array($Recordset_3)){
                                            
                                        ?> //se cierra php porque los datos que recibe lable de chrt.js son cadenas de texto

                                        '<?php echo $Resultado_3['PacientePorDia'];?>',//esta cadena es la que aparece en el grafico
                                        <?php } ?>

                                    ],
                                    backgroundColor: [
                                        'rgba(54, 99, 132, 0.2)',
                                        'rgba(54, 99, 132, 0.2)',
                                        'rgba(54, 99, 132, 0.2)',
                                        'rgba(54, 99, 132, 0.2)',
                                        'rgba(54, 99, 132, 0.2)',
                                        'rgba(54, 99, 132, 0.2)',
                                        'rgba(54, 99, 132, 0.2)',
                                        'rgba(54, 99, 132, 0.2)',
                                        'rgba(54, 99, 132, 0.2)',
                                        'rgba(54, 99, 132, 0.2)',
                                    ],
                                    borderColor: [
                                        'rgba(54,99,132,1)',
                                        'rgba(54,99,132, 1)',
                                        'rgba(54,99,132, 1)',
                                        'rgba(54,99,132,1)',
                                        'rgba(54,99,132, 1)',
                                        'rgba(54,99,132, 1)',
                                        'rgba(54,99,132, 1)',
                                        'rgba(54,99,132,1)',
                                        'rgba(54, 99,132, 1)',
                                        'rgba(54,99,132, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                            });
                        </script>
                    </div>
            </div>       
        </div>
        <footer>
            <?php
                include("../vista/footer.php");
            ?>
        </footer>
    </body>
</html>

