<?php
    //Muestra todos los errores, desactivarlo para funcionamiento en local y activarlo para remoto
    //error_reporting(0);
    //Muestra todos los errores, desactivarlo para funcionamiento en remoto y activarlo para local
    error_reporting(E_ALL);

	include("../conexion/Conexion_BD.php");

    $Apellido= $_GET["apellido"];//recibe lo  escrito en el input desde ajaxBuscador.js por medico de InicioSesion_Basico.php
    $Especialista=$_GET["val_22"];//recibe el ID_Doctor desde ajaxBUscador.js por medio de InicioSesion_Basico.php
    //echo "Buscando por las letras: " . $Apellido . "<br>";
    //echo "ID_Doctor: " . $Especialista . "<br>";
    

    if(!empty($Apellido)){ 
    	$Persona= mysqli_real_escape_string($conexion,$Apellido);
    	$Consulta=  "SELECT * FROM citas WHERE apellido LIKE '$Persona%' AND ID_Doctor ='$Especialista' AND fecha >=curdate() ORDER BY apellido ASC " ;
    	$Recordset= mysqli_query($conexion,$Consulta);
        if(mysqli_num_rows($Recordset) != 0){
        	while($paciente= mysqli_fetch_array($Recordset)){

            //se cambia el formato de la fecha a mostrar en pantalla
            $fechaFormatoMySQL = $paciente["fecha"];//se obtiene la fecha en formato MySQL
            $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));//se cambia el formato de la fecha a d-m-Y
        		?>

                    <table class="tabla_1">
                        <tr>
                            <td class="textoCelda_3B"><?php echo $paciente["nombre"];?></td>
                            <td class="textoCelda_3"><?php echo $paciente["apellido"];?></td>
                            <td class="textoCelda_3"><?php echo $paciente["cedula_Identidad"];?></td>
                            <td class="textoCelda_3A"><?php echo $fechaFormatoPHP;?></td> 
                        </td>   
                    </table> <?php 
            } 
            echo "<a class='buttonCuatro' style='margin:3% auto' href='InicioSesion.php'>Limpiar</a>";
        }
        else{
            echo "<h3>No se encontraron pacientes</h3>";
            echo "<a class='buttonCuatro' style='margin:auto' href='javascript:history.go(0)'>Limpiar</a>";
        }
    } ?> 
