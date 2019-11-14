<?php
	//datos de configuracion para acceder al servidor de base de datos
    include("conexion/Conexion_BD.php");
    
//--------------------------------------------------------------------------------------------------------
    $Recibido=$_GET['val_10'];//recibe el ID_Doctor desde AJAX ejecutado en Citas_2.php
    $Consulta="SELECT * FROM direcciones WHERE ID_Doctor = '$Recibido'  ";
    $Resulset= mysqli_query($conexion,$Consulta);

          while($DirConsulta= mysqli_fetch_array($Resulset)){ 
        ?>  
        <table>
            <tr>
                <td style="text-align: left; margin-bottom: 2%; display: block;"><?php echo $DirConsulta['clinica'];?></td>
            </tr>
            <tr>
                <td style="text-align: left; margin-bottom: 2%; display: block;"><?php echo $DirConsulta['direccion'];?></td>
            </tr>         
            <tr>
                <td style="text-align: left;"><?php echo"Consultorio " . $DirConsulta['consultorio'];?></td>
            </tr>   
        </table>

        <?php } ?>