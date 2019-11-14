<?php   
session_start();  
$verifica = 1906;  
$_SESSION["verifica"] = $verifica;  //se crea una sesion llamada verifica
?> 


<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Historia Clinica Digital</title>
		<meta charset="utf-8"/>
		<meta name="description" content="Reporte de indicadores de gestion del consultorio"/>
		<meta name="keywords" content="gerencia, indicadores, consultorio, pacientes,estadisticas"/>
		<meta name="author" content="Pablo Cabeza"/>
        
		<link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../Javascript/CalendarioJQwery.js"></script> 
        <script src="../Javascript/Ajax_Cancelar.js"></script>
        <script src="../Javascript/MunicipiosBusqueda.js"></script> 
        <script src="../Javascript/parroquiasBusqueda.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400');
        </style>    
        <?php
            if(!isset($_SESSION["UsuarioDoct"])){//sino hay nada almacenado en la variable superglobal $_SESSION devuelve a DoctorAfiliado.php
                header("location:../DoctorAfiliado.php");           
           }
               // echo ($_SESSION["UsuarioDoct"]);
                include("../conexion/Conexion_BD.php");
                mysqli_query($conexion,"SET NAMES 'utf8' ");
                $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION

                $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
                $UsDoctor= mysqli_fetch_row($NombreDoctor);
                $UsDoctor[1]; //se obtiene el nombre del doctor.
            ?>  
    </head>	    
    <body onload="llamar_GraficoDefecto()"><!--la funcion lamar_GraficoDefecto se encuentra en ajaxBuscador.js-->
        <div class="Principal">
            <header class="fixed_1" >
                <div style="width: 75%; float: left; border-right-color: white; border-right-style: solid;border-right-width: 1px; box-sizing: border-box;">
                    <h1 style="cursor: default; font-size: 3vw; height: 60%; padding: 1% 0%; box-sizing: border-box; text-align: center; padding-left: 2%">ConsultaMedica.com.ve</h1>
                </div>
                <div style="float: right;  width: 25%;">
                    <?php
                        //Consulta para para colocar el nombre y apellido del Dr que abre sesión
                        $consulta_1="SELECT nombre_doctor, apellido_doctor, sexo FROM doctores WHERE ID_Doctor= '$sesion' ";
                        $Recordset_1=mysqli_query($conexion,$consulta_1);
                        $Doctor_Datos= mysqli_fetch_array($Recordset_1);
                            if($Doctor_Datos["sexo"] == "F"){//femenino
                    ?>
                            <input class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="Dra. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                <?php }
                                else if($Doctor_Datos["sexo"] == "M"){ //Masculino 
                                ?>  
                                    <input class="usuarioDoctor" readonly="readonly" type="text" required name="NombreDoctor" value="Dr. <?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php }
                                else if($Doctor_Datos["sexo"] == ""){ //No especificó
                                ?>
                                <input  class="usuarioDoctor" readonly="readonly" type="text" name="NombreDoctor" value="<?php echo $Doctor_Datos['nombre_doctor'] . ' ' . $Doctor_Datos['apellido_doctor'] ;?>">
                                    <?php } 
                            
                    ?>
                </div>
                <nav class="n41">
                    <div class="n44"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="InicioSesion_Basico.php" >Consulta</a></div>
                    <div class="n44"><a href="RegistroPacientes_Basico.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="ReporteMensual_Basico.php" class="activa">Morbilidad</a></div>   
                    <div class="n44"><a href="mostrarPerfilDoctor_Basico.php">Mi perfil</a></div>             
                </nav>
            </header> 

            <section style="margin-top: 10%;">
                <!--<h3 style="margin-bottom: 2.5%;">Estadisticas del Consultorio</h3>-->
                <br>
            
                <div id="carga" style="background-color:; float: left; padding-left: 7%; box-sizing: border-box; width: 50%; margin-top: 9%;">
                  <!--Muestra el resultado de la busqueda-->
                  <!--la busqueda reemplaza el contenido del DIV id="carga"-->

<canvas style="background-color:; margin-top: -25%;" id="myChart" width="50%" height="45%;"></canvas>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        //labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado","Domingo"],
            labels:[
                  <?php
                    $Consulta_2="SELECT COUNT(*) AS 'Total pacientes por dia', fecha FROM pacientes WHERE ID_Doctor=3 AND fecha BETWEEN '2018-02-12' AND '2018-02-16' GROUP BY fecha";
                    $Recordset_2= mysqli_query($conexion,$Consulta_2);
                    while($Resultado_2= mysqli_fetch_array($Recordset_2)){
                    
                ?> //se cierra php porque los datos que recibe lable de chrt.js son cadenas de texto

                '<?php echo $Resultado_2['fecha'];?>',//esta cadena es la que aparece en el grafico
                <?php } ?>
            ],
        datasets: [{
            label: ' Pacientes proximos 10 dias',
            //data: [12, 19, 3, 5, 2, 3, 8],//datos para utilizarlos sin conexion a BD
            data:[
                <?php
                $Consulta_3="SELECT COUNT(*) AS 'TotalPacientes', fecha FROM pacientes WHERE ID_Doctor=3 AND fecha BETWEEN '2018-02-12' AND '2018-02-16' GROUP BY fecha";
                $Recordset_3= mysqli_query($conexion,$Consulta_3);
                    while($Resultado_3= mysqli_fetch_array($Recordset_3)){
                    
                ?> //se cierra php porque los datos que recibe lable de chrt.js son cadenas de texto

                '<?php echo $Resultado_3['TotalPacientes'];?>',//esta cadena es la que aparece en el grafico
                <?php } ?>

            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 180, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 159, 64, 1)'
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
            
                <div style="background-color: ; width: 50%; float: right; box-sizing: border-box; margin-bottom: 10%; margin-top: 3%; ">      
                    <p style="text-align: center; margin-bottom: 3%;" class="Inicio_1">Buscador</p>
                    <p style="background-color:;margin-bottom: 3%;  text-align: center;">Seleccione uno o varios patrones para realizar la busqueda</p>

                    <div style="background-color: ; width: 50%; margin: auto;  margin-bottom: 3%;  padding: auto; background-color: "  >
                        <form>
                            <fieldset style="background-color: ; border-radius: 15px; width: 100%;margin: auto; padding: 2% 1%;">
                                <label style="width: 35%; margin-left: 2%;  float: left;  background-color:; ">Diagnostico</label>
                                <input style="margin-bottom: 1.5%; width: 57.5%" type="" readonly="readonly" placeholder="No disponible"  name="diagnostico" id="Diagnostico"><br>
                                <label style="width: 35%; margin-left: 2%;  float: left;  background-color: ">Estado</label>
                                <select name="estado" id="Estado" style="margin-bottom: 1.3%; height: 25px; width: 58.5%;" onchange="SeleccionarMunicipio(this.form)"> 
                                            <option value=""></option>
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
                                <label style="width: 35%; margin-left: 2%;  float: left;  background-color: ">Municipio</label>
                                <select name="municipio" id="Municipio" onchange="SeleccionarParroquia(this.form)" style="margin-bottom: 1.3%; height: 25px; width: 58.5%;"> 
                                    <option value=""></option>
                                </select>
                                <br>

                                <label style="width: 35%; margin-left: 2%; float: left;  background-color: ">Parroquia</label>
                                <select name="parroquia" id="Parroquia" style="margin-bottom: 1.3%; height: 25px; width: 58.5%;"> 
                                    <option value=""></option>
                                </select>

                                <label style="width: 35%; margin-left: 2%;  float: left;  background-color:; ">Edad</label>
                                <input style="margin-bottom: 1.5%; width: 57.5%" type="" readonly="readonly" placeholder="No disponible" name="edad" id="Edad"><br>

                                <label style="width: 35%; margin-left: 2%;  float: left;  background-color:; ">Sexo</label>
                                <select name="sexo" id="Sexo" style="margin-bottom: 1.3%; width: 58.5%; height: 25px;"> 
                                            <option value=""></option>
                                            <option>Femenino</option>
                                            <option>Masculino</option>
                                </select> 
                                <br>
                                <label style="width: 35%; margin-left: 2%;  float: left;  background-color: ;">Mes</label>
                                <select name="mes" id="Mes" style="margin-bottom: 1.3%; width: 58.5%; height: 25px;" onchange="SeleccionarMunicipio(this.form)"> 
                                            <option value="">no disponible</option>
                                            <option>Enero</option>
                                            <option>Febrero</option>
                                            <option>Marzo</option>
                                            <option>Abril</option>
                                            <option>Mayo</option>
                                            <option>Junio</option>
                                            <option>Julio</option>
                                            <option>Agosto</option>
                                            <option>Septiembre</option>
                                            <option>Octubre</option>
                                            <option>Noviembre</option>
                                            <option>Diciembre</option>
                                </select> 
                                 
                            </fieldset> 
                        </form>
                        <input type="text" id="Especialista" hidden value="<?php echo $sesion; ?>">
                    </div>

                    <div style="background-color:; margin: auto; width: 50%; margin-top: 1%; clear: right; display: flex; justify-content: center; ">
                        <a class="buttonCuatro" style="margin: auto; display: block; cursor: pointer;" onclick="llamar_buscador()">Buscar</a><!--llamar_buscador esta en Ajax_Cancelar.js-->
                        <a class="buttonCuatro" style="margin: auto; display: block;" href="javascript:history.go(0)">Limpiar</a>
                    </div>
                </div>
            </section>               
            
            <footer style=" background-color: ; height: 100px;  position: relative; ">
                <div style="background-color: ; bottom: 0pt; position: absolute; width: 100%;">
                    <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela (+58) 0424-516.59.38</p>
                </div> 
            </footer>
         
    </body>
</html>