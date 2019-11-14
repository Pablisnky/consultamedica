<?php   
//Aparecen las tablas donde se especifican los pacientes que se veran el dia de hoy y cualquier otro dia que se desee consultar
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
            include("../conexion/Conexion_BD.php");
            mysqli_query($conexion,"SET NAMES 'utf8'");


            $Consulta="SELECT * FROM usuario_doctor WHERE ID_Doctor='$sesion' ";
            $Resulset = mysqli_query($conexion,$Consulta);
            $UsDoctor= mysqli_fetch_row($Resulset);
            $UsDoctor["usuario_doctor"];  //Se obtiene el nombre del usuario doctor
        ?>

        <div class="Principal"> 
            <header class="fixed_1" >
                <div style=" background-color: yellow;"">
                    <div style=" background-color: yellow; width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                        <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%;  text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
                    </div>
                    <div style="background-color: red; float: right; box-sizing: border-box;  width: 25%;">
                        <?php
                            //Consulta para para colocar el nombre y apellido del Dr que abre sesión
                            $consulta_1="SELECT nombre_doctor, apellido_doctor, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                            $Recorset_1=mysqli_query($conexion,$consulta_1);
                            $Doctor_Datos= mysqli_fetch_array($Recorset_1);

                                if($Doctor_Datos["sexo"] == "F"){//femenino
                        ?>
                                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php } 
                                else if($Doctor_Datos["sexo"] == "M"){ //Masculino 
                                 ?>  
                                    <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }
                                else if($Doctor_Datos["sexo"] == ""){ //No especificó
                                ?>
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }                             
                        ?>
                    </div>
                </div>
                <nav class="n41">
                    <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="InicioSesion.php" class="activa">Consulta</a></div>
                    <div class="n44"><a href="RegistroPacientes.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual.php">Morbilidad</a></div>   
                    <div class="n44"><a href="HistoriasClinicas_2.php">HCD</a></div> 
                    <div class="n44"><a href="mostrarPerfilDoctor.php">Mi perfil</a></div>             
                </nav>
            </header>

            <section style="margin-top: 10%;"> 
                <h3 style="margin-bottom: 2.5%;">Pacientes con citas</h3>
                                <!-- <?php $UsDoctor["1"]= $_SESSION["NombreDoctor"]; //se cre una nueva sesion para almacenar el nombre del doctor y llevarlo a otras paginas del area privada de doctores.?> -->   
               
                <div class="sesion_1">
                    <p style="text-align: center;"><b>Pacientes para hoy</b></p>
                    <br>
                    <?php
                    $i = 1;
                            //se hace una consulta para saber quienes son los pacientes registrados con el Dr. que tienen cita para el dia de hoy
                            $Consulta_4="SELECT * FROM pacientes WHERE fecha=curdate() AND cedula_Identidad IN (SELECT cedula_pacient FROM pacientes_registrados WHERE ID_Doctor = '$sesion')";
                            $Recordset_4 = mysqli_query($conexion,$Consulta_4);                            
                    ?>
                      <table width="100%" border="1px" style="text-align: center; border-collapse: collapse; ">
                        <tr >
                           <!-- <th>ID_PACIENTE</th>-->
                            <th></th>
                            <th>FECHA</th>
                            <th>TURNO</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>CEDULA</th>
                            <th>EDAD</th>
                            <th>TELEFONO</th>
                        </tr>
                <?php
                          while($TablaVirtual= mysqli_fetch_array($Recordset_4)){
                                $CedulaRegistrados= $TablaVirtual["cedula_Identidad"];

                                //se cambia el formato de la fecha
                                $fechaFormatoMySQL = $TablaVirtual["fecha"];//se obtiene la fecha en formato MySQL
                                $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
                                ?>
                                <tr>    
                                   <!-- <td style="padding:10px"><?php //echo $ConsultaDiaria["ID_Paciente"];?></td>-->
                                    <td style="font-weight: bolder;"><?php echo $i;?></td>

                                    <td><a class="a2" href=""><?php echo $fechaFormatoPHP;?></a></td>
                                    <td><?php echo '<a class="a2" href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["turno"] ;?></a></td>
                                    <td><?php echo '<a class="a2" href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["nombre"];?></a></td>
                                    <td><?php echo '<a class="a2" href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["apellido"] ; ?></a></td>
                                    <td><?php echo '<a class="a2" href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["cedula_Identidad"] ;?></a></td>
                                    <td><?php echo '<a class="a2" href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["edad"] ;?></a></td>
                                    <td><?php echo '<a class="a2" href="HistoriasClinicas.php?cedula_pacient='.$CedulaRegistrados.'";>'?><?php echo $TablaVirtual["telefono"]  . "<br>" ;?></a></td>   
                                </tr>        
                                <?php 
                                $i++; } 
                             

                            //Consulta para saber quienes son los pacientes para el dia de hoy que no estan registrados con el doctor
                            $i = $i++ ;//variable para enumerar la lista de pacientes en la tabla, comenzara en Nº 1
                            $Consulta= "SELECT * FROM pacientes WHERE fecha=curdate() AND ID_Doctor='$sesion' AND cedula_Identidad NOT IN (SELECT cedula_pacient FROM pacientes_registrados WHERE ID_Doctor = '$sesion')";
                            $Resulset = mysqli_query($conexion,$Consulta);
                                   

                            //Se consulta los pacientes que se tienen para el dia de hoy -->
                          
                            if(!mysqli_num_rows($Resulset)==0){
                                while($ConsultaDiaria= mysqli_fetch_array($Resulset)){ 
                                   $ConCitas[]=$Consulta;//Se guardan todos los números de cedula en un array.
                                   // echo $ConCitas  . "<br>";

                                //se cambia el formato de la fecha
                                $fechaFormatoMySQL = $ConsultaDiaria["fecha"];//se obtiene la fecha en formato MySQL
                                $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
                                //echo $fechaFormatoPHP;
                                ?>
                                <tr>           
                                   <!-- <td style="padding:10px"><?php //echo $ConsultaDiaria["ID_Paciente"];?></td>-->
                                    <td style="font-weight: bolder;"><?php echo $i;?></td>
                                    <td><?php echo $fechaFormatoPHP;?></td>
                                    <td><?php echo $ConsultaDiaria["turno"] ;?></td>
                                    <td><?php echo $ConsultaDiaria["nombre"];?></td>
                                    <td><?php echo $ConsultaDiaria["apellido"] ; ?></td>
                                    <td><?php echo $ConsultaDiaria["cedula_Identidad"] ;?></td>
                                    <td><?php echo $ConsultaDiaria["edad"] ;?></td>
                                    <td><?php echo $ConsultaDiaria["telefono"]  . "<br>" ;?></td>   
                                </tr>        
                                <?php 
                                $i++; } 
                            }
                            else{
                                ?>
                                <tr>
                                    <td colspan="8" style="background-color: red; color: white;"><?php echo "<p>No hay pacientes registrados para el dia de hoy</p>";?></td>
                                </tr>
                        <?php    }?>         
                    </table>
  
                </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
        <div class="sesion_2">
            <input type="text"  id="Calendario_CM2" name="fechaCita2" value="" placeholder="Introduzca una fecha" tabindex="7" style="margin-left: auto; margin-right: auto; display: block; background-color:; " onchange="llamar_fechas()"><!--funcion que se encuentra en Ajax_Cancelar.js-->  
        </div> 

        <div id="MostrarFechas"  onclick="location.reload(false);"  ><!--Muestra la tabla de pacientes para la fecha seleccionada, viene de Fechas_Consultas.php tambien muestra el grafico--> 

<canvas style="background-color:; margin-top: 0%;" id="carga" width="35%" height="22%;"></canvas>

<script>
var ctx = document.getElementById("carga").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        //labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado","Domingo"],
            labels:[
                  <?php
                  //consulta para realizar el grafico, selecciona los valores del grafico en el eje X
                    $Consulta_2="SELECT COUNT(*) AS 'TotalPacientesPorDia', fecha FROM pacientes WHERE ID_Doctor=$sesion AND fecha BETWEEN '2018-03-31' AND '2018-04-12' GROUP BY fecha";
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
                    $Consulta_3="SELECT COUNT(*) AS 'PacientePorDia', fecha FROM pacientes WHERE ID_Doctor=$sesion AND fecha BETWEEN '2018-03-31' AND '2018-04-12' GROUP BY fecha";
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

        </section>  
        </div>       
        
            <footer style=" background-color: ; position: relative; margin-top: 40%;">
                <div style="background-color: ; bottom: 0pt;  position: absolute; width: 100%;">
                    <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela (+58) 0424-516.59.38</p>
                </div> 
            </footer> 
    </body>
</html>

