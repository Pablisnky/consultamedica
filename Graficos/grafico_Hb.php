<?php
    session_start(); 

    include("../conexion/Conexion_BD.php");
    mysqli_query($conexion,"SET NAMES 'utf8' ");

    $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION

    $Paciente= $_SESSION["cedulaIdentidad"];
     echo "<br>";
     echo "CI paciente: " . $Paciente . "<br>";

    //se recibe el ID del valor paraclinico, el ultimo registro desde HistoriasClinicas.php y desde grafico_xx.php
    //$UltimoVP= $_GET["ID_VP"];
    // echo $UltimoVP . "<br>";
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/>
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png"> 
     
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    
    </head>
    <body>
        <div class="Principal" style="background-color:">           
            <header class="fixed_1">
                <?php
                    include("../header/headerDoctor_2.php");
                ?>
            </header>

            <section style="margin-top: 10%;"> 
                    <div  id="" class=""  style="background-color:;">
                        <?php
                            $Consulta="SELECT * FROM valores_paraclinicos INNER JOIN pacientes_registrados ON valores_paraclinicos.CedulaPaciente=pacientes_registrados.cedula_pacient WHERE pacientes_registrados.cedula_pacient ='$Paciente'";
                            $Recordset = mysqli_query($conexion,$Consulta);          
                            $paciente= mysqli_fetch_array($Recordset);
                        ?>
                        <fieldset style="border-radius: 15px; padding: 0% 5%; width: 57%; margin: auto;">
                            <legend>Paciente</legend>
                            <label>Nombre
                            <input style="margin-bottom: 1.5%;" type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $paciente["nombre_pacient"];?>"> 
                            </label>
                            
                            <label>Apellido
                            <input style="margin-bottom: 1.5%;"  class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $paciente["apellido_pacient"];?>">
                            </label>
                            
                            <label>Cedula
                            <input style="margin-bottom: 1.5%; width: 140px;"  type="text" name="cedula_Paciente" value="<?php echo $paciente["cedula_pacient"];?>">
                            </label>
                        </fieldset>
                    </div>
                    <div style="background-color: ; margin-top: 1%;  display: flex; justify-content: center; ">
                        <a style="background-color: ; margin-right: 6%;  width: 20%;  font-size: 13px; text-align: center;" href="../Sesiones_Cookies/HistoriasClinicas.php?cedula_pacient=<?php echo $paciente['cedula_Identidad']; ?>">inicio</a>

                                     
                        <a style="background-color: ;  font-size: 13px;width: 20%;  text-align: center;" href="javascript:history.back(-1);" title="Ir la página anterior">DatosParaclinicos</a><!-- history.back devuelve a la página anterior-->
                    </div>
                <h3>Hb gr/dl</h3>       
</section>
</div>
<div style="background-color:; margin-top: 0%; width: 100%; height: 50%;" >
    <canvas style="background-color:; width: 30%; height: 0%;" id="speedChart"></canvas>
</div>
<script>
    var speedCanvas = document.getElementById("speedChart");

    //Chart.defaults.global.defaultFontFamily = "Lato";
    //Chart.defaults.global.defaultFontSize = 18;

    var datosRecolectados = {
        //labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],//eje X,//Para trabajar con datos guardados en archivo no en BD
        labels:[
            <?php
            //consulta para realizar el grafico, selecciona los valores del grafico en el eje X
             $Consulta_2="SELECT * FROM valores_paraclinicos WHERE ID_Doctor ='$sesion' AND CedulaPaciente ='$Paciente' ORDER BY Fecha ASC";

            $Recordset_2= mysqli_query($conexion,$Consulta_2);
            while($Resultado_2= mysqli_fetch_array($Recordset_2)){

            //se cambia el formato de la fecha
            $fechaFormatoMySQL = $Resultado_2["Fecha"];//se obtiene la fecha en formato MySQL
            $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha d-m-Y
            // echo $fechaFormatoPHP; 
                        
            ?> //se cierra php porque los datos que recibe label de chrt.js son cadenas de texto

            '<?php echo $fechaFormatoPHP ;?>',//esta cadena es la que aparece en el grafico
            <?php } ?>
        ],
        datasets: [{
        //label: "Car Speed (mph)",//Para trabajar con datos guardados en archivo no en BD
        label: "Hb paciente ",
        //data: [0, 59, 75, 20, 20, 55, 40],//eje Y, //Para trabajar con datos guardados en archivo no en BD
        data: [
            <?php
            //consulta para realizar el grafico, selecciona los valores del grafico en el eje X
             $Consulta_3="SELECT * FROM valores_paraclinicos WHERE ID_Doctor ='$sesion' AND CedulaPaciente ='$Paciente' ORDER BY Fecha ASC";

            $Recordset_3= mysqli_query($conexion,$Consulta_3);
            while($Resultado_3= mysqli_fetch_array($Recordset_3)){

            ?> //se cierra php porque los datos que recibe label de chrt.js son cadenas de texto

            "<?php echo $Resultado_3['Hb'];?>",//esta cadena es la que aparece en el grafico
            <?php } ?>]
        },
        {
            label: "Hb max",
            data:[
            <?php
            //consulta para realizar el grafico, selecciona los valores del grafico en el eje X
             $Consulta_4="SELECT Hbmax FROM valores_paraclinicos WHERE ID_Doctor ='$sesion' AND CedulaPaciente ='$Paciente'";

            $Recordset_4= mysqli_query($conexion,$Consulta_4);
            while($Resultado_4= mysqli_fetch_array($Recordset_4)){

            ?> //se cierra php porque los datos que recibe label de chrt.js son cadenas de texto

            "<?php echo $Resultado_4['Hbmax'];?>",//esta cadena es la que aparece en el grafico
            <?php } ?>],
            lineTension: 0.3,
            fill:false,
            pointRadius:false,
            borderColor:'red',
            backgroundColor:'rgba(248, 6, 13,0.4)',
            borderWidth:0.5,
        },
        {
            label: "Hb min",
            data: [
            <?php
            //consulta para realizar el grafico, selecciona los valores del grafico en el eje X
             $Consulta_5="SELECT Hbmin FROM valores_paraclinicos WHERE ID_Doctor ='$sesion' AND CedulaPaciente ='$Paciente'";

            $Recordset_5= mysqli_query($conexion,$Consulta_5);
            while($Resultado_5= mysqli_fetch_array($Recordset_5)){

            ?> //se cierra php porque los datos que recibe label de chrt.js son cadenas de texto

            "<?php echo $Resultado_5['Hbmin'];?>",//esta cadena es la que aparece en el grafico
            <?php } ?>],
            fill:false,
            pointRadius:false,
            borderColor:'orange',
            backgroundColor:'rgba(255,165,0,0.4)',
            borderWidth:0.5,
        }
        ]
    };

    var chartOptions = {
      legend: {
        display: true,
        position: 'top',
        labels: {
          boxWidth: 80,
          fontColor: 'black'
        }
      }
    };

    var lineChart = new Chart(speedCanvas, {
      type: 'line',
      data: datosRecolectados,
      options: chartOptions
    });

</script>
            <footer style=" background-color: ; position: relative; margin-top: 7%; ">
                <div style="background-color: ; bottom: 0pt;margin-left: 30%; position: absolute;">
                    <p class="p_2">Sitio web desarrollado por Pablo Cabeza, San Felipe_Yaracuy_Venezuela (+58) 0424-516.59.38</p>
                </div> 
            </footer> 