<?php
    session_start(); 

    include("../conexion/Conexion_BD.php");
    mysqli_query($conexion,"SET NAMES 'utf8' ");

    $sesion=$_SESSION["UsuarioDoct"];//Se introduce el ID_Doctor por medio de $_SESSION

    $Paciente= $_SESSION["cedulaIdentidad"];
    //echo $Paciente . "<br>";

    $NombreDoctor = mysqli_query($conexion,"SELECT * FROM doctores WHERE ID_Doctor='$sesion'");
                $UsDoctor= mysqli_fetch_row($NombreDoctor);
                $UsDoctor[1]; //se obtiene el nombre del doctor.
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" type="text/css" href="../css/EstilosCitasMedicas.css"/> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
     
    <script src="highcharts.js"></script>
    <script src="exporting.js"></script>
    <script src="jquery-3.2.1.js"></script>

    
    </head>
    <body>
            <div class="Principal" style="background-color:">
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
                    <div class="n44"><a href="../Sesiones_Cookies/CerrarSesion.php">Cerrar Sesión</a></div>
                    <div class="n44"><a href="../Sesiones_Cookies/InicioSesion.php" >Consulta</a></div>
                    <div class="n44"><a href="../Sesiones_Cookies/RegistroPacientes.php"> Mis pacientes</a></div>
                    <div class="n44"><a href="../Sesiones_Cookies/ReporteMensual.php">Estadisticas</a></div>   
                    <div class="n44"><a href="../Sesiones_Cookies/HistoriasClinicas_2.php" class="activa">HCD</a></div>              
                </nav>
            </header>

            <section style="margin-top: 10%;"> 
                <div  id="" class=""  style="background-color:;">
                    <?php
                        $Consulta="SELECT * FROM pacientes INNER JOIN historico_visitas ON pacientes.cedula_Identidad=historico_visitas.cedula_paciente WHERE cedula_Identidad ='$Paciente'";
                        $Resulset = mysqli_query($conexion,$Consulta);          
                        $paciente= mysqli_fetch_array($Resulset);
                    ?>
                        <fieldset style="border-radius: 15px; padding: 0% 5%; width: 57%; margin: auto;">
                            <legend>Paciente</legend>
                            <label>Nombre
                            <input style="margin-bottom: 1.5%;" type="text" name="nombre_Paciente" readonly="readonly"  id="NombrePaciente" value="<?php echo $paciente["nombre"];?>"> 
                            </label>
                            
                            <label>Apellido
                            <input style="margin-bottom: 1.5%;"  class="" type="text" name="apellido_Paciente" readonly="readonly"  id="ApellidoPaciente" value="<?php echo $paciente["apellido"];?>">
                            </label>
                            
                            <label>Cedula
                            <input style="margin-bottom: 1.5%; width: 140px;"  type="text" name="cedula_Paciente" value="<?php echo $paciente["cedula_Identidad"];?>">
                            </label>
                        </fieldset>
                    </div>
                    <div style="background-color: ; margin-top: 1%;  display: flex; justify-content: center; ">
                        <a style="background-color: ; margin-right: 6%;  width: 20%;  font-size: 13px; text-align: center;" href="../Sesiones_Cookies/HistoriasClinicas.php?cedula_pacient=<?php echo $paciente['cedula_Identidad']; ?>">inicio</a>

                        <a style="background-color: ;  font-size: 13px;width: 20%;  text-align: center;" href="javascript:history.back(-1);" title="Ir la página anterior">DatosParaclinicos</a>
                    </div>
                <h3>Leuc xmm3</h3>


    <div id="mostrarGrafico" style="width:90%; margin:auto; height:400px;"></div>
</section>
</div>

<script>
    $(function () { 
        var myChart = Highcharts.chart("mostrarGrafico",{
            chart: {
                plotBackgrounColor: 'yellow',//no se sabe que hace
                plotBorderWidth: 1,//borde de la caja que contiene el grafico
                plotShadow: false,
                type: "line"
            },
            title: {
                text: " "
            },
            subtitle:{
              //  text: "Hb gr/dl "
            },
            //tooltip:{
            //    pointFormat: "(series.name):<b>{point.porcentage:.1f}%</b>"
            //},
            xAxis: {
                title: {
                    text: "Fechas"
                },
                categories: [<?php 
                        $Consulta= "SELECT * FROM Valores_Paraclinicos WHERE CedulaPaciente ='$Paciente'";
                        $Recordset=mysqli_query($conexion,$Consulta);                          
                        while($Valor= mysqli_fetch_array($Recordset)){
                            ?>
                
                        ['<?php echo $Valor["Fecha"]?>'],

                        <?php } ?>],
            },
            yAxis: {
                title: {
                    text: "Valores",
                }
            },
            series: [{
                name: "Hb gr/dl",  
                data: [
                    <?php 
                        $Consulta= "SELECT * FROM Valores_Paraclinicos WHERE CedulaPaciente ='$Paciente'";
                        $Recordset=mysqli_query($conexion,$Consulta);                          
                        while($Valor= mysqli_fetch_array($Recordset)){
                            ?>
                
                        [<?php echo $Valor["Leuc"]?>],

                        <?php } ?>
                ]
                }]
        });
    });

</script>